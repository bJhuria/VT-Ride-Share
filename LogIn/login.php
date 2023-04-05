<?php
$error=false;
$username="";
$password="";
$userid= "";
$loginok=null;



if (isset($_POST["submit"])){
        //input validation
        if (isset($_POST["username"])) $username = $_POST['username'];
        if (isset($_POST["password"])) $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            $error = true;
        }
    
        if (!$error) {
            require_once("db.php");
            $sql="SELECT password, idusers FROM users WHERE username = '$username'";
            $result=$mydb->query($sql);
            // $row=mysqli_fetch_array($result);
            
            while($row=mysqli_fetch_array($result)){
                $userid = $row["idusers"];

                if (strcmp($password,$row["password"])==0){//connected to $sql 
                    $loginok=true;

                } 
                else {
                    //echo "<div class='alert alert-danger'><strong>Username or Password is Incorrect. Please try again./strong></div>";
                //echo "wrong pass";
                    $loginok=false;
                }

                //echo $loginok;
                if ($loginok){
                    session_start();
                    $_SESSION["idusers"]= $userid;

                    header("Location:profile.php");
                }
               //if (!$loginok){
                   // echo "<div class='alert alert-danger'><strong>Username or Password is Incorrect. Please try again./strong></div>";

                //}
            }   
            //redirect the user to the next page
            //header("HTTP/1.1 307 Temporary Redirect"); //
            
        }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">

    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span
          class="bs-icon-sm bs-icon-circle bs-icon-primary bg-primary border rounded-circle border-5 border-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg
            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icon-tabler-car text-center text-white" style="font-size: 20px;">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="7" cy="17" r="2"></circle>
            <circle cx="17" cy="17" r="2"></circle>
            <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5"></path>
          </svg></span><span>vtrideshare</span></a><button data-bs-toggle="collapse" class="navbar-toggler"
        data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="explore.html">Explore</a></li>
          <li class="nav-item"><a class="nav-link" href="map.html">Map</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
          <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
              data-bs-toggle="dropdown" href="#">Profile&nbsp;</a>
            <div class="dropdown-menu"><a class="dropdown-item" href="profile.php">View Profile</a><a
                class="dropdown-item" href="viewprofiles.php">Search Users</a><a class="dropdown-item"
                href="usergraph.php">User Graph</a></div>
          </li>
        </ul><a class="btn btn-primary shadow" role="button" href="login.php" style="margin-right: 11px;">Log In</a><a
          class="btn btn-secondary bg-secondary shadow" role="button" href="signup.php">Sign up</a>
      </div>
    </div>
  </nav>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="display-6" style="margin-top: 28px;">Virginia Tech Rideshare Log in</h2>
                    <p class="w-lg-50">Please log in below to begin using vtrideshare!</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary-light bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-car">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="7" cy="17" r="2"></circle>
                                    <circle cx="17" cy="17" r="2"></circle>
                                    <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                                <?php
                                        if ($error && empty($username)) {
                                            echo "<div class='error'>Please enter your username</div>";
                                        }
                                ?>
                            </div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                            <?php
                            if ($error && empty($username)) {
                                    echo "<div class='error'>Please enter your password</div>";
                                }
                            ?>
                            </div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" input type="submit" name="submit" value="Send">Login</button></div>
                                <p class="text-muted">Forgot your password?</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>