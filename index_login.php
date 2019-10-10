<?php session_start(); ?>
<?php include_once 'database/db.php'; ?>
<?php include_once 'nav_bar.php'; ?>
	
<form action="database/login_user.php" method="post" class="mt-5">
	<div class="row">

		<div class="container col-md-5 mt-5"><h2>Inicia sesión</h2>

	<!----MUESTRA ALERTA CUANDO EL CAMPO ESTA VACÍO O ERRORES------>
		<?php if (isset($_SESSION['message_login'])) {?>
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['message_login'] ?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>
			
		<?php session_unset(); } ?>
	<!---------------------------------------------------->


				<input type="text" name="user_login_or_email" placeholder="ingrese el usuario" class="form-control my-2">
				<input type="password" name="password" placeholder="ingrese la contraseña" class="form-control my-2">
				<a class="center" href="index_register.php">regístrate</a>
				<button type="submit" name="submit_login" class="btn btn-info form-control">enviar</button>
				
			</div>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

	<script src="js/bootstrap.min.js"></script>
</body>
</html>