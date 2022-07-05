<?php 
    include '../includes/config.php';
    session_start();
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
		<h2>Forgotten Password</h2>
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="email">Email Id</label>
                <input type="email" name="email" placeholder="XXXXXXXXXXXX@gpvalsad.ac.in" required>

                <input type="submit" value="Get OTP" name="forget">
            </form>
            
        <?php 
            if (isset($_POST['forget'])) {
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                $_SESSION['email'] = $email;
                $sql = "SELECT * FROM studentregister WHERE email='{$email}'";
                $run = mysqli_query($conn,$sql);

                if (mysqli_num_rows($run) > 0) {
                    $otp = rand(111111,999999);
                    $updateOTPsql = "UPDATE studentregister SET otp={$otp} WHERE email='{$email}'";
                    $runOTP = mysqli_query($conn,$updateOTPsql);
                    if ($runOTP) {
                        $subject = "OTP Verification";

                        $getOtpSql = "SELECT otp FROM studentregister WHERE email='{$email}'";
                        $runGetOtpSql = mysqli_query($conn,$sql);
                        $getOTP = mysqli_fetch_array($runGetOtpSql);
                        $otp = $getOTP['otp'];
                        //echo $otp;
                        $body = "Government Polytechnic, Valsad
                                Verify OTP
                                Please copy and paste the folloein code into the Enter OTP code field.
                                OTP : " . $otp;
                        $from = "From: dep7901@gmail.com";
                        if (mail($email,$subject,$body,$from)) {
                           header("Location: {$location_student}/otp.php");
                        } else {
                            echo '<script>alert("try again! Not send OTP")</script>';
                        }

                    } else {
                        echo '<script>alert("try again!")</script>';
                    }
                    
                } else {
                    echo '<script>alert("Please Enter Valid Email Id!")</script>';
                }
                
            }
            ?>
        </div>
	</main>
</body>
</html>