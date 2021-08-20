<?php
include 'include/connect.php';
$select="SELECT * FROM users";
$select_query=mysqli_query($con,$select);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Sparks Bank</title>
        <link rel="icon" type="image/jpeg"  href="img/logo.jpeg">
    </head>

    <body  style="background:linear-gradient(0deg, rgba(22,45,93,1) 0%, rgba(246,228,22,1) 100%);">
        <?php
        include 'include/header.php';
        ?>
        <div class="container">
            <div class="row">
                <h2 class="text-center" style="margin-top: 100px; color: #00001f">Transfer Money</h2>
                <br>
                <div class="col-md-offset-2 col-md-8">
                    <table class="table table-bordered" style="background-color : #3ab09e;  ">
                        <thead>
                            
                            <tr style="color:#00ffff;">
                                <th style="text-align:center;" >ID</th>
                                <th style="text-align:center;" >Name</th>
                                <th style="text-align:center;" >Email</th>
                                <th style="text-align:center;" >Balance</th>
                                <th style="text-align:center;" >Operation</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <?php 
                            while($row=mysqli_fetch_assoc($select_query)){
                            ?>
                            <tr style="color : #f8f8ff; text-align:center;" >
                                <td ><?php echo $row['id'] ?></td>
                                <td ><?php echo $row['name']?></td>
                                <td ><?php echo $row['email']?></td>
                                <td ><?php echo $row['balance']?></td>
                                <td><a href="transfer.php?id= <?php echo $row['id'] ; ?>"> <button type="button" class="btn" style="color:#00001f">Tranfer</button></a></td> 
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>