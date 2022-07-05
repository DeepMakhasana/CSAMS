<?php 
include '../includes/config.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GPValsad Staff Registration</title>
	<?php include 'links.php';?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="../student/css/style.css">
</head>
<body>
	<main>
		<h2>Faculties Registration</h2>
		<div class="main_form">
			<div class="left_content">
				<img src="img/gpvalsad.png" alt="gpvalsad logo">
				<h2>Government Polytechnic, Valsad</h2>
			</div>

			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<?php 
	if (isset($_POST['submit'])) {
		if (strlen($_POST['phone']) == 10) {
				if (strpos($_POST['email'], '@gpvalsad.ac.in')) {
					$name = mysqli_real_escape_string($conn,$_POST['fname']);
					$sname = mysqli_real_escape_string($conn,$_POST['sname']);
		            $age = mysqli_real_escape_string($conn,$_POST['age']);
		            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
		            $department = mysqli_real_escape_string($conn,$_POST['department']);
		            $tof = mysqli_real_escape_string($conn,$_POST['tof']);
		            $qualif = mysqli_real_escape_string($conn,$_POST['qualification']);
		            $phone = mysqli_real_escape_string($conn,$_POST['phone']);
		            $email = mysqli_real_escape_string($conn,$_POST['email']);
		            $cpass = mysqli_real_escape_string($conn,$_POST['cpass']);
		            $rpass = mysqli_real_escape_string($conn,$_POST['rpass']);
		            $cpassword = password_hash($cpass, PASSWORD_BCRYPT);
		            $rpassword = password_hash($rpass, PASSWORD_BCRYPT);

		            $sql = "SELECT * FROM staffregister WHERE email = '{$email}'";
            		$run = mysqli_query($conn,$sql) or die("Query Fail");

            		if (mysqli_num_rows($run) > 0) {
            			echo '<script>alert("This Email is already Register.")</script>';
            		} else {
            			if ($cpass == $rpass) {
            				$insertsql = "INSERT INTO staffregister (fname,sname,age,gender,department,tof,qualification,phone,email,cpassword,rpassword) VALUES ('{$name}','{$sname}',{$age},'{$gender}','{$department}','{$tof}','{$qualif}','{$phone}','{$email}','{$cpassword}','{$rpassword}')";
            				$insertrun = mysqli_query($conn,$insertsql) or die("iQuery Fail.");
            				if ($insertrun) {
		                        echo "<script>
		                        	alert('Register Succfully.')
			            			window.location.href = '{$location}/admin/login.php';
			            		</script>";
		                    } else {
		                        echo '<script>alert("try agen Registration!")</script>';
		                    }
            			} else {
            				echo '<script>alert("Password is NOT Match!")</script>';
            			}
            			
            		}
            		
				} else {
					echo '<p class="error">Enter Your @gpvalsad.ac.in Email</p>';
				}
			
		} else {
			echo '<p class="error">Invalid Phone Number</p>';
		}
		
	}
 ?>
				<label for="name">Full Name</label>
				<input type="text" name="fname" placeholder="Surname Yourname Fathername" required>
				<label for="name">Short Name</label>
				<input type="text" name="sname" placeholder="Enter short name" required>
				<label for="Age">Age</label>
				<input type="number" name="age" placeholder="Enter your Age" required>
				<label for="gender">Gender</label>
				<select name="gender">
					<option value="null" selected>Choose a Gender</option>
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select>
				<label for="department">Department</label>
				<select name="department">
					<option value="null" selected>Choose a Department</option>
					<option value="Mechanical">Mechanical Engineering</option>
					<option value="Civil">Civil Engineering</option>
					<option value="Electrical">Electrical Engineering</option>
					<option value="Chemical">Chemical Engineering</option>
					<option value="Plastic">Plastic Engineering</option>
				</select>
				<label for="tof">Type of Faculties</label>
				<select name="tof">
					<option value="null" selected>Choose a Type of Faculties</option>
					<option value="Principal">Principal</option>
					<option value="HOD">Head of Department</option>
					<option value="Lecturer">Lecturer</option>
				</select>
				<label for="qualification">Qualification</label>
				<input type="text" name="qualification" placeholder="Enter your Qualification" required>
				<label for="phone">Phone No</label>
				<input type="number" name="phone" placeholder="Enter your Number" required>
				<label for="email">Email Id</label>
				<input type="email" name="email" placeholder="XXXXXXXXXXXX@gpvalsad.ac.in" required>
				<label for="password">Create New Password</label>
				<input type="password" name="cpass" placeholder="Create Password" required>
				<label for="password">Repeat Password</label>
				<input type="password" name="rpass" placeholder="Repeat Password" required>

				<input type="submit" value="Submit" name="submit">
			</form>
		</div>
	</main>
</body>
</html>