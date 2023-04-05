<?php
    //generate an html table with either all end destinations or a single end destination
    //the request would be either displayStops.php or display stops.php?pid=1
    //the php server would initialize a get request array $_GET

    $endDest = '';
    $sql = "";

    require_once("db.php");

    if(isset($_GET["endDest"])) $endDest = $_GET["endDest"];

    if($endDest=='') {
        //return an html table with all end destinations
        $sql = "SELECT * FROM routes"; //get all route records
    }
    else {
        //return an html table with a product having the specified product id
        $sql = "SELECT * FROM routes WHERE endDest = '$endDest'"; //get route records with the matching end destination
    }

    //execute the sql statement
    $result = $mydb->query($sql);

    //generate a table by processing each result row
    echo "<table>
    <thead>
        <tr>
            <th>RouteID</th>
            <th>Start Destination</th>
            <th>End Destination</th>
        </tr>
    </thead><tbody>"; //no repeating part of the table
    while($row=mysqli_fetch_array($result)) {
        echo "<tr><td>".$row["routeID"]."</td><td>".$row["startDest"]."</td><td>".$row["endDest"]."</td></tr>"; //each tr element in the table
    }
    echo "</tbody></table>"; //non repeating part of the table


?>