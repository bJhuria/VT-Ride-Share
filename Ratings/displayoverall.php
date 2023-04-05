<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>


<?php
//generate html table with either all products or a single product
//the request would be either displayproducts.php or displayProducts.php?pid=1
//the php server would intialzie a ger request arrat $_GET
require_once("db.php");
$userid = 0;
$sql="";

if(isset($_GET["userid"])) $userid=$_GET["userid"];

if($userid==0){
    // return an html table with all products
    $sql="select Overall from Ratings"; // get all product orders
} else{
    // return at html table with a prod having specified prod id
    $sql="select Overall from Ratings where userid=".$userid;  // get 1 product record with matching id
}
// execture sql statement
$result= $mydb->query($sql);
//generate a table by processing each result row
echo '<table>';
echo '<tr>';
echo '  <th> Overall </th>';
echo '</tr>'; // no repeating part of the table
while($row= mysqli_fetch_array($result)){
 echo '<tr><td>' .$row['Overall'] . '</td></tr>';
}; //"<tr><td>".$row["ProductID"]."</td>.</tr></tbody>"; //each tr element in the table

echo "</tbody>";//non repeating part of table

?>

