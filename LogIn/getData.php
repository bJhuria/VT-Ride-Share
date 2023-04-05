<?php
  require_once("db.php");

  //$userid = 0;
  
  //if(isset($_GET["idusers"])) $supplierid=$_GET["idusers"];

  //get total instock value and name of each product provided by the selected supplier
  $sql="SELECT accounttype, count(idusers) as totalValue FROM users GROUP BY accounttype";

  
  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
