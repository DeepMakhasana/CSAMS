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
	<title>Class Create | GPValsad</title>
	<?php include 'links.php'; ?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<div class="content">
			<h2>GPValsad</h2>
			<div>
				<i class="fa fa-user"></i>
				<p  class="none"><?php echo $_SESSION['name']; ?></p>
				<a href="logout.php" class="btn">LOGOUT</a>
			</div>
		</div>
	</div>
	<main>

		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
			<h2>Class Create</h2>
			<label for="name">Subject Name</label>
			<input type="text" name="subject" placeholder="Subject" required>
			<div class="flex">
			<div>
			<label for="division">Division</label>
			<input type="text" name="div" placeholder="6M1" required>
			</div>
			<div>
			<label for="term">Term</label>
			<input type="text" name="term" placeholder="Term Number" required>
			</div>
			</div>
			<label for="tol">Type of Lecture</label>
			<select name="tol" required>
				<option value="">Choose a Type of Lecture</option>
				<option value="LECTURE">LECTURE</option>
				<option value="LAB">LAB</option>
			</select>
			<label for="date">Date</label>
			<input type="date" name="date" required>
			<!-- <input type="text" name="date" value="<?php //echo date('d - m - Y, l'); ?>"> -->

			<label for="time">Time</label>
			<div class="time"><input type="time" name="start" required><span>To</span><input type="time" name="end" required></div>
			<label for="sc">Secret Code</label>
			<?php 
				$bytes = random_bytes(3);
				$code = strtoupper(bin2hex($bytes));
				$sql = "SELECT scode FROM classcreate WHERE scode = '{$code}'";
				$sqlrun = mysqli_query($conn,$sql);

				if (mysqli_num_rows($sqlrun) > 0) {
					header("Location: {$location}/admin/classcreate.php");
				}else{
			 ?>
			<input type="text" name="scode" placeholder="Create Code" value="<?php echo $code; ?>" readonly>
			<?php } ?>
			<input type="submit" value="Create" name="create">
		</form>
		<?php 
			if (isset($_POST['create'])) {
				$sname = $_SESSION['sname'];
				$subject = mysqli_real_escape_string($conn,strtoupper($_POST['subject']));
				$div = mysqli_real_escape_string($conn,strtoupper($_POST['div']));
				$term = mysqli_real_escape_string($conn,strtoupper($_POST['term']));
				$tol = mysqli_real_escape_string($conn,$_POST['tol']);
				$date = mysqli_real_escape_string($conn,$_POST['date']);
				$stime = mysqli_real_escape_string($conn,$_POST['start']);
				$etime = mysqli_real_escape_string($conn,$_POST['end']);
				$scode = mysqli_real_escape_string($conn,$_POST['scode']);

				// Time 13:00:00 to 01:00:00 in change...... START_01
				$tow_char_stime = substr($stime, 0,2);
				$tow_char_etime = substr($etime, 0,2);

				function times($oldTime,$Time) {
					switch ($oldTime) {
						case '13':
							$newTime = "01";
							break;
						case '14':
							$newTime = "02";
							break;
						case '15':
							$newTime = "03";
							break;
						case '16':
							$newTime = "04";
							break;
						case '17':
							$newTime = "05";
							break;
						case '18':
							$newTime = "06";
							break;
						case '19':
							$newTime = "07";
							break;
						case '20':
							$newTime = "08";
							break;
						case '21':
							$newTime = "09";
							break;
						case '22':
							$newTime = "10";
							break;
						case '23':
							$newTime = "11";
							break;
						case '00':
							$newTime = "12";
							break;
						default:
							$newTime = $oldTime;
							break;
					}

					return str_replace($oldTime, $newTime, $Time);
				}

				$s_time = times($tow_char_stime,$stime);
				$e_time = times($tow_char_etime,$etime);
				// ........................................ END_01
				
				$insertsql = "INSERT INTO classcreate (sname,subject,division,term,tol,ldate,stime,etime,scode) VALUES ('{$sname}','{$subject}','{$div}',{$term},'{$tol}','{$date}','{$s_time}','{$e_time}','{$scode}')";
            	$insertrun = mysqli_query($conn,$insertsql) or die("iQuery Fail.");
            	if ($insertrun) {
                    echo '<script>alert("Register Succfully.")</script>';
                    header("Location: {$location}/admin/home.php");
                } else {
                    echo '<script>alert("try agen Not Class Create!")</script>';
                }
			}
		 ?>
	</main>
</body>
</html>