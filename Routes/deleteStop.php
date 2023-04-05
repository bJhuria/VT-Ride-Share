<?php
$routeID = 0;
$err = false;

if (isset($_POST["submit"])) {
    if (isset($_POST["routeID"]))
        $routeID = $_POST["routeID"];

    if (
        !empty($routeID)
    ) {
        //set the cookie and session variables before redirecting the user to the next page
        $inputTime = date("Y-m-d", strtotime("now"));
        setcookie("inputTimeStamp", $inputTime, time() + (24 * 60 * 60 * 2), "/");

        session_start();
        $_SESSION['routeID'] = $routeID;

        header("HTTP/1.1 307 Temporary Redirect");
        header("Location: deleteDB.php");
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
    <title>Delete Route</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="searchStops.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-truck">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                    </svg></span><span>vtrideshare | admin</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="addStop.php">Post</a></li>
                    <li class="nav-item"><a class="nav-link" href="deleteStop.php">Delete</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><button class="btn btn-primary" type="button">Log In</button><button class="btn btn-secondary" type="button" style="margin-left: 8px;">Sign Up</button>
            </div>
        </div>
    </nav>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="text-white p-4 p-md-5">
                            <h2 class="fw-bold text-white mb-3">Delete an Existing Stop</h2>
                            <p class="mb-4">Enter a Route ID below to delete an existing stop from the database *PERMANENTLY*</p>
                            <div class="my-3">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <label>Route ID:
                                        <input type="number" name="routeID" value="<?php if (!empty($routeID) && $routeID > 0) echo $routeID; ?>" />
                                        <?php
                                        if ($err && empty($routeID)) {
                                            echo "<label class='errlabel'>Error: Please enter a Route ID.</label>";
                                        }
                                    ?>
                                    </label>
                                    <br />
                                    <input type="submit" name="submit" value="Submit" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" src="assets/img/VA.png" style="background: url(&quot;assets/img/VA.png&quot;), var(--bs-blue);"></div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>