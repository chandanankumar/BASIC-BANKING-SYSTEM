<?php
include 'include/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sparks Bank</title>
        <link rel="icon" type="image/jpeg"  href="img/logo.jpeg">
        <link rel="stylesheet" href="css/style.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
        include 'include/header.php';
    ?>
    <div class="bg">
        
    </div>
    <div class="users">
        <p>Get access to your account on one click<p>
        <a href="user.php"><button class="btn" style="background-color:white;"><span class="glyphicon glyphicon-user"></span> Register yourself</button></a>
    </div> 

    
    <?php
        include 'include/footer.php';
    ?>
    </body>
</html>
