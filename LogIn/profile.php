<?php
session_start();
require_once("db.php");

$username="";
$password="";
$firstname = "";
$lastname = "";
$accounttype="";


if(isset($_SESSION['idusers'])){
    $userid=$_SESSION['idusers'];
    $sql="SELECT * FROM users WHERE idusers=$userid";
    // echo $sql;
    $result=$mydb->query($sql);

    if($row=mysqli_fetch_array($result)){
        $username = $row["username"];
        $password=$row["password"];
        $firstname=$row["firstname"];
        $lastname=$row["lastname"];
        $accounttype=$row["accounttype"];

    }
    else{
        echo "<div class='alert alert-danger'><strong>User not found</strong></div>"; 
    }
}


if(isset($_POST['update'])){
    if(isset($_POST['username'])) $username=$_POST['username'];
    if(isset($_POST['password'])) $password=$_POST['password'];
    if(isset($_POST['firstname'])) $firstname=$_POST['firstname'];
    if(isset($_POST['lastname'])) $lastname=$_POST['lastname'];
    if(isset($_POST['accounttype'])) $accounttype=$_POST['accounttype'];

    $sql="UPDATE users SET username='$username' ,password='$password',firstname='$firstname', lastname='$lastname', accounttype='$accounttype'WHERE idusers='$userid' ";
    //echo $sql;
    
    $result=$mydb->query($sql);

    if($result==1){
        //echo "User Profile Updated Successfully!";
        header("Location:success2.html");
    } else{
        echo "<div class='alert alert-danger'><strong>User Profile Update Failed. Please Try Again.</strong></div>";
    }
}


if(isset($_POST['delete'])){
    if(isset($_POST['idusers'])) $userid=$_POST['idusers'];

    $sql="DELETE FROM users where idusers=$userid ";
    $result=$mydb->query($sql);

    if($result==1){
        //echo "User Profile Deleted Successfully!";
        header("Location:success3.html");
    } else{
        echo "<div class='alert alert-danger'><strong>User Profile Deletion Failed. Please Try Again.</strong></div>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary bg-primary border rounded-circle border-5 border-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-car text-center text-white" style="font-size: 20px;">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <circle cx="17" cy="17" r="2"></circle>
                        <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5"></path>
                    </svg></span><span>vtrideshare</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="explore.html">Explore</a></li>
                    <li class="nav-item"><a class="nav-link" href="map.html">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Profile&nbsp;</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="profile.php">View Profile</a><a class="dropdown-item" href="viewprofiles.php">Search Users</a><a class="dropdown-item" href="usergraph.php">User Graph</a></div>
                    </li>
                </ul><a class="btn btn-primary shadow" role="button" href="login.php" style="margin-right: 11px;">Log In</a><a class="btn btn-secondary bg-secondary shadow" role="button" href="signup.php">Sign up</a>
            </div>
        </div>
    </nav>
    <div class="card"></div>
    <div class="col">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Profile</p>
            </div>
            <div class="card-body">
                <form method='post'>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" value="<?php echo $username; ?>" name="username"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="password"><strong>Password</strong></label><input class="form-control" type="password" id="password" value="<?php echo $password; ?>"  name="password"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" value="<?php echo $firstname; ?>"  name="first_name"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" value="<?php echo $lastname; ?>"  name="last_name"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="account_type"><strong>Account Type</strong></label><input class="form-control" type="text" id="account_type" value="<?php echo $accounttype; ?>" name="account_type"></div>
                        </div>
                    </div>
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name='update'>Save Settings</button>
                    <button class="btn btn-primary btn-sm" type="submit" name='delete' style="margin-left: 14px;background: var(--bs-secondary);">Delete Account</button></div>
                </form>
            </div>
        </div>
        <div class="card shadow"></div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>