<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database

$dbhost = "localhost";
$dbname = "autogielda_5";
$dbuser = "autogielda_5";
$dbpassword = "Mozambik1";
$db_conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpassword);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Login jest wymagany"); }
  if (empty($email)) { array_push($errors, "Email jest wymagany"); }
  if (empty($password_1)) { array_push($errors, "Nie podałeś hasła!"); }
  
  if (strlen($password_1) < 8){ array_push($errors, "Hasło musi składać się z minimum 8 znaków"); }
	  
  if ($password_1 != $password_2) {
	array_push($errors, "Hasła nie pasują do siebie!");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Ten login jest już zajęty");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Ten email jest już w naszej bazie. Podaj inny!");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

	
	$sql = 'INSERT INTO users (username, email, password)
	 VALUES (:username, :email, :password)';
	$stmt = $db_conn->prepare($sql);
	$stmt->execute(array(
	 ':username' => $username,
	 ':email' => $email,
	 ':password' => $password)
	 );
	
	
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
  	array_push($errors, "Login jest wymagany");
  }
  if (empty($password)) {
  	array_push($errors, "Hasło jest wymagane");
  }

  if (count($errors) == 0) {
  	$password = md5($_POST['password']);
$sql = "SELECT username, password, firstname, name, sex FROM users WHERE username = :username AND password = :password";
$stmt = $db_conn->prepare($sql);
$stmt->execute(array("username" => $_POST['username'], "password" => $password));

$user = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
  	if ($stmt->rowCount() >= 1) {
  	  $_SESSION['username'] = $user['username'];
	  $_SESSION['firstname'] = $user['firstname'];
	  $_SESSION['name'] = $user['name'];
	  if($user['sex'] == 'F'){
		$_SESSION['sex'] = "kobieta";
		$_SESSION['sexTitle'] = "Pani";
	  }else if($user['sex'] == 'M'){
		$_SESSION['sex'] = "mężczyzna";
		$_SESSION['sexTitle'] = "Pan";
	  }
	  
  	  $_SESSION['welcome'] = $_SESSION['sexTitle']." ".$_SESSION['firstname']." ".$_SESSION['name'];
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Nieprawidłowe dane uwierzytelniające. Sprawdź poprawność wprowadzanych danych");
  	}
  }
}


// VACATION FORM
if (isset($_POST['start_vacation'])) {
  $start = $_POST['start_vacation'];
  $end = $_POST['end_vacation'];
  $type = $_POST['type'];
  $file = $_POST['file'];
  $comment = $_POST['comment'];

  if (empty($start)) {
  	array_push($errors, "Nie podałeś daty rozpoczęcia urlopu");
  }
  if (empty($end)) {
  	array_push($errors, "Nie podałeś daty zakończenia urlopu");
  }
  if (empty($type)) {
  	array_push($errors, "Pole typ wniosku jest polem wymaganym!");
  }
  
  $user = $_SESSION["username"];
  
  
  


  if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg','pdf');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'upload/';
      $dest_path = $uploadFileDir . $newFileName;
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
      
		$_SESSION['success'] = "Plik został pomyślnie przesłany";
      }
      else
      {
	  array_push($errors, "Wystąpił błąd podczas przesyłania pliku");
	  }
    }
    else
    {
	   array_push($errors, "Nieprawidłowy typ pliku. Dozwolone formaty: ". implode(',', $allowedfileExtensions));
    }
  }
  else
  {
	 array_push($errors, "Musisz załączyć dokument w formacie jpg lub pdf");
	 array_push($errors, $_FILES['uploadedFile']['error']);
  }


  if (count($errors) == 0) {
	  
	$sql = "SELECT id FROM users WHERE username = :username";
	$stmt = $db_conn->prepare($sql);
	$user = $stmt->execute(array("username" => $_SESSION['username']));

	$sql2 = 'INSERT INTO forms (user_id, type, start_vacation, end_vacation, file, comment)
	VALUES (:user, :type, :start, :end, :file, :comment)';
	$stmt = $db_conn->prepare($sql2);
	$stmt->execute(array(
	 ':user' => $user,
	 ':type' => $type,
	 ':start' => $start,
	 ':end' => $end,
	 ':file' => $newFileName,
	 ':comment' => $comment)
	 );
	

  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Wniosek został pomyślnie wysłany!";
  	  header('location: index.php');

  }
}

?>