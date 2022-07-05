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
	<title>Home Faculties</title>
	<?php include 'links.php'; ?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
		<div class="class">
			<a href="classcreate.php">Class Create</a>
			<a href="student-record.php">Monthly Student Record</a>
		</div>
		<?php
			$owner = $_SESSION['sname']; 
			// Unique Date Find Out
			$sqlDate = "SELECT DISTINCT ldate FROM classcreate WHERE sname = '{$owner}' ORDER BY ldate DESC";
			$sqlDateRun = mysqli_query($conn,$sqlDate) OR die("sQuery Fail!");


			
			if (mysqli_num_rows($sqlDateRun) > 0) {
				while ($date = mysqli_fetch_array($sqlDateRun)) {
				$dates = $date['ldate'];
				// Day id Find
				$sqlDay = "SELECT DISTINCT DAYOFWEEK('{$dates}') as day FROM classcreate WHERE sname = '{$owner}' ORDER BY ldate DESC";
				$sqlDayRun = mysqli_query($conn,$sqlDay) OR die("DayQuery Fail!");
				while ($day = mysqli_fetch_array($sqlDayRun)) {
					switch ($day['day']) {
						case '1':
							$dayName = "Sunday";
							break;
						case '2':
							$dayName = "Monday";
							break;
						case '3':
							$dayName = "Tuesday";
							break;
						case '4':
							$dayName = "Wednesday";
							break;
						case '5':
							$dayName = "Thursday";
							break;
						case '6':
							$dayName = "Friday";
							break;
						case '7':
							$dayName = "Saturday";
							break;
						default:
							$dayName = "DayofTheWeek";
							break;
					}
					echo "<b>" . $dates . ", " . $dayName . "</b>";
				}
				// Print Lectures
				$sql = "SELECT * FROM classcreate WHERE sname = '{$owner}' && ldate = '{$dates}' ORDER BY ldate DESC";
				$sqlrun = mysqli_query($conn,$sql) OR die("Query Fail!");
				while ($row = mysqli_fetch_array($sqlrun)) {
					
		 ?>
		<a href="attendance.php?cid=<?php echo $row['id']; ?>">
			<div class="classes">
				<div>
					<p>Subject: <?php echo $row['subject'] . " " . $row['tol']; ?></p>
					<p>Class: <?php echo $row['division'];?></p>
				</div>
				<div>
					<p>CODE: <?php echo $row['scode']; ?></p>
				</div>
				<div>
					<p>Date: <?php echo $row['ldate'];?></p>
					<p>Time: <?php echo $row['stime'] . " To " . $row['etime'];?></p>
				</div>
			</div>
		</a>
		<?php
			} 
				}
		} ?>
	</main>
</body>
</html>