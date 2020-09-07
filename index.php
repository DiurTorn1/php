<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scable=no, initial-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="./public/style.css">
<title>Test</title>
		<script src="./public/script.js" type="text/javascript"></script>
</head>
<body>
<?php
		session_start();
		require('./connect.php');
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
			$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
			$count = mysqli_num_rows($result);
			if ($count == 1) {
				$_SESSION['username'] = $username;
			} else {
				
			}
		}
		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
			echo "<a class='usn'>Вы вошли ка пользователь: " . $username . " !</a>";
			echo "<a href='./func/logout.php' class='log'>Выйти</a>";
		} else {
			echo "<a href='./func/registr.php' class='regi'>Регистрация</a>";
			echo "<a href='./func/login.php' class='log'>Войти</a>";
		}
		if (isset($_POST['user'])) {
			$user = $username;
			$comment = $_POST['comment'];
			$date = date('Y-m-d H:i:s');
			
			$query = "INSERT INTO comment (date, name, comment) VALUES ('$date', '$username', '$comment')";
			$result = mysqli_query($connection, $query);
			
		}
		
?>
<form action="index.php" method="post">
<?php 
			if (isset($_SESSION['username'])) {
				echo "<a class='usti'> Комментарий от: ".$username."</a>";
				echo "<input id='user' name='user' value='$username' style='display:none;'>";
				echo "<textarea id='comment' class='comt' name='comment' cols='100 rows='5' placeholder='Ваш комментарий'></textarea>";
				echo "<input type='submit' name='submit' id='submit' value='Оставить комментарий'>";
			} else {
				echo "<a>Вы не зарегестрированы и не можете оставлять комментарий</a>";
			}
			
?>
</form>
<div id="answer"></div>
<hr>
	<h2>Форум</h2>
	<?php 
		$res = mysqli_query($connection, "SELECT * FROM comment");
		while ($row=mysqli_fetch_assoc($res)) {
			echo "<a class='date'>".$row['date']."</a><br>";
			echo "<a class='name'>".$row['name']."</a><br>";
			echo "<a class='comment'>".$row['comment']."</a><br>";
		}
	 ?>

</body>
</html>