<?php
    session_start();
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $id=$_POST["item_id"];
    // $qry="select price from items where item_id='$id'";
    // $pr=mysqli_query($connection,$qry);
    // $pr=mysqli_fetch_array($pr);
    // // $cap=$cap+$cn['capacity'];
    // $tot=$pr["price"]*$cap;
    // // $tot=(string)$tot;
    // $rate=$pr["price"];
    $check="select * from cart where item_id='$id' and seller_id=".$_SESSION['seller']."";
    $ch=mysqli_query($connection,$check);
    $ch=mysqli_fetch_array($ch);
    $qry="select id from cust";
    $cid=mysqli_query($connection,$qry);
    $cid=mysqli_fetch_array($cid);
    $cid=$cid["id"];
    if($ch!=NULL)
    {
        $qy="delete from cart where item_id='$id'";
        mysqli_query($connection,$qy);
        echo "hi";
    }
    $s_id=$_SESSION['seller'];
    $link="customerloginsuccessful.php";
    header("location:$link?id=$s_id");

    //header("location:sellerloginsuccessful.php");
    // if($cn['Conference_id']==NULL)
    // {
    //     header("location:sellerloginsuccessful.php");
    //     echo"ina";
    // }
    // echo $cn['Conference_id'];
    // $cn=$cn['Conference_id'];
    // $_SESSION['con']=$cn;
?>