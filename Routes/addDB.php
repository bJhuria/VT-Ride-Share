<!doctype html>
<html>
<head>
  <title>Add Stop</title>
  <style>
    table, td {
      border: 1px solid white;
    }
    table {
      border-collapse: collapse;
      empty-cells: show;
    }
    th, td:first-child{
      color: white;
      background-color: rgb(166, 68, 12);
    }
    td {
      width: 15em;
      height: 20px;
      color: white;
      background-color: rgb(245, 211, 136);
    }
  </style>
</head>
<body>
  <?php
  $routeID = 0;
  $startDest = "";
  $endDest = "";
  $err = false;

  if (isset($_POST["routeID"])) $routeID = $_POST["routeID"];
  if (isset($_POST["startDest"])) $startDest = $_POST["startDest"];
  if (isset($_POST["endDest"])) $endDest = $_POST["endDest"];

    require_once("db.php");

    if ($routeID == 0) {
      $sql = "insert into routes(startDest, endDest)
              values('$startDest', '$endDest')";
      $result=$mydb->query($sql);
      if ($result==1) {
        echo "<p>A new route has been added.</p>";
      }

      //For the newly added route, the database will assign a
      //unique routeID value. The code here is tring to query the database
      //for the latest routeID value
      $sql = "select max(routeID) as maxrid from routes";
      $result = $mydb->query($sql);
      $row=mysqli_fetch_array($result);
      $routeID = $row["maxrid"]; //maxrid is the column name in the sql result table
      
    } else {
      $sql = "update routes set startDest='$startDest', endDest='$endDest' where routeID=$routeID";
      $result=$mydb->query($sql);

      if ($result==1) {
        echo "<p>An existing route has been updated.</p>";
      }
    }

    session_start();
    $rteid = $_SESSION['routeID'];
    if(empty($rteid))
      $rteid = $routeID;

    $sDest = $_SESSION['startDest'];
    $eDest = $_SESSION['endDest'];

    echo "<br><br>$sDest to $eDest route ID is $rteid. The data entry was made on ".$_COOKIE['inputTimeStamp'];
  ?>
  <a href="addStop.php">Return</a>

</body>
</html>