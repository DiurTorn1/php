<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scable=no, initial-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="../public/style.css">
		<title>Login</title>
	</head>
	<body>
		<div class="container">
			<form class="form-signin" method="post">
				<h1>Вход</h1>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
				<a href="./registr.php" class="btn btn-lg btn-primary btn-block">Регистрация</a>
			</form>
		</div>
		
		<?php
		session_start();
		require('../connect.php');
		if (isset($_POST['username']) and isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
			$result = mysqli_query($connection, $query) or die(mysql_error($connection));
			$count = mysqli_num_rows($result);
			if ($count == 1) {
				$_SESSION['username'] = $username;
				header('Location: ../index.php');
			}else{
				$fsmsg = "Error";
			}
		}
		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
			echo "Hello  " . $username . " !";
			echo "<a href='./logout.php' class='btn btn-lg btn-primary'>Logout</a>";
		}
		?>
	</body>
</html>