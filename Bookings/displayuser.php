<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
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


</head>

<body>

  <?php

  $lastname = $_GET['lastname'];

  require_once("db.php");

  $sql = "select firstname, lastname, accounttype from users where lastname='$lastname'";

  $result = $mydb->query($sql);

  echo "<table>";
  echo "<thead>";
  echo "<th>firstname</th><th>lastname</th><th>accounttype</th>";
  echo "</thead>";

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["accounttype"] . "</td>";
    echo "</tr>";
  }

  ?>

</body>

</html>