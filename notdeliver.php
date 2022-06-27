<h1> hi </h1>
<?php
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");
    echo $_GET['order_id'];
    $del="delivered";
    $oid=$_GET['order_id'];
    $qry="update customer set order_status = 'Not delivered' where order_id=".$_GET['order_id']."";
    mysqli_query($connection,$qry);
    header("location:sellerloginsuccessful.php")
?>  