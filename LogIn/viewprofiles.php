<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Profiles</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
  <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
  <script src="jquery-3.6.1.min.js"></script>
  <style>
    h1 {
      text-align: center;
    }

    p {
      text-align: center;
    }

    div {
      text-align: center;
    }
  </style>
  <script>
    function displayAllProfiles() {
      var url = "displayProfiles.php";
      try {
        asyncRequest = new XMLHttpRequest(); //create request object

        //register event handler
        asyncRequest.onreadystatechange = stateChange;
        asyncRequest.open('GET', url, true); // prepare the request
        asyncRequest.send(null); // send the request
      } catch (exception) {
        alert("Request failed");
      }

    }

    function stateChange() {
      // if request completed successfully
      if (asyncRequest.readyState == 4 && asyncRequest.status == 200) {
        document.getElementById("contentArea").innerHTML =
          asyncRequest.responseText; // places text in contentArea
      }
    }

    //default event handler
    $(function () {
      $("#accounttype").change(function () {
        //get content from the server using XMLHttpRequest
        $.ajax({
          url: "displayProfiles.php?accounttype=" + $("#accounttype").val(),
          async: true,
          success: function (result) {
            $("#contentArea").html(result);
          }
        })
      });
    })

    function removeAllProfiles() {
      document.getElementById("contentArea").innerHTML = "";
    }

    function init() {

      //define additional event handlers
      var allprofiles = document.links[11];
      allprofiles.addEventListener("mouseover", displayAllProfiles);
      allprofiles.addEventListener("mouseout", removeAllProfiles);
    }
    document.addEventListener("DOMContentLoaded", init);
  </script>
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
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <div class="card shadow">
        <div class="card-header py-3">
            <h1 class="text-secondary m-0 fw-bold">View Profiles</h1>
        </div>
        <div class="card-body">
            <div class="row">
            </div>
            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
    <a href="">
      <h2>All Profiles</h2>
    </a>

    <br>
    <div>
    <label for="accounttype"> Select an Account Type: </br>
      <select name="accounttype" id="accounttype">
        <?php
          require_once("db.php");

          $sql = "SELECT DISTINCT accounttype FROM users";
          $result = $mydb->query($sql);

          while ($row = mysqli_fetch_array($result)) {
            echo "<option value='" . $row["accounttype"] . "'>" . $row["accounttype"] . "</option>";
          }

          ?>
      </select>
    </label>
    <br></div>

    <div id="contentArea"></div>

</body>

</html>