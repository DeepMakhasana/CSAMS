<?php 
include '../includes/config.php';
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: {$location}/admin/login.php");
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile Update | GPValsad Faculties</title>
	<?php include 'links.php'; ?>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<div class="content">
			<h2>GPValsad</h2>
			<div>
				<i class="fa fa-user"></i>
				<!-- <p><a href="profile-update.php"><?php //echo $_SESSION['name']; ?></a></p> -->
				<p class="none"><?php echo $_SESSION['name']; ?></p>
				<a href="logout.php" class="btn">LOGOUT</a>
			</div>
		</div>
	</div>

	<main>
		<h3>Update Details</h3>
		<?php 
			$id = $_SESSION['id'];
			$sql = "SELECT * FROM staffregister WHERE id = {$id}";
			$sqlRun = mysqli_query($conn, $sql) or die("Query Fail.");

			if (mysqli_num_rows($sqlRun) > 0) {
		 ?>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
			<?php while ($data = mysqli_fetch_array($sqlRun)) { ?>
			<label for="name">Full Name</label>
			<input type="text" name="fname" placeholder="Surname Yourname Fathername" value="<?php echo $data['fname'] ?>" required>
			<label for="Age">Age</label>
			<input type="number" name="age" placeholder="Enter your Age" value="<?php echo $data['age'] ?>" required>
			<?php 
				$selected = "selected";
				$male = "";
				$fmale = "";
				if (($data['gender']) == "M") {
					$male = $selected;
				} else {
					$fmale = $selected;
				}
			 ?>
			<label for="gender">Gender</label>
			<select name="gender">
				<option value="M" <?php echo $male; ?>>Male</option>
				<option value="F" <?php echo $fmale; ?>>Female</option>
			</select>
			<?php 
			$m = "";
			$c = "";
			$e = "";
			$ch = "";
			$p = "";
				switch ($data['department']) {
					case 'Mechanical':
						$m = $selected;
						break;
					case 'Civil':
						$c = $selected;
						break;
					case 'Electrical':
						$e = $selected;
						break;
					case 'Chemical':
						$ch = $selected;
						break;
					case 'Plastic':
						$p = $selected;
						break;
					
					default:
						$null = "NOT SELECTED";
						break;
				}
			 ?>
			<label for="department">Department</label>
			<select name="department">
				<option value="Mechanical" <?php echo $m;?> >Mechanical Engineering</option>
				<option value="Civil" <?php echo $c;?> >Civil Engineering</option>
				<option value="Electrical" <?php echo $e;?> >Electrical Engineering</option>
				<option value="Chemical" <?php echo $ch;?> >Chemical Engineering</option>
				<option value="Plastic" <?php echo $p;?> >Plastic Engineering</option>
			</select>
			<?php 
			$principal = "";
			$hod = "";
			$lecturer = "";
				switch ($data['tof']) {
					case 'Principal':
						$principal = $selected;
						break;
					case 'HOD':
						$hod = $selected;
						break;
					case 'Lecturer':
						$lecturer = $selected;
						break;
					default:
						$null = "NOT SELECTED";
						break;
				}
			 ?>
			<label for="tof">Type of Faculties</label>
			<select name="tof">
				<option value="Principal" <?php echo $principal; ?>>Principal</option>
				<option value="HOD" <?php echo $hod; ?>>Head of Department</option>
				<option value="Lecturer" <?php echo $lecturer; ?>>Lecturer</option>
			</select>

			<label for="qualification">Qualification</label>
			<input type="text" name="qualification" placeholder="Enter your Qualification" value="<?php echo $data['qualification'] ?>" required>
			<label for="phone">Phone No</label>
			<input type="number" name="phone" placeholder="Enter your Number" value="<?php echo $data['phone'] ?>" required>

			<input type="submit" value="Update" name="update">
			<?php }
			} ?>
		</form>
		<?php 
			if (isset($_POST['update'])) {
				if (strlen($_POST['phone']) == 10) {
					$name = mysqli_real_escape_string($conn,$_POST['fname']);
		            $age = mysqli_real_escape_string($conn,$_POST['age']);
		            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
		            $department = mysqli_real_escape_string($conn,$_POST['department']);
		            $tof = mysqli_real_escape_string($conn,$_POST['tof']);
		            $qualif = mysqli_real_escape_string($conn,$_POST['qualification']);
		            $phone = mysqli_real_escape_string($conn,$_POST['phone']);

		            $updateSql = "UPDATE staffregister SET fname = '{$name}',age = {$age},gender = '{$gender}',department = '{$department}',tof = '{$tof}',qualification = '{$qualif}',phone = '{$phone}' WHERE id = {$id}";
		            $updateSqlRun = mysqli_query($conn, $updateSql) or die("Query Fail");
		            if ($updateSqlRun) {
		            	echo "<script>alert('Update Succfully.')
		            			window.location.href = '{$location}/admin/home.php';
		            		</script>";
		            } else {
		            	echo '<script>alert("Not Update!")</script>';
		            }
		            
		        } else {
					echo '<p class="error">Invalid Phone Number</p>';
				}
			}
		 ?>
	</main>
</body>
</html>