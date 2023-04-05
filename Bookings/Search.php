<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">

</head>

<body>
    <form method="get" id="form" name="form" action="displayuser.php" >
        <nav class="navbar navbar-light navbar-expand-md py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="fs-6 fw-light">vtrideshare</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-3">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active fs-6" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="Search.php">Search</a></li>
                        <li class="nav-item"><a class="nav-link" href="paymentpage.php">Ride</a></li>
                        <li class="nav-item"><a class="nav-link" href="Ridehistory.php">Profile</a></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    </ul><button class="btn btn-primary bg-primary" type="button">Log In</button><button class="btn btn-secondary" type="button" style="margin-left: 22px;">Sign up</button>
                </div>
            </div>
        </nav>
        <div>
            <h2 class="text-center" style="margin-top: 27px;">Trying to look someone?</h2>
        </div>
        <p class="text-center">Search below to find drivers and users</p>
        <label style="margin-left:150px ;"> Search People:
            <input type="text" id="lastname" name="lastname" style="margin-top: 36px;margin-left: 199px;" placeholder="Enter Lastname">
        </label>
        <input type="submit" name="submit" value="Search" />
        <p class="text-info" style="margin-top: 46px;margin-left: 51px;"></p>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    </form>

</body>

</html>