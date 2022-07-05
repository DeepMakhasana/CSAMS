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
	<title>Student Attendance</title>
	<?php include 'links.php'; ?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<div class="content">
			<h2>GPValsad</h2>
			<div>
				<a href="profile-update.php"><i class="fa fa-user"></i></a>
				<p class="none"><?php echo $_SESSION['name']; ?></p>
				<a href="logout.php" class="btn">LOGOUT</a>
			</div>
		</div>
	</div>
	<main>
		<div class="attendance">
			<h2>Attendance</h2>
		</div>
	<?php 
		$cid = $_GET['cid'];
		$sql = "SELECT r.enrollment
			FROM studentattendance AS a
			INNER JOIN studentregister AS r
			ON a.enrollment = r.id
			WHERE a.sname = {$cid}
			ORDER BY a.id;";
         $sqlrun = mysqli_query($conn,$sql) OR die("Query Fail!");

         if (mysqli_num_rows($sqlrun) > 0) {
	 ?>
	 	<div class="attendStudent">
	 		<div class="left_column">
	 			<h3>Sr. No</h3>
	 			<?php 
	 			for ($i=1; $i <= mysqli_num_rows($sqlrun); $i++) { 
	 				echo "<p>$i</p>";
	 			}
	 			 ?>
	 			
	 		</div>
	 		<div>
	 			<h3>Enrollment No</h3>
	 			<?php 
	 			while ($row = mysqli_fetch_array($sqlrun)) {
	 			 ?>
	 			<p><?php echo $row['enrollment'];?></p>
	 			<?php 
	 			} ?>
	 		</div>
	 	</div>
	 	<div class="export">
	 		<a href="export.php?cid=<?php echo $cid; ?>">Download Attendance</a>
	 	</div>
	<?php 
		} else {
		         	echo "NO Attand any Student.";
		         }
	 ?>
	</main>

</body>
</html>