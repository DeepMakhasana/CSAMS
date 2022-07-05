<?php 
 include '../includes/config.php';
    session_start();
    if (!isset($_SESSION['enroll'])) {
        header("Location: {$location_student}/login.php");
    }
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
            <p  class="none"><?php echo $_SESSION['enroll']; ?></p>
            <a href="logout.php" class="ml-1">LOGOUT</a>
         </div>
      </div>
   </div>
   <main>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      	<h2>Attend Class</h2>
      	<label for="scode">Secret Code</label>
		<input type="text" name="scode" placeholder="Enter Code" required>

		<input type="submit" value="Enter" name="enter">
      
      <?php 
      if (isset($_POST['enter'])) {
         $scode = mysqli_real_escape_string($conn,$_POST['scode']);
         $sql = "SELECT * FROM classcreate WHERE scode = '{$scode}'";
         $run = mysqli_query($conn, $sql);

         if (mysqli_num_rows($run) > 0) {

            $fetch_id = mysqli_fetch_array($run);
            $id = $fetch_id['id'];

      ?>
      <div class="classes">
            <div>
               <p>Subject: <?php echo $fetch_id['subject'] . " " . $fetch_id['tol']; ?></p>
               <p>Class: <?php echo $fetch_id['division'];?></p>
            </div>
            <div>
               <p>Date: <?php echo $fetch_id['ldate'];?></p>
               <p>Time: <?php echo $fetch_id['stime'] . " To " . $fetch_id['etime'];?></p>
            </div>
            <div>
               <a href="present.php?id=<?php echo $id; ?>">Present</a>
            </div>
         </div>
      <?php

         } else {
            echo '<script>alert("Enter Valid Code!")</script>';
         }
         
      }
         
       ?>
      </form>
   </main>
 </body>
 </html>