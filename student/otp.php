<?php
    include '../includes/config.php';
    session_start();
    $email = $_SESSION['email'];
    if (!isset($email)) {
        header("Location: {$location_student}/reset-password.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten Password | GPValsad Student</title>
    <?php include 'links.php';?>
	<!-- CSS Fills -->
	<link rel="stylesheet" href="css/style.css">
    <style>
        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.5em;
        }
        form {
            width: 50%;
        }
        label,input,select,.error {
            width: 60%;
        }
    </style>
</head>
<body>
    <main>
		<h2>Enter OTP</h2>
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="email">OTP</label>
                <input type="number" name="otp" placeholder="Enter OTP" required>

                <input type="submit" value="Enter" name="reset">
            </form>
            
        <?php 
            if (isset($_POST['reset'])) {
                $enterOTP = mysqli_real_escape_string($conn,$_POST['otp']);
                
                $getOtpSql = "SELECT otp FROM studentregister WHERE email='{$email}'";
                $runGetOtpSql = mysqli_query($conn,$getOtpSql);
                $getOTP = mysqli_fetch_array($runGetOtpSql);
                $otp = $getOTP['otp'];

                if ($enterOTP === $otp) {
                    header("Location: {$location_student}/create_password.php");
                } else {
                    echo '<script>alert("OTP Not Valid!")</script>';
                }
                
            }
            ?>
        </div>
	</main>
</body>
</html>