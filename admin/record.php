<?php
include '../includes/config.php';
session_start();
if (!isset($_SESSION['name'])) {
	header("Location: {$location}/admin/login.php");
}
if (!isset($_POST['find'])) {
	header("Location: {$location}/admin/student-record.php");
}

// GET All data...
$subject = mysqli_real_escape_string($conn, strtoupper($_POST['subject']));
$div = mysqli_real_escape_string($conn, strtoupper($_POST['div']));
$term = mysqli_real_escape_string($conn, strtoupper($_POST['term']));
$tol = mysqli_real_escape_string($conn, $_POST['tol']);
$sdate = mysqli_real_escape_string($conn, $_POST['startDate']);
$edate = mysqli_real_escape_string($conn, $_POST['endDate']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Recodes</title>
	<?php include 'links.php'; ?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include 'header.php'; ?>
	<main id="recodes">
		<h2 class="center margin">Monthly Student Recodes</h2>
		<div class="fetch-data">
			<p><b>SUBJECT NAME: </b><?php echo $subject . " " . $tol; ?></p>
			<p><b>TERM: </b><?php echo $term; ?></p>
			<p><b>DIVISION: </b><?php echo $div; ?></p>
			<p><b>DATE: </b><?php echo $sdate . " TO " . $edate; ?></p>
		</div>
		
		<div id="table-data">
			<table>
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Enrollment Number</th>
						<?php
						// All this subject classes Dates...... [02]
						$dateSql = "SELECT sname,ldate FROM classcreate WHERE subject = '{$subject}' AND term = {$term} AND division = '{$div}' AND tol = '{$tol}' AND ldate BETWEEN '{$sdate}' AND '{$edate}' ORDER BY ldate";
						$runDateSql = mysqli_query($conn, $dateSql) or die("iQuery Fail");
						$numRow = mysqli_num_rows($runDateSql);
						if ($numRow > 0) {
							while ($dates = mysqli_fetch_array($runDateSql)) {
								$year = date("Y") . "-";
								echo '<th>' . $dates['sname'] . "/" . str_replace($year, " ", $dates['ldate']) . "</th>";
							}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
							// All Student Enrollment Numbers...... [01]
							$enrollmentSql = "SELECT id,enrollment FROM studentregister WHERE division = '{$div}' AND term = {$term} ORDER BY enrollment";
							$runEnrollmentSql = mysqli_query($conn, $enrollmentSql) or die("iQuery Fail");

							if (mysqli_num_rows($runEnrollmentSql) > 0) {
								$i = 1;
								while ($enroll = mysqli_fetch_array($runEnrollmentSql)) {
					?>
							<tr>
								<td><?php echo $i++;
									?></td>
								<td><?php echo $enroll['enrollment']; ?></td>
								<?php
									// All this subject classes Dates ID...... [03]
									$dateIDSql = "SELECT id FROM classcreate WHERE subject = '{$subject}' AND term = {$term} AND division = '{$div}' AND tol = '{$tol}' AND ldate BETWEEN '{$sdate}' AND '{$edate}' ORDER BY ldate";
									$runDateIDSql = mysqli_query($conn, $dateIDSql) or die("iQuery Fail");
									while ($date = mysqli_fetch_array($runDateIDSql)) {
										// Student A & P Query........ [04]
										$sql = "SELECT * FROM studentattendance
								WHERE ldate = {$date['id']} AND enrollment = {$enroll['id']};";
										$runSql = mysqli_query($conn, $sql) or die("P & A Query Fail!");

										if (mysqli_num_rows($runSql) > 0) {
											echo "<td>P</td>";
										} else {
											echo "<td>A</td>";
										}
										// ................ END [04]
									}
									// ............................... END [03]	
								?>
							</tr>
					<?php
								}
							} else {
								echo "Enter Valid Division..";
							}
							// ............... END [01]
					?>

				</tbody>
			</table>
		</div>
	<?php
						} else {
							echo "Enter Valid Date..";
						}
						// ....................................... END [02]
	?>
		<div class="export_data">
			<a href="record-export.php?<?php echo "sname=" . $subject . "&" . "term=" . $term . "&" . "div=" . $div . "&" . "tol=" . $tol . "&" . "sdate=" . $sdate . "&" . "edate=" . $edate; ?>">Export in excel</a>
		</div>
		
	</main>
</body>

</html>