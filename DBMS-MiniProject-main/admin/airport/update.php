<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update.airport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <?php

    include "../config.php";
    
    // get row values containing relavant id to fill the form when loading
    if (isset($_GET["code"])) {

        $code = $_GET["code"];

        $sql = "SELECT * FROM `airport` WHERE `airport_code`='$code';";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $name = $row["name"];
        $city = $row["city"];
        $state = $row["state"];
        $country = $row["country"];

    }
    
    if (isset($_POST["update"])) {

        $airport_code = $_POST["code"];
        $airport_name = $_POST["name"];
        $city_located = $_POST["city"];
        $state_located = $_POST["state"];
        $country_located = $_POST["country"];

        $sql = "UPDATE `airport` SET `airport_code`='$airport_code', `name`='$airport_name', `city`='$city_located', `state`='$state_located', `country`='$country_located' WHERE `airport_code` = '$code';";

        

        try {
            $result = $conn->query($sql);
            echo "<script type='text/javascript'>alert('updated successfully!');</script>";
        }
        catch (Exception $ex) {
            echo "<script type='text/javascript'>alert('error occured!');</script>";
        }

    }

    
    ?>

    <form action="" method="POST">

        <label for="code"> Airport Code : </label>
        <input type="text" name="code" id="code" class="form-control" value="<?php echo $code ?>" required><br>

        <label for="name"> Airport Name : &nbsp; </label><br>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $name ?>" required><br>

        <label for="city"> City : </label><br>
        <input type="text" name="city" id="city" class="form-control" value="<?php echo $city ?>" required><br>

        <label for="state"> State : </label><br>
        <input type="text" name="state" id="state" class="form-control" value="<?php echo $state ?>"><br>

        <label for="model"> Country : </label><br>
        <input type="text" name="country" id="country" class="form-control" value="<?php echo $country ?>" required><br>

        <input type="submit" name="update" id="update" class="btn btn-success" value="Update"> 
        <a href="view.php" class="btn btn-secondary"> Go Back </a>

    </form>
    
</body>
</html>