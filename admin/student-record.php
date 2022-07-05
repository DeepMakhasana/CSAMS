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
	<title>Student Attendance Record | GPValsad</title>
	<?php include 'links.php'; ?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
		<form action="record.php" method="POST">
			<h2>Monthly Student Record</h2>
			<label for="name">Subject Name</label>
			<input type="text" name="subject" placeholder="Subject" required>
			<label for="division">Division</label>
			<input type="text" name="div" placeholder="6M1" required>
			<label for="term">Term</label>
			<input type="number" name="term" placeholder="212" required>
			<label for="tol">Type of Lecture</label>
			<select name="tol" required>
				<option value="">Choose a Type of Lecture</option>
				<option value="LECTURE">LECTURE</option>
				<option value="LAB">LAB</option>
			</select>
			
			<label for="date">From</label>
			<input type="date" name="startDate" required>
			<label for="date">To</label>
			<input type="date" name="endDate" required>

			<input type="submit" value="Find" name="find">
		</form>
	</main>
</body>
</html>