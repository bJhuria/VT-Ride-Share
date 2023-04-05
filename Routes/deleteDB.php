<!doctype html>
<html>
<head>
  <title>Delete Stop</title>
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
  $err = false;

  if (isset($_POST["routeID"])) $routeID = $_POST["routeID"];

    require_once("db.php");

    if ($routeID != 0) {
      $sql = "DELETE FROM routes WHERE routeID=$routeID";
      $result=$mydb->query($sql);
      if ($result==1) {
        echo "<p>The route has been deleted.</p>";
      }
    }

    session_start();
    $rteid = $_SESSION['routeID'];
    if(empty($rteid))
      $rteid = $routeID;

    echo "<br><br>The route with route ID $rteid has been deleted. The data entry was made on ".$_COOKIE['inputTimeStamp'];
  ?>
  <a href="deleteStop.php">Return</a>

</body>
</html>