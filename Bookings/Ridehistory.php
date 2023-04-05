<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ride history</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            empty-cells: show;
        }

        th {
            color: white;
            background-color: rgba(242, 106, 7, 0.92);
        }

        td {
            height: 20px;
            color: white;
            background-color: rgb(24, 79, 244);
        }
    </style>

    <script src="jquery-3.1.1.min.js"></script>
    <script>
        var asyncRequest;

        $(function() {
            $("#submit").click(function() {
                $.ajax({
                    url: "history.php?lastname=" + $("#lastname").val(),
                    async: true,
                    success: function(result) {
                        $("#contentArea").html(result);
                    }
                })
            })
        })

        $(function() {
            $("#delete").click(function() {
                $.ajax({
                    url: "delete.php?lastname=" + $("#lastname").val(),
                    async: true,
                    success: function(result) {
                        alert('Profile deleted succesfully');
                    }
                })
            })
        })
    </script>
</head>

<body class="fw-lighter">
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

    <h1 class="display-4 text-center" style="margin-bottom: 35px;margin-top: 20px;">Ride History</h1>
    <br />
    <label> Enter Name:
        <input type="text" name="lastname" id="lastname" placeholder="Enter Lastname">
    </label>
    <input type="button" name="submit" id="submit" href="" value="Get History" />
    <input type="button" name="delete" id="delete" href="" value="Delete Profile" />
    <br/>
    <br/>
    <a href="ridehistorychart.php" target="_blank">Click here to see graphical representation by your Destinations.</a>

    <br />
    <br />
    <div id="contentArea">&nbsp;</div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>