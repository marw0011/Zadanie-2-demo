<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rejestracja nowego użytkownika</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
		  <a class="nav-item nav-link active" href="#">Strona główna</a>
		  <?php  if (isset($_SESSION['username'])){ ?>
		  <a class="nav-item nav-link" href="form.php" >Wniosek urlopowy</a>
		  <a class="nav-item nav-link" href="index.php?logout='1'" >Wyloguj</a>
		  <?php }else{ ?>
		  <a class="nav-item nav-link" href="login.php">Logowanie</a>
		  <a class="nav-item nav-link" href="register.php">Rejestracja <span class="sr-only">(current)</span></a>
		  <?php } ?>
		</div>
	  </div>
	</nav>
	
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Zarejestruj się!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
		  <form method="post" action="register.php">
			<?php include('errors.php'); ?>
				
			  <div class="mb-3 row">
				<label for="inputLogin" class="col-sm-3 col-form-label text-right">Login</label>
				<div class="col-sm-9">
				  <input type="text" name="username" class="form-control" id="inputLogin">
				</div>
			  </div>
			  
			  <div class="mb-3 row">
				<label for="inputEmail" class="col-sm-3 col-form-label text-right">Email</label>
				<div class="col-sm-9">
				  <input type="email" name="email" class="form-control" id="inputEmail">
				</div>
			  </div>
				
			  <div class="mb-3 row">
				<label for="inputFirstname" class="col-sm-3 col-form-label text-right">Imię</label>
				<div class="col-sm-9">
				  <input type="text" name="firstname" class="form-control" id="inputFirstname">
				</div>
			  </div>

			  <div class="mb-3 row">
				<label for="inputName" class="col-sm-3 col-form-label text-right">Nazwisko</label>
				<div class="col-sm-9">
				  <input type="text" name="name" class="form-control" id="inputName">
				</div>
			  </div>  
			  
			  
			  <div class="mb-3 row">
				<label for="inputPassword1" class="col-sm-3 col-form-label text-right">Hasło</label>
				<div class="col-sm-9">
				  <input type="password" name="password_1" class="form-control" id="inputPassword1">
				</div>
			  </div>
			  
			  <div class="mb-3 row">
				<label for="inputPassword2" class="col-sm-3 col-form-label text-right">Powtórz hasło</label>
				<div class="col-sm-9">
				  <input type="password" name="password_2" class="form-control" id="inputPassword2">
				</div>
			  </div>
			  
			  <div class="mb-3 row">
				<div class="col-sm-9 offset-md-3">
				  <button type="submit" class="btn btn-primary" name="reg_user">Zarejestruj</button>
				  <p class="my-2">Masz już konto? <a href="login.php">Zaloguj się</a></p>
				</div>
			  </div>
			
		  </form>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 h-50 text-center my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; 2021. All Rights Reserved.</p>
        </div>

      </div>
    </div>
  </footer>
  


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
