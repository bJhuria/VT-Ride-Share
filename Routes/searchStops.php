<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
    <style>
        label {
            color: white;
            background-color: lightpink;
        }

        h3 {
            color: lightgreen;
        }

        table {
            text-align: center;
            margin-left:auto;
            margin-right:auto;
        }

        table thead {
            background-color: lightgreen;
            color: white;
            font-family: sans-serif;
        }

        table td:first-child {
            background-color: lightgreen;
        }

        table tbody {
            background-color: lightpink; 
        }

        form {
            margin-left: auto;
            margin-right: auto;
        }

        /*a:link {
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
        }
        */
    </style>

    <script src="jquery-3.6.1.min.js"></script>
    <script>
        function displayAllStops() {
            //initiate an ajax request to displayStops.php?>pid=1
            var request;
            var url = "displayStops.php";
            try {
                request = new XMLHttpRequest();

                request.onreadystatechange = stateChange;
                request.open('GET', url, true);
                request.send(null);
            } catch (exception) {
                alert("The Ajax request has failed");
            }

            function stateChange() {
                if (request.readyState == 4 && request.status == 200) {
                    document.getElementById("contentArea").innerHTML = request.responseText;
                }
            }
        }

        function blankContent() {
            document.getElementById("contentArea").innerHTML = "";
        }

        $(function() {
            $("#endDest").change(function() {
                console.log("displayStops.php?endDest=" + $("#endDest").val());
                $.ajax({
                    url: "displayStops.php?endDest=" + $("#endDest").val(),
                    async: true,
                    success: function(result) {
                        $("#contentArea").html(result);
                    }
                })
            })
        })

        function init() {
            //define additional event handlers
            var allStops = document.getElementById("allStops");
            allStops.addEventListener("mouseover", displayAllStops);
            allStops.addEventListener("mouseout", blankContent);
        }
        document.addEventListener("DOMContentLoaded", init);
        window.addEventListener("load", init, false);
    </script>
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
    <header style="padding: 192px 0px;background: url(&quot;assets/img/image1.jpeg&quot;) no-repeat;background-size: cover;opacity: 1;backdrop-filter: opacity(1) contrast(119%) grayscale(0%);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-6 col-xxl-8 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <p class="fw-bold text-success mb-2"></p>
                        <h1 class="fw-bold"><span style="color: rgb(249, 249, 249);">Need a ride?</span></h1>
                        <a href="">
                            <h3 id="allStops">View All Stops</h3>
                        </a>
                        <label for="endDest">Select an end destination to see routes going to your stop!:</label>
                        <select name="endDest" id="endDest">
                            <?php
                            //use php to dynamically generate the option elements
                            require_once("db.php");

                            $sql = "SELECT DISTINCT endDest FROM routes"; //get a list of end destination values from the database

                            $result = $mydb->query($sql);

                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row["endDest"] . "'>" . $row["endDest"] . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <div id="contentArea"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <form method="get" action="showEndDest.php">
        <label for="">Select an end destination to see the number of routes going there:
        <select name="edest">
            <!-- use php code to retrieve end destinations from the database and dynamically generate the option elements -->
            <?php
                    require_once("db.php");

                    $sql = "SELECT DISTINCT endDest FROM routes"; //get a list of end destinations from the database
            
                    $result = $mydb->query($sql);
            
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row["endDest"] . "'>" . $row["endDest"] . "</option>";
                    }
            ?>
        </select>
        </label>
        <input type="submit" name="submit" value="Send">
        <br>
    </form>
    <div class="card"></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>