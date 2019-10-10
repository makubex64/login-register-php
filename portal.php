<?php session_start();?>
<?php include_once 'database/db.php'; ?>
	
	<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Document</title>
</head>
<body>
	
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">

	    	<a class="navbar-brand" href="portal.php">Portal</a>
	    	<form action="database/logout.php">
	    		<button type="logout" name="logout"><a href="database/logout.php">logout</a></button>

	    	</form>
		</div>
  	</nav>
  	<h1>lalalalaal :V</h1>
  	<!----MUESTRA ALERTA CUANDO SE LOGUEA SATISFACTORIAMENTE------>
		<?php if (isset($_SESSION['admin_login'])) {?>
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['admin_login'] ?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>
	
	
			
		<?php session_unset(); } 
		 // else header('location: index1.php');
		// exit();	?>
	
		
	<!---------------------------------------------------->

	<!----MUESTRA ALERTA CUANDO SE REGISTRA SATISFACTORIAMENTE------>
		<?php if (isset($_SESSION['admin_register'])) {?>
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['admin_register'] ?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>

			
		<?php session_unset(); }
		// else header ('location: index1.php'); 
		// exit();	?>
	
		
	<!---------------------------------------------------->
	
 

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script src="js/bootstrap.min.js"></script>
</body>
</html>
  	