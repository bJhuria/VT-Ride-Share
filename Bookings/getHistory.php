<?php
  require_once("db.php");

  $BookingHistory = '';

  if(isset($_GET["BookingHistory"])) $BookingHistory = $_GET ["BookingHistory"];

  $sql="select BookingHistory, count(BookingHistory) as totalbookings from users where BookingHistory= '$BookingHistory'";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>