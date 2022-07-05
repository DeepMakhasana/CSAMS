<?php 
 include '../includes/config.php';
    session_start();
    if (!isset($_SESSION['enroll'])) {
        header("Location: {$location_student}/login.php");
    }
    $sid = $_SESSION['id'];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Home Student</title>
   <?php include 'links.php'; ?>
   <!-- CSS Fills -->
   <link rel="stylesheet" href="css/home.css">
 </head>
 <body>
 	<div class="header">
      <div class="content">
         <h2>GPValsad</h2>
         <div>
            <a href="profile-update.php"><i class="fa fa-user"></i></a>
            <p class="none"><a href="profile-update.php"><?php echo $_SESSION['enroll']; ?></a></p>
            <a href="logout.php" class="btn">LOGOUT</a>
         </div>
      </div>
   </div>
   <main>
      <div class="class">
         <a href="attendclass.php">Attend Class</a>
      </div>
      <?php 
      // SELECT Unique date for attned lecture
         $owner = $_SESSION['id'];
         $sqlDate = "SELECT DISTINCT c.ldate
               FROM studentattendance AS a
               INNER JOIN classcreate AS c
               ON a.sname = c.id
               WHERE a.enrollment = {$owner}
               ORDER BY c.ldate DESC";
         $sqlDaterun = mysqli_query($conn,$sqlDate) OR die("sQuery Fail!");

         if (mysqli_num_rows($sqlDaterun) > 0) {
            while ($date = mysqli_fetch_array($sqlDaterun)) {
               $dates = $date['ldate'];
               // Day id Find
               $sqlDay = "SELECT DISTINCT DAYOFWEEK('{$dates}') as day
                     FROM studentattendance AS a
                     INNER JOIN classcreate AS c
                     ON a.sname = c.id
                     WHERE a.enrollment = {$owner}
                     ORDER BY c.ldate DESC";
               $sqlDayRun = mysqli_query($conn,$sqlDay) OR die("Query Fail!");
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

            $sql = "SELECT a.id,c.sname,c.subject,c.tol,c.ldate,c.stime,c.etime
               FROM studentattendance AS a
               INNER JOIN classcreate AS c
               ON a.sname = c.id
               WHERE a.enrollment = {$owner} && c.ldate = '{$dates}'
               ORDER BY a.ldate DESC";
            $sqlrun = mysqli_query($conn,$sql) OR die("Query Fail!");
            while ($row = mysqli_fetch_array($sqlrun)) {
       ?>
      <div class="attendClasses">
            <div>
               <p>Subject: <?php echo $row['subject'] . " " . $row['tol'] . " (" . $row['sname'] . ")";?></p>
            </div>
            <div>
               <p>Date: <?php echo $row['ldate'];?></p>
            </div>
            <div>
               <p>Time: <?php echo $row['stime'] . " To " . $row['etime'];?></p>
            </div>
      </div>
      <?php }
         }
      }
       ?>
   </main>
 </body>
 </html>