	<?php session_start(); ?>
	<?php include_once 'database/db.php'; ?>
	<?php include_once 'nav_bar.php'; ?>
	
	<!-- FORMULARIO DE REGISTRO -->
	<form action="database/register_user.php" method="post" class="mt-5">
		<div class="row">
		<div class="container col-md-5 mt-5">
		<h2 class="text-center">Formulario de Registro</h2>

	<!----MUESTRA ALERTA CUANDO EL CAMPO ESTA VACÍO O ERRORES------>
		<?php if (isset($_SESSION['message'])) {?>
		<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
		<?= $_SESSION['message'] ?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>
			
		<?php session_unset(); } ?>
	<!---------------------------------------------------->

		<input type="text" name="new_user" placeholder="nombre de usuario" class="form-control my-2">
		<input type="email" name="email" placeholder="e-mail" class="form-control my-2">
		<input type="password" name="password" placeholder="contraseña" class="form-control my-2">
		<input type="password" name="password2" placeholder="repita la contraseña" class="form-control my-2">
		<a class="center" href="index_login.php">inicia sesión</a>
		<button type="submit" name="submit" class="btn btn-info form-control" value="">enviar</button>
			
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