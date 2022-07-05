<?php 
	include '../includes/config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GPValsad Student Registration</title>
	<?php include 'links.php';?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main>
		<h2>Student Registration</h2>
		<div class="main_form">
			<div class="left_content">
				<img src="img/gpvalsad.png" alt="gpvalsad logo">
				<h2>Government Polytechnic, Valsad</h2>
			</div>

			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<?php 
	if (isset($_POST['submit'])) {
		if (strlen($_POST['sphone']) == 10) {
			if (strlen($_POST['pphone']) == 10) {
				if (strpos($_POST['email'], '@gpvalsad.ac.in')) {
					$name = mysqli_real_escape_string($conn,$_POST['sname']);
		            $enrollment = mysqli_real_escape_string($conn,$_POST['enroll']);
		            $semester = mysqli_real_escape_string($conn,$_POST['semester']);
		            $div = mysqli_real_escape_string($conn,$_POST['div']);
		            $term = mysqli_real_escape_string($conn,$_POST['term']);
		            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
		            $barthdate = mysqli_real_escape_string($conn,$_POST['bdate']);
		            $department = mysqli_real_escape_string($conn,$_POST['department']);
		            $sphone = mysqli_real_escape_string($conn,$_POST['sphone']);
		            $pphone = mysqli_real_escape_string($conn,$_POST['pphone']);
		            $email = mysqli_real_escape_string($conn,$_POST['email']);
		            $cpass = mysqli_real_escape_string($conn,$_POST['cpass']);
		            $rpass = mysqli_real_escape_string($conn,$_POST['rpass']);
		            $cpassword = password_hash($cpass, PASSWORD_BCRYPT);
		            $rpassword = password_hash($rpass, PASSWORD_BCRYPT);

		            $sql = "SELECT * FROM studentregister WHERE email = '{$email}'";
            		$run = mysqli_query($conn,$sql) or die("Query Fail");

            		if (mysqli_num_rows($run) > 0) {
            			echo '<script>alert("This Email is already Register.")</script>';
            		} else {
            			if ($cpass == $rpass) {
            				$insertsql = "INSERT INTO studentregister (sname,enrollment,sem,division,term,gender,bdate,department,sphone,pphone,email,cpassword,rpassword) VALUES ('{$name}','{$enrollment}',{$semester},'{$div}',{$term},'{$gender}','{$barthdate}','{$department}','{$sphone}','{$pphone}','{$email}','{$cpassword}','{$rpassword}')";
            				$insertrun = mysqli_query($conn,$insertsql) or die("iQuery Fail.");
            				if ($insertrun) {
		                        echo '<script>alert("Register Succfully.")</script>';
		                        header("Location: {$location_student}/login.php");
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
			
		} else {
			echo '<p class="error">Invalid Parents Phone Number</p>';
		}
		
	}
 ?>
				<label for="name">Full Name</label>
				<input type="text" name="sname" placeholder="Surname Yourname Fathername" required>
				<label for="enrollment">Enrollment No</label>
				<input type="text" name="enroll" placeholder="Enter your Enrollment No" required>
				<label for="semester">Semester</label>
				<select name="semester">
					<option value="null" selected>Choose a Semester</option>
					<option value="1">Semester 1</option>
					<option value="2">Semester 2</option>
					<option value="3">Semester 3</option>
					<option value="4">Semester 4</option>
					<option value="5">Semester 5</option>
					<option value="6">Semester 6</option>
				</select>
				<label for="division">Division</label>
				<input type="text" name="div" placeholder="6M1" required>
				<label for="term">Term</label>
				<input type="number" name="term" placeholder="212" required>
				<label for="gender">Gender</label>
				<select name="gender">
					<option value="null" selected>Choose a Gender</option>
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select>
				<label for="birthdate">Birth Date</label>
				<input type="date" name="bdate">
				<label for="department">Department</label>
				<select name="department">
					<option value="null" selected>Choose a Department</option>
					<option value="Mechanical">Mechanical Engineering</option>
					<option value="Civil">Civil Engineering</option>
					<option value="Electrical">Electrical Engineering</option>
					<option value="Chemical">Chemical Engineering</option>
					<option value="Plastic">Plastic Engineering</option>
				</select>
				<label for="phone">Phone No</label>
				<input type="number" name="sphone" placeholder="Enter your Number" required>
				<label for="phone">Parents Phone No</label>
				<input type="number" name="pphone" placeholder="Enter Parents Number" required>
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