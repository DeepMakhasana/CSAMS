<?php 
	include '../includes/config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GPValsad Faculties | Login</title>
	<?php include 'links.php';?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="../student/css/style.css">
	<style>
		.main_form {
			margin-top: 4em;
		}
	</style>
</head>
<body>
	<main>
		<h2>Faculties Login</h2>
		<div class="main_form">
			<div class="left_content">
				<img src="img/gpvalsad.png" alt="gpvalsad logo">
				<h2>Government Polytechnic, Valsad</h2>
			</div>

			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
				<label for="email">Email Id</label>
				<input type="email" name="email" placeholder="XXXXXXXXXXXX@gpvalsad.ac.in" required>
				<label for="password">Password</label>
				<input type="password" name="pass" placeholder="Enter Password" required>

				<input type="submit" value="Login" name="login">
			</form>
			<?php 
				if (isset($_POST['login'])) {
					$email = mysqli_real_escape_string($conn,$_POST['email']);
					$pass = mysqli_real_escape_string($conn,$_POST['pass']);

					$sql = "SELECT * FROM staffregister WHERE email='{$email}'";
					$run = mysqli_query($conn,$sql);

					if (mysqli_num_rows($run) == 1) {

						while ($row = mysqli_fetch_array($run)) {
							session_start();
							$_SESSION['name'] = $row['fname'];
							$_SESSION['sname'] = $row['sname'];
							$_SESSION['id'] = $row['id'];
							$_SESSION['department'] = $row['department'];
							$_SESSION['tof'] = $row['tof'];
							$password = $row['cpassword'];
							$verifyPass = password_verify($pass, $password);

							if ($verifyPass) {
								header("Location: {$location}/admin/home.php");

							} else {
								echo '<script>alert("Rong Password.")</script>';
							}
						}
					} else {
						echo '<script>alert("You are not Register.")</script>';
					}
					
				}
			 ?>
		</div>
	</main>
</body>
</html>