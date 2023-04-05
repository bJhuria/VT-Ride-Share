<?php
    //generate an html table with either all products or a single product
    //the request would be either displayProducts.php or displayProducts.php?pid=1
    //the php server would initialize a get request array $_GET

    $accountid = 0;
    $sql="";
    require_once("db.php");

    if(isset($_GET["accounttype"])) $accountid=$_GET["accounttype"];

    if($accountid==0){
        //return an html table with all products
        $sql="SELECT firstname, lastname, username, accounttype FROM users"; //get all product records
    } else{
        //return an html table with a product having the specified product id
        $sql="SELECT firstname, lastname, username, accounttype FROM users WHERE accounttype = '$accountid'"; //get one product record with the matching id
    }

    //execute the sql statement
    $result= $mydb->query($sql);

    //generate a table by processing each result row
    echo "           <div class='table-responsive table mt-2' id='dataTable-1' role='grid' aria-describedby='dataTable_info'>
    <table class='table my-0' id='dataTable'>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Account Type</th>
            </tr>
        </thead>"; //no repeating part of the table
    while($row=mysqli_fetch_array($result)){
        echo"<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["username"]."</td><td>".$row["accounttype"]."</td></tr>"; //each tr element in the table
    }
    echo "          </tbody>
    </table>"; //non repeating part of the table 

?>

<!-- echo "<table><thead><tr class='header'><th>First Name</th><th>Last Name</th><th>Username</th><th>Account Type</th></tr></thead><tbody>"; //no repeating part of the table
    while($row=mysqli_fetch_array($result)){
        echo"<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["username"]."</td><td>".$row["accounttype"]."</td></tr>"; //each tr element in the table
    }
    echo "          </tbody>
    </table>"; //non repeating part of the table  -->