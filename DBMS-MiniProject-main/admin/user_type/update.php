<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update.user_type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <?php

    include "../config.php";
    
    // get row values containing relavant id to fill the form when loading
    if (isset($_GET["type"])) {

        $user_type = $_GET["type"];

        $sql = "SELECT `discount` FROM `user_type` WHERE `user_type`='$user_type';";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $discount = $row["discount"];

    }
    
    if (isset($_POST["update"])) {

        $type = $_POST["user_type"];
        $discount_percent = $_POST["discount"];

        $sql = "UPDATE `user_type` SET `user_type`='$type', `discount`='$discount_percent' WHERE `user_type` = '$user_type';";

        

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

        <label for="user_type"> User Type : </label>
        <input type="text" name="user_type" id="user_type" class="form-control" value="<?php echo $user_type; ?>" required><br>

        <label for="model"> Discount : &nbsp; </label><br>
        <input type="text" name="discount" id="discount" class="form-control" value="<?php echo $discount; ?>" required><br><br>

        <input type="submit" name="update" id="update" class="btn btn-success" value="Update"> 
        <a href="view.php" class="btn btn-secondary"> Go Back </a>

    </form>
    
</body>
</html>