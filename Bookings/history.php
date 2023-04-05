<?php
$lastname = "";
if (isset($_GET['lastname'])) $lastname = $_GET['lastname'];

require_once("db.php");

$sql = "";

$sql = "select * from users where lastname='$lastname'";

$result = $mydb->query($sql);

echo "<table>";
echo "<thead>";
echo "<th>FirstName</th><th>LastName</th><th>AccountType</th><th>BookingHistory</th>";
echo "</thead>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["accounttype"] . "</td>
            <td>" . $row["BookingHistory"] . "</td>";
    echo "</tr>";
}
