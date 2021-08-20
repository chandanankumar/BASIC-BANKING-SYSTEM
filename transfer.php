<?php
include 'include/connect.php';
$sid=$_GET['id'];
$select = "SELECT * FROM  users where id=$sid";
$select_query=mysqli_query($con,$select);
$row = mysqli_fetch_assoc($select_query);
if(isset($_POST['submit']))
{
$from = $_GET['id'];
$to = $_POST['to'];
$amount = $_POST['amount'];

$select = "SELECT * from users where id=$from";
$select_query = mysqli_query($con,$select);
$row1 = mysqli_fetch_array($select_query);

$receiver = "SELECT * from users where id=$to";
$query = mysqli_query($con,$receiver);
$row2 = mysqli_fetch_array($query);


if (($amount)<0)
{
echo '<script type="text/javascript">';
echo ' alert("Oops! Negative values cannot be transferred")'; 
echo '</script>';
}

else if($amount > $row1['balance']) 
{
echo '<script type="text/javascript">';
echo ' alert("Bad Luck! Insufficient Balance")';  // 
echo '</script>';
}

else if($amount == 0){
echo "<script type='text/javascript'>";
echo "alert('Oops! Zero value cannot be transferred')";
echo "</script>";
}
else {

$newbalance = $row1['balance'] - $amount;
$new = "UPDATE users set balance=$newbalance where id=$from";
mysqli_query($con,$new);

$newbalance = $row2['balance'] + $amount;
$new2 = "UPDATE users set balance=$newbalance where id=$to";
mysqli_query($con,$new2);
$sender = $row1['name'];
$receivr = $row2['name'];
$insert = "INSERT INTO transfer(`sender`, `receiver`, `amount`) VALUES ('$sender','$receivr','$amount')";
$query=mysqli_query($con,$insert);

if($query){
echo "<script> alert('Transaction Successful');
window.location='history.php';
</script>";

}
$newbalance= 0;
$amount =0;
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <title>Sparks Bank</title>
        <link rel="icon" type="image/jpeg"  href="img/logo.jpeg">
    </head>

    <body style="background: linear-gradient(0deg, rgba(22,45,93,1) 0%, rgba(255,79,73,1) 100%);">
    <?php
    include 'include/header.php';
    ?>

    <div class="container">
    <h2 class="text-center" style="margin-top: 80px; color: #ffddf4">Transaction</h2>
    <br>
    <br>
    <div class="row">
    <form method="POST" name="send">
    <table class="table table-bordered"  style="color: #ffd700; text-align:center; ">
    <thead >
    <th style="text-align:center;">ID</th>
    <th style="text-align:center;">Name</th>
    <th style="text-align:center;">Email</th>
    <th style="text-align:center;">Balance</th>
    </thead>
    <tbody>
    <tr style="color:#ffd700; ">
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['balance'] ?></td>
    </tr>
    </tbody>
    </table>
    <br><br>
    <label style="color: #ffd700 ; ">Transfer To:</label>
    <select name="to" class="form-control" required>
    <option value="" disabled selected>Choose</option>
    <?php
    $sid=$_GET['id'];
    $select = "SELECT * FROM  users where id!=$sid ";
    $select_query=mysqli_query($con,$select);
    while($row = mysqli_fetch_assoc($select_query)) {
    ?>
    <option class="table" value="<?php echo $row['id'];?>" >
    <?php echo $row['name'] ;?>
    </option>
    <?php 
    } 
    ?>
    <div>
    </select>
    <br>
    <br>
    <label style="color: #ffd700; ">Amount:</label>
    <input type="number" class="form-control" name="amount" required>   
    <br><br>
    <div class="text-center" >
    <button class="btn btn-danger" name="submit" type="submit" style="background-color:#ff4f49; color: #ffd700">Transfer</button>
    </form>
    </div>
    </div>
    </body>
</html>