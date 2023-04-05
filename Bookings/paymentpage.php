<?php

$userID = "";
$cdName = "";
$cdNum = "";
$expDate = date("Y-m-d", strtotime("today"));
$CVC = "";
$err = false;

if (isset($_POST["submit"])) {
    if (isset($_POST["userID"])) $userID = $_POST["userID"];
    if (isset($_POST["CVC"])) $CVC = $_POST["CVC"];
    if (isset($_POST["cdName"])) $cdName = $_POST["cdName"];
    if (isset($_POST["cdNum"])) $cdNum = $_POST["cdNum"];
    if (isset($_POST["expDate"])) $expDate = $_POST["expDate"];


    if (
        !empty($cdName) && !empty($cdNum) && $CVC > 0
        && $expDate != date("Y-m-d", strtotime("today"))
    ) {
        require_once("db.php");
        if ($userID == 0) {
            $sql = "INSERT into userpaymentinfo(cdName, cdNum, expDate) VALUES('$cdName', '$cdNum', '$expDate')";
            $result = $mydb->query($sql);
        } else {
            $sql = "UPDATE userpaymentinfo set cdName='$cdName', cdNum='$cdNum', expDate='$expDate' where userID=$userID";
            $result = $mydb->query($sql);
        }
        header("Location: bookingconfirmation.php");
    } else {
        $err = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Payment page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
</head>

<body class="text-center">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
            <h3 class="fw-normal text-center" style="margin-top: 41px;">Add card details</h3>
            <p class="fw-lighter text-center">Please fill the information below.</p>

        </div>

        <label> User ID:
            <input type="number" id="userID" name="userID" />
            <p>If you are a new user, let the user ID be 0.</p>
        </label>
        <br />

        <label> Cardholder's Name:
            <input type="text" id="cdName" name="cdName">
            <?php
            if ($err && empty($cdName)) {
                echo "<label class='errlabel'>Error: Please enter the cardholder's name.</label>";
            }
            ?>
        </label>
        <br />
        <br />

        <label> Card Number:
            <input type="tel" id="cdNum" name="cdNum">
            <?php
            if ($err && empty($cdNum)) {
                echo "<label class='errlabel'>Error: Please enter the card number.</label>";
            }
            ?>

        </label>
        <br />
        <br />

        <label> Expiry date:
            <input type="date" id="expDate" name="expDate" />
            <?php
            if ($err && $expDate == (date("Y-m-d", strtotime("today")))) {
                echo "<label class='errlabel'>Error: Please enter the card's expiry date.</label>";
            }
            ?>
        </label>
        <br />
        <br />

        <label> CVC:
            <input type="tel" id="cvc" name="CVC">
            <?php
            if ($err && empty($CVC)) {
                echo "<label class='errlabel'>Error: Please enter the CVC.</label>";
            }
            ?>
        </label>
        <br />
        <br />

        <input type="submit" name="submit" value="Proceed to Payment" />

        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </form>
</body>

</html>