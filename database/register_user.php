<?php

if (isset($_POST['submit'])) {
	session_start();
	include_once 'db.php';

	$new_user = $_POST['new_user'];
	$email =  $_POST['email'];
	$password =  $_POST['password'];
	$password2 =  $_POST['password2'];
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	// -------------------VALIDACIÓN PARA LOS CAMPOS VACIOS------------------------------
	if (empty($new_user) || empty($email) || empty($password) || empty($password2)) {
		
		$_SESSION['message'] = 'llena todos los campos';
 		$_SESSION['message_type'] = 'danger';
		header('location:../index_register.php?index_register=INPUT-empty-ERROR');
		exit();
	}else{
	//---------------- VALIDACIÓN PARA EL CAMPO NOMBRE DE USUARIO--------------------
		if (!preg_match("/^[0-9a-zA-Z]*$/", $new_user) || strlen($new_user) < 2) {
			$_SESSION['message'] = '*Usuario invalido<br>*Cree un usuario con mas de 3 caracteres con solo numeros y letas y sin espacios en blanco.';
 			$_SESSION['message_type'] = 'danger';
			header('location:../index_register.php?index_register=invalid-ERROR-USER');
			exit();
		}else{
	//------------------------- VALIDACION PARA EL CORREO-------------------------------------
	// --------------VALIDACIÓN Y CONSULTA SQL A LA DB PARA VER SI EXISTE UN CORREO-----------

			$sql_mail = "SELECT * FROM users WHERE user_email = '$email'";
			$result_mail = mysqli_query($conn, $sql_mail);
			$result_mail_check = mysqli_num_rows($result_mail);

			if ($result_mail_check > 0) {
			$_SESSION['message'] = 'este correo ya existe';
 			$_SESSION['message_type'] = 'danger';
			header('location:../index_register.php?index_register=emailExist');
			exit();

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
			$_SESSION['message'] = 'agrega un correo válido';
 			$_SESSION['message_type'] = 'danger';
			header('location:../index_register.php?index_register=invalid-email');
			exit();
			}
		}
			else{
	// --------------VALIDACIÓN Y CONSULTA SQL A LA DB PARA VER SI EXISTE UN USUARIO-----------
				$sql = "SELECT * FROM users WHERE user_name = '$new_user'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					$_SESSION['message'] = 'este usuario ya existe';
 					$_SESSION['message_type'] = 'danger';
					header('location:../index_register.php?index_register=userTaken');
					exit();
				}
				else{
	//---------------------- VALIDACIÓN PARA LA CONTRASEÑA--------------------------------------
					if (strlen($password) < 6) {
					$_SESSION['message'] = 'la contraseña es muy corta';
 					$_SESSION['message_type'] = 'danger';
 					header('location:../index_register.php?index_register=passwordShort');
				 	exit();
						
					} else {
					if (password_verify($password2, $password_hash)) {
					$_SESSION['message'] = 'las contraseñas si coinciden';
 					$_SESSION['message_type'] = 'success';

 	//--------------- SI TODO ESTA CORRECTO SE INSERTA EN LA DB LOS DATOS REQUERIDOS--------------
 					$sql = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$new_user', '$email', '$password_hash') ";
					mysqli_query($conn, $sql);
					$_SESSION['admin_register'] = $new_user . '  bienvenido';
		 			$_SESSION['message_type'] = 'success';
		 			header('location:../portal.php?portal=welcometotheportal&thismyfirstproyect');
				 	exit();
					}
	// ----------------VALIDACIÓN EN CASO CONTRARIO SI LA CONTRASEÑA NO COINCIDEN----------------------
	//---------------------ELSE PERTENECE A LA FUNCIÓN PASSWORD_VERIFY--------------------------- 
					else{
						$_SESSION['message'] = 'password no coinciden';
 						$_SESSION['message_type'] = 'danger';
 						header('location:../index_register.php?index_register=errorregisterpasswordinvalid');
				 		exit();
						}

					$_SESSION['message'] = 'contraseña segura';
 					$_SESSION['message_type'] = 'success';
 					header('location:../index_register.php?index_register=passwordsecure');
				 	exit();
					}
				}
			}
		}
	}
}else{
	header('location:../index_register.php?index_register=registernow');
	exit();
}



