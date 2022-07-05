<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Government Polytechnic, Valsad | Attendance System</title>
	<!-- css links -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<header>
		<!-- Navber -->
		<nav class="navbar navbar-expand-lg navbar-dark" style="background: #2C4897;">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php" style="letter-spacing: 3px;">GPValsad</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Faculty
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
							<li><a class="dropdown-item" href="admin/staffregister.php">Faculty Registration</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="admin/login.php">Faculty Login</a></li>
						</ul>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="student/registration.php">Student Registration</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="student/login.php">Student Login</a>
					</li>
				</ul>
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
        <!-- hero section -->
        <section class="hero mt-2">
            <div class="row justify-content-center align-items-center flex-column flex-md-row">
                <div class="col-lg-6 col my-3">
                    <img src="images/educator.svg" class="img-fluid" alt="educator illustration">
                </div>
                <div class="col-lg-6 col ps-4 my-3">
                    <h1 class="h1 display-6">Easily Get Student Daily Attendance</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident magnam quibusdam ex consequuntur quia dicta autem voluptatem officiis aut voluptates labore veritatis alias.</p>
                    <a href="student/login.php" class="btn btn-primary px-4">Student Login</a>
                </div>
            </div>
			<div class="row justify-content-center align-items-center flex-column flex-md-row mt-5" style="background: #F2F2F2;">
				<div class="col-lg-6 col ps-4 my-3">
                    <h1 class="h1 display-6">Solve the complex manual attendance system</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident magnam quibusdam ex consequuntur quia dicta autem voluptatem officiis aut voluptates labore veritatis alias.</p>
                </div>
				<div class="col-lg-6 col my-3">
                    <img src="images/manual.svg" class="img-fluid" alt="educator illustration">
                </div>
            </div>
			<div class="row justify-content-center align-items-center flex-column flex-md-row my-5">
                <div class="col-lg-6 col my-3">
                    <img src="images/operatingeasy.svg" class="img-fluid" alt="educator illustration">
                </div>
                <div class="col-lg-6 col ps-4 my-3">
                    <h1 class="h1 display-6">Attendance System operating easy and helpfully for Faculty</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident magnam quibusdam ex consequuntur quia dicta autem voluptatem officiis aut voluptates labore veritatis alias.</p>
                </div>
            </div>
        </section>
	</div>
	
	<footer class="bg-secondary">
        <div class="text-center py-3" style="color: white;">© 2021 Deep Makhasana, Inc. All rights reserved.</div>
    </footer>

	<!-- JavaScript link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>