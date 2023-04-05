<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- create an html form with a select element and a submit button -->
    <form method="get" action="showEndDest.php">
        <label for="">Select an end destination to see the number of routes going there:
        <select name="edest">
            <!-- use php code to retrieve end destinations from the database and dynamically generate the option elements -->
            <?php
                    require_once("db.php");

                    $sql = "SELECT DISTINCT endDest FROM routes"; //get a list of end destinations from the database
            
                    $result = $mydb->query($sql);
            
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row["endDest"] . "'>" . $row["endDest"] . "</option>";
                    }
            ?>
        </select>
        </label>
        <input type="submit" name="submit" value="Send">
        <br>
    </form>
</body>
</html>