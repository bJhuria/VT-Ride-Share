<?php
  //this page receives the get request initiated from showProducts.php, the get request has a variable named sid (line 48 in showProducts.php)
  //to test this page, type localhost/HW14_key/getData.php?sid=1 in the address bar of your browser
  $userid = 0;

  
  require_once("db.php");

  $sql = "select userid, count(Comments) as commentcount from Ratings group by userid";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
