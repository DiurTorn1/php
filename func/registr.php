<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scable=no, initial-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="../public/style.css">
		<title>Registration</title>
	</head>
	<body>
		<?php
		require('../connect.php');
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
			$result = mysqli_query($connection, $query);

			if ($result) {
				$smsg = "Регистрация прошла успешно!";
			} else {
				$fsmsg = "Ошибка!";
			}
		}
		?>
		<div class="container">
			<form class="form-signin" method="post">
				<h1>Регистрация</h1>
				<?php
				if (isset($smsg)) { ?>
				<div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div> <?php } ?>
				<?php
				if (isset($fsmsg)) { ?>
				<div class="alert alert-success" role="alert"> <?php echo $fsmsg.'</br>'; echo $result; ?></div> <?php } ?>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
				<a href="./login.php" class="btn btn-lg btn-primary btn-block">Вход</a>
			</form>
		</div>
	</body>
</html>