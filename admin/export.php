<?php 
include '../includes/config.php';
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: {$location}/admin/login.php");
}

// Attand student enrollment No
$cid = $_GET['cid'];
$sql = "SELECT r.enrollment
	FROM studentattendance AS a
	INNER JOIN studentregister AS r
	ON a.enrollment = r.id
	WHERE a.sname = {$cid}
	ORDER BY a.id;";
$sqlrun = mysqli_query($conn,$sql) OR die("Query Fail!");

if (mysqli_num_rows($sqlrun) > 0) {


$export = "<table>
	<tr>
		<th>Sr. No</th>
		<th>Enrollment Number</th>
	</tr>";

	$id = 1;
	while (($row = mysqli_fetch_array($sqlrun)) && ($id <= mysqli_num_rows($sqlrun))) {

$export .= "<tr>
		<td>
		{$id}";
			$id++;
$export .= "</td>
		<td>
			{$row['enrollment']}
		</td>
	</tr>";
	 } 
$export .= "</table>";


	$sql = "SELECT subject,division,ldate,tol FROM classcreate WHERE id = {$cid}";
	$run = mysqli_query($conn, $sql);
	$fetch = mysqli_fetch_array($run);
	$nameOfFile = $fetch['subject'] . "_" . $fetch['division'] . "_" . $fetch['ldate'] . "_" . $fetch['tol'];
	echo $export;
	header('Content-Type:application/xls');
	header("Content-Disposition:attachment; filename= {$nameOfFile}.xls");
}else{
	echo '<script>alert("No Attendances.")</script>';
}
 ?>