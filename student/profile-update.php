<?php 
include '../includes/config.php';
session_start();
if (!isset($_SESSION['enroll'])) {
    header("Location: {$location_student}/login.php");
}
$id = $_SESSION['id'];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile Update | Student</title>
	<?php include 'links.php'; ?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<div class="header">
      <div class="content">
         <h2>GPValsad</h2>
         <div>
            <i class="fa fa-user"></i>
            <p class="none"><?php echo $_SESSION['enroll']; ?></p>
            <a href="logout.php" class="btn">LOGOUT</a>
         </div>
      </div>
   </div>
   <main>
   		<h3>Update Details</h3>
   		<?php 
   			$sql = "SELECT * FROM studentregister WHERE id = {$id}";
   			$run = mysqli_query($conn,$sql) or die("Query Fail!");

   			if (mysqli_num_rows($run) > 0) {
   				while ($row = mysqli_fetch_array($run)) {
   		 ?>
   		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
   			<label for="name">Full Name</label>
			<input type="text" name="sname" placeholder="Surname Yourname Fathername" value="<?php echo $row['sname']; ?>" required>
			<label for="enrollment">Enrollment No</label>
			<input type="text" name="enroll" placeholder="Enter your Enrollment No" value="<?php echo $row['enrollment']; ?>" required>
			<?php 
			$selected = "selected";
			$_1 = "";
			$_2 = "";
			$_3 = "";
			$_4 = "";
			$_5 = "";
			$_6 = "";
				switch ($row['sem']) {
					case 1:
						$_1 = $selected;
						break;
					case 2:
						$_2 = $selected;
						break;
					case 3:
						$_3 = $selected;
						break;
					case 4:
						$_4 = $selected;
						break;
					case 5:
						$_5 = $selected;
						break;
					case 6:
						$_6 = $selected;
						break;
					default:
						$null = "NOT SELECTED";
						break;
				}
			 ?>
			<label for="semester">Semester</label>
			<select name="semester">
				<option value="1" <?php echo $_1; ?>>Semester 1</option>
				<option value="2" <?php echo $_2; ?>>Semester 2</option>
				<option value="3" <?php echo $_3; ?>>Semester 3</option>
				<option value="4" <?php echo $_4; ?>>Semester 4</option>
				<option value="5" <?php echo $_5; ?>>Semester 5</option>
				<option value="6" <?php echo $_6; ?>>Semester 6</option>
			</select>
			<label for="division">Division</label>
			<input type="text" name="div" placeholder="6M1" value="<?php echo $row['division']; ?>" required>
			<label for="term">Term</label>
			<input type="number" name="term" placeholder="212" value="<?php echo $row['term']; ?>" required>
			<?php 
				$male = "";
				$fmale = "";
				if (($row['gender']) == "M") {
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
			<label for="birthdate">Birth Date</label>
			<input type="date" name="bdate" value="<?php echo $row['bdate']; ?>">
			<?php 
			$m = "";
			$c = "";
			$e = "";
			$ch = "";
			$p = "";
				switch ($row['department']) {
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
			<label for="phone">Phone No</label>
			<input type="number" name="sphone" placeholder="Enter your Number" value="<?php echo $row['sphone']; ?>" required>
			<label for="phone">Parents Phone No</label>
			<input type="number" name="pphone" placeholder="Enter Parents Number" value="<?php echo $row['pphone']; ?>" required>

			<?php 
   			}
				} else {
	   				echo "NO Data Faund!";
	   			}
			 ?>
			<input type="submit" value="Update" name="update">
   		</form>
   		<?php 
			if (isset($_POST['update'])) {
				if (strlen($_POST['sphone']) == 10 && strlen($_POST['pphone']) == 10) {
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

		            $updateSql = "UPDATE studentregister SET sname = '{$name}',enrollment = '{$enrollment}',sem = {$semester},division = '{$div}',term = {$term},gender = '{$gender}',bdate = '{$barthdate}',department = '{$department}', sphone = '{$sphone}', pphone = '{$pphone}' WHERE id = {$id}";
		            $updateSqlRun = mysqli_query($conn, $updateSql) or die("Query Fail");
		            if ($updateSqlRun) {
		            	echo "<script>alert('Update Succfully.')
		            			window.location.href = '{$location_student}/home.php';
		            		</script>";
		            } else {
		            	echo '<script>alert("Not Update!")</script>';
		            }
		            
		        } else {
					echo "<script>alert('Invalid Phone Number!')</script>";
				}
			}
		 ?>
   </main>
</body>
</html>