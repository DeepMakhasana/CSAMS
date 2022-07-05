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
    <title>Create New password | GPValsad Student</title>
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
        <h2>Create New Password</h2>
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="password">Create New Password</label>
                <input type="password" name="pass" placeholder="Create Password" required>
                <label for="password">Repeat New Password</label>
                <input type="password" name="cpass" placeholder="Repeat Password" required>

                <input type="submit" value="Change password" name="change">
            </form>

            <?php
                if (isset($_POST['change'])) {
                    if ($_POST['pass'] === $_POST['cpass']) {
                        $password = mysqli_real_escape_string($conn,$_POST['pass']);
                        $cpassword = mysqli_real_escape_string($conn,$_POST['cpass']);
                        // password Hashing
                        $pass = password_hash($password, PASSWORD_BCRYPT);
                        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

                        $updateSql = "UPDATE studentregister SET cpassword = '{$pass}', rpassword ='{$cpass}' WHERE email= '{$email}'";
                        $run = mysqli_query($conn, $updateSql);
                        if ($run) {
                            session_unset();
                            session_destroy();
                            header("Location: {$location_student}/login.php");
                        } else {
                            echo '<script>alert("try agein!")</script>';
                        }
                        
                    } else {
                        echo '<script>alert("Password No Match!")</script>';
                    }
                    
                   

                }
            ?>
        </div>
    </main>
</body>
</html>