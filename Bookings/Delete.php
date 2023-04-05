<?php
$lastname = "";
if (isset($_GET['lastname'])) $lastname = $_GET['lastname'];

require_once("db.php");

$sql = "";

$sql = "DELETE from users where lastname='$lastname'";

$result = $mydb->query($sql);

?>