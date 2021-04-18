<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Strona główna</title>

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
		  <a class="nav-item nav-link active" href="#">Strona główna <span class="sr-only">(current)</span></a>
		  <?php  if (isset($_SESSION['username'])){ ?>
		  <a class="nav-item nav-link" href="form.php" >Wniosek urlopowy</a>
		  <a class="nav-item nav-link" href="index.php?logout='1'" >Wyloguj</a>
		  <?php }else{ ?>
		  <a class="nav-item nav-link" href="login.php">Logowanie</a>
		   <a class="nav-item nav-link" href="register.php">Rejestracja</a>
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
          <h1 class="mb-5">Witaj!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
			<!-- notification message -->
			<?php if (isset($_SESSION['welcome'])){ ?>
			  <div class="error success" >
				<h3>
				  <?php 
					echo $_SESSION['welcome'];
				  ?>
				</h3>
			  </div>
			<?php } ?>
			<?php if (isset($_SESSION['success'])){ ?>
			  <div class="error success" >
				<h4>
				  <?php 
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				  ?>
				</h4>
			  </div>
			<?php } ?>
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