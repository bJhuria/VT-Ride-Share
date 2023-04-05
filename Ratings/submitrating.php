<?php
$userid=0;
$clean=0;
$polite=0;
$comfort=0;
$overall=0;
$comment="";

require_once("db.php");

if(isset($_POST["submit"])){
    if(isset($_POST["userid"])) $userid = $_POST["userid"];
    if(isset($_POST["Clean"])) $clean = $_POST["Clean"];
    if(isset($_POST["Polite"])) $polite = $_POST["Polite"];
    if(isset($_POST["Comfort"])) $comfort = $_POST["Comfort"];
    if(isset($_POST["Overall"])) $overall = $_POST["Overall"];
    if(isset($_POST["Comments"])) $comment = $_POST["Comments"];
    
  
    $sql = "insert into Ratings(userid,Clean,Polite,Comfort,Overall,Comments) values ('$userid','$clean','$polite','$comfort','$overall','$comment')";
    $result = $mydb -> query($sql);
    echo $result;

    if($result==1){
        echo "<div class='alert alert-danger'>
        <Strong>Yes</strong>
        </div>";
         header("HTTP/1.1 307 Temporary Redirect");
         header("Location:submitted.php");
    } else{
        echo "<div class='alert alert-danger'>
        <Strong>Something went wrong </strong>
        </div>";
    }


}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Submit Rating (Backup 1670006283444)</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-car">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <circle cx="17" cy="17" r="2"></circle>
                        <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5"></path>
                    </svg></span><span>Brand</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="submitrating.php">Submit</a></li>
                    <li class="nav-item"><a class="nav-link" href="updaterating.php">Update&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link" href="searchcomment.php">Search Comments</a></li>
                    <li class="nav-item"><a class="nav-link" href="searchoverall.php">Search Overall</a></li>
                    <li class="nav-item"><a class="nav-link" href="commentsgraph.php">Comment Graph</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                </ul><button class="btn btn-primary" type="button" style="margin: 10px;">Login</button><button class="btn btn-secondary" type="button">Sign up</button>
            </div>
        </div>
    </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Submit Rating</h2>
                    <p class="w-lg-50">Please submit your rating using this form</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center" style="height: 600px;">
                            <form class="text-center" method="post"  >
                                <div class="mb-3">
                                    <p>Enter Driver ID</p><input class="form-control" type="text" id =" userid" name="userid" placeholder="Number" min="0" max="5" value="2">
                                    <p>Cleanliness of driver</p><input class="form-control" type="number"  id="Clean" name="Clean" placeholder="Number" min="0" max="5" value="Clean">
                                </div>
                                <div class="mb-3">
                                    <p>Politeness of Driver</p><input class="form-control" type="number"id="Polite" name="Polite" placeholder="Password" min="1" max="5" value="4">
                                </div>
                                <div>
                                    <p>Rate how comfortable you would be with riding with this driver again<input class="form-control" type="number" Id= "Comfort" name =" Comfort" min="1" max="5" value="3"></p>
                                </div>
                                <div>
                                    <p>How would you rate this driver overall?</p><input class="form-control"name="Overall" id="Overall" type="number" min="1" max="5" value="3">
                                </div>
                                <div>
                                    <p>Leave any additional comments below<input class="form-control form-control-lg" type="text" name="Comments" id="Comments"></p>
                                </div>
                                <div class="mb-3"></div>
                                <button class="btn btn-primary d-block w-100" type="submit" name="submit" style="background: rgb(120, 194, 173);margin: 10px;">Submit</button> </form>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>