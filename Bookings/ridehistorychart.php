<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="get" action="rideHistoryc.php">
        <label for="">Select your favorite place to see how frequently people visited there:
        <select name="bHistory">

            <?php
                    require_once("db.php");

                    $sql = "SELECT DISTINCT BookingHistory FROM users"; 
            
                    $result = $mydb->query($sql);
            
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row["BookingHistory"] . "'>" . $row["BookingHistory"] . "</option>";
                    }
            ?>
        </select>
        </label>
        <input type="submit" name="submit" value="Show">
        <br>
    </form>
</body>
</html>