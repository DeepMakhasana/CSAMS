<?php
include '../includes/config.php';
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: {$location}/admin/login.php");
}

$subject = mysqli_real_escape_string($conn, strtoupper($_GET['sname']));
$div = mysqli_real_escape_string($conn, strtoupper($_GET['div']));
$term = mysqli_real_escape_string($conn, strtoupper($_GET['term']));
$tol = mysqli_real_escape_string($conn, $_GET['tol']);
$sdate = mysqli_real_escape_string($conn, $_GET['sdate']);
$edate = mysqli_real_escape_string($conn, $_GET['edate']);

// All this subject classes Dates...... [02]
$dateSql = "SELECT sname,ldate FROM classcreate WHERE subject = '{$subject}'  AND term = {$term} AND division = '{$div}' AND tol = '{$tol}' AND ldate BETWEEN '{$sdate}' AND '{$edate}' ORDER BY ldate";

$runDateSql = mysqli_query($conn, $dateSql) or die("iQuery Fail");
$numRow = mysqli_num_rows($runDateSql);
$totalRow = $numRow + 2;
$halfRow = round($totalRow / 2);

if ($totalRow % 2) {
    $oddNum = $halfRow - 1;
  } else {
    $oddNum = $halfRow;
  }

$record = "<table>
        <tr>
            <td colspan='{$totalRow}' style='text-align: center; border: 1px solid black; '><b>GOVERNMENT POLYTECHNIC, VALSAD</b></td>
        </tr>
        <tr>
            <td colspan='{$totalRow}' style= 'text-align: center; border: 1px solid black; ' >" . strtoupper($_SESSION['department']) . " ENGINEERING</td>
        </tr>
        <tr  style= 'text-align: center;'>
            <td colspan='{$oddNum}'style= 'border: 1px solid black; '>SUBJECT: {$subject} {$tol}</td>
            <td colspan='{$halfRow}'style= 'border: 1px solid black; '>DIVISION: {$div}</td>
        </tr>
        <tr  style= 'text-align: center;'>
            <td colspan='{$oddNum}'style= 'border: 1px solid black; '>TERM: {$term}</td>
            <td colspan='{$halfRow}'style= 'border: 1px solid black; '>DATE: {$sdate} To {$edate}</td>
        </tr>";

$record .= "<tr  style= 'text-align: center; '>
            <th style= 'border: 1px solid black; '>SR. <br> NO.</th>
            <th style= 'border: 1px solid black; '>ENROLLMENT <br> NO.</th>";
        if ($numRow > 0) {
            while ($dates = mysqli_fetch_array($runDateSql)) {
                $year = date("Y") . "-";
                $record .= "<th style= 'border: 1px solid black; '>" . $dates['sname'] . "<br>" . str_replace($year, " ", $dates['ldate']) . "</th>";
            }
        }else {
            $record .= "<th style= 'border: 1px solid black; '>No Data</th>";
        } // ................ END [02]
$record .= "</tr>";


// All Student Enrollment Numbers...... [01]
$enrollmentSql = "SELECT id,enrollment FROM studentregister WHERE division = '{$div}' AND term = {$term} ORDER BY enrollment";
$runEnrollmentSql = mysqli_query($conn, $enrollmentSql) or die("iQuery Fail");

if (mysqli_num_rows($runEnrollmentSql) > 0) {
    $i = 1;
    while ($enroll = mysqli_fetch_array($runEnrollmentSql)) {

$record .= "<tr  style= 'text-align: center;'>
    <td style= 'border: 1px solid black; '> " . $i++ . "</td>
    <td style= 'border: 1px solid black; '>{$enroll['enrollment']}</td>";

// All this subject classes Dates ID...... [03]
$dateIDSql = "SELECT id FROM classcreate WHERE subject = '{$subject}' AND term = '{$term}' AND division = '{$div}' AND tol = '{$tol}' AND ldate BETWEEN '{$sdate}' AND '{$edate}' ORDER BY ldate";
$runDateIDSql = mysqli_query($conn, $dateIDSql) or die("iQuery Fail");
while ($date = mysqli_fetch_array($runDateIDSql)) {
    // Student A & P Query........ [04]
    $sql = "SELECT * FROM studentattendance
    WHERE ldate = {$date['id']} AND enrollment = {$enroll['id']};";
    $runSql = mysqli_query($conn, $sql) or die("P & A Query Fail!");

    if (mysqli_num_rows($runSql) > 0) {
        $record .= "<td style= 'border: 1px solid black; '>P</td>";
    } else {
        $record .= "<td style= 'border: 1px solid black; '>A</td>";
    }
    // ................ END [04]
}
// ............................... END [03]	

$record .= "</tr>";

    }
    
} else {
    echo "<td style= 'border: 1px solid black; '>Division is Wrong!</td>";
}
// ............... END [01]

$record .= "</table>";

echo $record;
$fileName = $subject ."_". $tol ."_". $div ."_". $sdate ."TO". $edate;
//echo $fileName;
// header('Content-Type:application/xls');
// header("Content-Disposition:attachment; filename= {$fileName}.xls");
header('Content-Type:application/xls');
header("Content-Disposition:attachment; filename= {$fileName}.xls");

?>