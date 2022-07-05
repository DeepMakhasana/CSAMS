<?php 
 include '../includes/config.php';
    session_start();
    if (!isset($_SESSION['enroll'])) {
        header("Location: {$location_student}/login.php");
    }
// Student ID GET IN studentregister Table
// $enrollment = $_SESSION['enroll'];
$eid = $_SESSION['id'];
$id = $_GET['id'];
// chack attend
$chacksql = "SELECT * FROM studentattendance WHERE enrollment = {$eid} AND sname = {$id}";
$chackRun = mysqli_query($conn,$chacksql);

if (mysqli_num_rows($chackRun) > 0) {
  echo "<script>alert('You are allread present.');
      window.location.href='{$location_student}/home.php';
        </script>";
} else {
  
// INSERT ATTEND DATA
$insertsql = "INSERT INTO studentattendance (enrollment,sname,subject,division,tol,ldate,stime,etime)
  VALUES ({$eid},{$id},{$id},{$id},{$id},{$id},{$id},{$id})";
$insertrun = mysqli_query($conn,$insertsql) OR die("Query Fail!");

if ($insertrun) {
  echo "<script>alert('Present Sucessfully.');
      window.location.href='{$location_student}/home.php';
        </script>";
} else {
  echo "<script>alert('Fail!');
      window.location.href='{$location_student}/attendclass.php';
        </script>";
}

}
 ?>