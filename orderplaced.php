<div id="div">
<h1> Order Placed <h1>
<h2> Thank - You </h2>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> -->
<title>Sabziwala</title>
<link rel="icon" href="images/sabziwala.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->

</head>
<body>

<?php
    session_start();
    $tot=$_SESSION['tot'];
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $mob=$_POST["mobile"];
    $ad=$_POST["add"];
    $qry="select id from cust";
    $cid=mysqli_query($connection,$qry);
    $cid=mysqli_fetch_array($cid);
    $qry="insert into customer (cust_id,order_status,mobile,cust_address,Total_bill,seller_id) values('$cid[id]','Not delivered','$mob','$ad','$tot',".$_SESSION['seller'].")";
    mysqli_query($connection,$qry);
    $s_id=$_SESSION['seller'];
    $link="customerloginsuccessful.php";
    echo "<div class>Redirect to Main page? <a href=$link?id='$s_id'>Click here</a></div>";
    // $qry="delete from cart where cust_id='$cid[id]'";
    // mysqli_query($connection,$qry);
?>
</body>
</html>
</div>