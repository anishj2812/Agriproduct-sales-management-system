<?php
    session_start();
    $s_id=$_SESSION["seller"];
    // echo $s_id;
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $qry="select id from cust";
    $cid=mysqli_query($connection,$qry);
    $cid=mysqli_fetch_array($cid);
    $cid=$cid["id"];
    $qri="delete from cart where cust_id='$cid' and seller_id='$s_id'";
    mysqli_query($connection,$qri);
    $link="customerloginsuccessful.php";
    header("location:$link?id=$s_id");  
?>