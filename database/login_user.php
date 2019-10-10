<?php

if (isset($_POST['submit_login']) || isset($_POST['submit'])) {
	session_start();
	include_once 'db.php';

	$user_login = $_POST['user_login_or_email'];
	$password_login = $_POST['password'];

	if (empty($user_login) || empty($password_login)) {
		$_SESSION['message_login'] = 'llena los campos vacios';
		$_SESSION['message_type'] = 'danger';
		header('location:../index_login.php?index_login=empty');
		exit();
	
 		} 
 		else{
 		$sql = "SELECT * FROM users WHERE user_name = '$user_login' OR user_email = '$user_login' ";
 	    $result = mysqli_query($conn, $sql);
 		$result_check = mysqli_num_rows($result);

 		if ($result < 1) {
 		$_SESSION['message_login'] = 'error login';
		$_SESSION['message_type'] = 'danger';
		header('location:../index_login.php?index_login=loginERROR');
		exit();
 		}
 		else{
 			if ($row = mysqli_fetch_assoc($result)) {
 			// $password_hash = password_hash($password, PASSWORD_DEFAULT);
 			$password_hash = password_verify($password_login, $row['user_password']);
 			if ($password_hash == false) {
 				$_SESSION['message_login'] = 'error password';
				$_SESSION['message_type'] = 'danger';
				header('location:../index_login.php?index_login=passwordERROR');
				exit();
 			}elseif ($password_hash == true) {
 				$_SESSION['admin_login'] = $user_login. ' bienvenido';
		 		$_SESSION['message_type'] = 'success';
		 		header('location:../portal.php?portal=welcome-user-'.$user_login.'-theportal&thismyfirstproyect');
				exit();
 			}

 			}

 		}
 		
 	}
 }