<?php
include 'include/connect.php';
$select="SELECT * FROM transfer";
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
    <link rel="stylesheet" href="css/style.css">
    <title>Sparks Bank</title>
    <link rel="icon" type="image/jpeg"  href="img/logo.jpeg">
</head>

<body style="background: radial-gradient(circle, rgba(255,243,0,1) 25%, rgba(255,70,70,1) 100%);">
<?php
include 'include/header.php';
?>
<div class="container">
<div class="row">
<h2 class="text-center" style="margin-top: 100px; color: #800000;">History</h2>
<br>

<div class="col-md-offset-2 col-md-8">
<table class="table table-bordered" style="background-color: #9b111e; color:#faebd7;">
<thead>
<tr>
<th style="text-align:center;">ID</th>
<th style="text-align:center;">Sender</th>
<th style="text-align:center;">Receiver</th>
<th style="text-align:center;">Amount</th>
</tr>
</thead>
<tbody>
<?php 
while($row=mysqli_fetch_assoc($select_query)){
?>
<tr style="color: #ffae42; text-align:center;">
<td ><?php echo $row['sid'] ?></td>
<td ><?php echo $row['sender']?></td>
<td ><?php echo $row['receiver']?></td>
<td ><?php echo $row['amount']?></td>
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