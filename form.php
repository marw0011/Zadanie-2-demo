<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Wniosek urlopowy</title>

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
		  <a class="nav-item nav-link" href="form.php" >Wniosek urlopowy <span class="sr-only">(current)</span></a>
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
          <h1 class="mb-5">Wypełnij wniosek</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
		  <form method="post" action="form.php" enctype="multipart/form-data">
			<?php include('errors.php'); ?>
				
			  <div class="mb-3 row">
				<label for="inputLogin" class="col-sm-3 col-form-label text-right">Data rozpoczęcia urlopu</label>
				<div class="col-sm-9">
				  <input type="date" name="start_vacation" class="form-control" id="inputLogin">
				</div>
			  </div>
			  
			  <div class="mb-3 row">
				<label for="inputEmail" class="col-sm-3 col-form-label text-right">Data zakończenia urlopu</label>
				<div class="col-sm-9">
				  <input type="date" name="end_vacation" class="form-control" id="inputEmail">
				</div>
			  </div>
				
			  <div class="mb-3 row">
				<label for="inputType" class="col-sm-3 col-form-label text-right">Rodzaj urlopu</label>
				<div class="col-sm-9">
				  <select name="type" class="form-control" id="inputType">
				  <option value="1">urlop zwykły</option>
				  <option value="2">urlop na żądanie</option>
				  <option value="3">urlop bezpłatny</option>
				  </select>
				</div>
			  </div>

			  <div class="mb-3 row">
				<label for="file" class="col-sm-3 col-form-label text-right">Załącz dokument</label>
				<div class="col-sm-9">
				  <input type="file" name="file" class="form-control" id="file">
				</div>
			  </div>  
			  
			  <div class="mb-3 row">
				<label for="inputComment" class="col-sm-3 col-form-label text-right">Komentarz</label>
				<div class="col-sm-9">
				  <textarea name="comment" class="form-control" id="inputComment"></textarea>
				</div>
			  </div>
			  
			  <div class="mb-3 row">
				<div class="col-sm-9 offset-md-3">
				  <button type="submit" class="btn btn-primary" name="submit">Wyślij</button>
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