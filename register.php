<?php 

include 'config/dbconnect.php'; 

error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$class = $_POST['class'];
	$mobileNo = $_POST['mobileNo'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	$check_query = mysqli_query($conn, "SELECT * FROM students where email ='$email'");
    $rowCount = mysqli_num_rows($check_query);

    if ($rowCount > 0) {
		?>
			<script>
				alert("User with email already exist! Please login to continue.");
				window.location.replace('home.php');
			</script>
		<?php
	}
	else {
		if ($password == $cpassword) {
			$sql = "INSERT INTO students VALUES ('$email', '$firstName', '$lastName', '$class', '$mobileNo', '$password')";
			if (mysqli_query($conn, $sql)) {
				?>
					<script>
						alert('Registered successfully. Please login to continue.');
						window.location.replace('home.php');
					</script>
				<?php		
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}			
		} else {
			echo "<script>alert('Password Not Matched. Try again.')</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="style2.css">
		<!-- <link rel="stylesheet" type="text/css" href="style1.css"> -->
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				font-family: 'Poppins', sans-serif;
			}

			body {
				width: 100%;
				min-height: 100vh;
				background-position: center;
				background-size: cover;
				display: flex;
				justify-content: center;
				align-items: center;
				background: lavender;
			}

			.container1 {
				width: 400px;
				min-height: 400px;
				background:white;
				margin: 0px auto;
				border-radius: 5px;
				box-shadow: 0 0 5px rgba(0,0,0,1);
				padding: 40px 30px;
			}

			.container1 .login-text {
				color: lavender;
				font-weight: 500;
				font-size: 1.1rem;
				text-align: center;
				margin-bottom: 20px;
				display: block;
				text-transform: capitalize;
			}

			.container1 .login-social {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
				margin-bottom: 25px;
			}

			.container1 .login-social a {
				padding: 12px;
				margin: 10px;
				border-radius: 3px;
				box-shadow: 0 0 5px rgba(0,0,0,.3);
				text-decoration: none;
				font-size: 1rem;
				text-align: center;
				color: #FFF;
				transition: .3s;
			}

			.container1 .login-email .input-group {
				width: 100%;
				height: 50px;
				margin-bottom: 25px;
			}

			.container1 .login-email .input-group input {
				width: 100%;
				height: 100%;
				border: 2px solid #27aae1;
				padding: 15px 20px;
				font-size: 1rem;
				border-radius: 5px;
				background: transparent;
				outline: none;
				transition: .3s;
				margin: 0px auto;    
			}

			.container1 .login-email .input-group input:focus, .container1 .login-email .input-group input:valid {
				border-color: blue;
			}

			.container1 .login-email .input-group .btn {
				display: block;
				width: 100%;
				padding: 15px 20px;
				text-align: center;
				border: none;
				background: lavender;
				outline: none;
				border-radius: 5px;
				font-size: 1.2rem;
				color: #FFF;
				cursor: pointer;
				transition: .3s;
			}

			.container1 .login-email .input-group .btn:hover {
				transform: translateY(-5px);
				background: #6c5ce7;
			}

			.login-register-text {
				color: #27aae1;
				font-weight: 500;
			}

			.login-register-text a {
				text-decoration: none;
				color: #27aae1;
			}

			.login-register-text a:hover {
				text-decoration: none;
				color: blue;
				font-weight: 800;

			}

			@media (max-width: 430px) {
				.container1 {
					width: 300px;
				}
				.container1 .login-social {
					display: block;
				}
				.container1 .login-social a {
					display: block;
				}
			}

			.login-email .input-group input{
				color: black;
				background: transparent;
			}
		</style>
		<title>Register</title>

		<script>
			function validateForm(){   
				// var password = document.registrationForm.password.value;  
				var password = document.getElementById("password"); //.value = "Johnny Bravo";
				alert(password);
				if(password.length < 6){  
					alert("Password must be at least 6 characters long.");  
					return false;  
				}  
				<?php echo 'in validate function'; ?>

				return true;
			}  
		</script>
	</head>
	<body style="background-color:lavender;">
		<div class="container1">
			<form action="" method="POST" class="login-email" name="registrationForm" onsubmit="return validateForm()" >
				<p class="login-text" style="font-size: 2rem; font-weight: 800; color: #27aae1;">Register</p>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="text" placeholder="First name" name="firstName" value="" required>
				</div>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="text" placeholder="Last name" name="lastName" value="" required>
				</div>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="text" placeholder="Class" name="class" value="" required>
				</div>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="email" placeholder="Email" name="email" value="" required>
				</div>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="text" placeholder="Mobile no." name="mobileNo" value="" required>
				</div>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="password" placeholder="Password" name="password" value="" required>
				</div>
				<div class="input-group">
					<input style="border-color: #27aae1; color: #27aae1;" type="password" placeholder="Confirm password" name="cpassword" value="" required>
				</div>
				<div class="input-group">
					<button style="background-color: #27aae1;" name="submit" class="btn">Register</button>
				</div>
				<p style="color: #27aae1;">Have an account? <a href="home.php">Login here</a>.</p>
			</form>
		</div>
	</body>
</html>