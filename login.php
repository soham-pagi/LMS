<?php

	if (isset($_POST['submit'])) {
		include 'config/dbconnect.php';
		$email = $_POST["email"];
		$password = md5($_POST["password"]);

		$sql = "SELECT * FROM `students` WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		if($num == 1 && ($password == $row['password'])) {
		$_SESSION['loggedin'] = 1;
		$_SESSION['email'] = $email;
		echo "<script>alert('Login successful.')</script>";
		echo "<script>window.location.replace('home.php')</script>";
		} else {
		echo "<script>alert('Wrong email or password! Please try again!')</script>";
		}  
	}

	if($_SESSION['loggedin'] == 1) {
		include 'slider.php';
	} else {
		echo '<div class="bucket">
		<form action="" method="POST" class="login-email">
		<p class="login-text" style="font-size: 2rem; font-weight: 800; color: #27aae1;">Login</p>
		<div class="input-group">
			<input style="border-color: #27aae1; color: #27aae1;" type="email" placeholder="Email" name="email" value="" required>
		</div>
		<div class="input-group">
			<input style="border-color: #27aae1; color: #27aae1;" type="password" placeholder="Password" name="password" value="" required>
		</div>
		<div class="input-group">
			<button style="background-color: #27aae1;" name="submit" class="btn">Login</button>
		</div>
			<p style="color: #27aae1">Not registered? <a href="register.php">Click here to register</a></p>
		</form>
	</div>';
	}
?>