<?php
    session_start();    
    $seller_id=$_SESSION['seller'];
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $id=$_POST["item_id"];
    $cap=$_POST["cap"];
    /* checking if item is in seller's list */
    echo $seller_id;
    $qry="select * from items where seller_id='$seller_id' and item_id='$id'";
    $sellerCheck=mysqli_query($connection,$qry);
    $sellerCheck=mysqli_fetch_array($sellerCheck);
    $sellerCheck=$sellerCheck['price'];
    if($sellerCheck!=NULL)
    {
        $qry="select price from items where item_id='$id'";
        $pr=mysqli_query($connection,$qry);
        $pr=mysqli_fetch_array($pr);
        // $cap=$cap+$cn['capacity'];
        $tot=$pr["price"]*$cap;
        // $tot=(string)$tot;
        $rate=$pr["price"];
        $qry="select id from cust";
        $cid=mysqli_query($connection,$qry);
        $cid=mysqli_fetch_array($cid);
        $cid=$cid["id"];
        $check="select * from cart where cust_id='$cid' and item_id='$id'";
        $ch=mysqli_query($connection,$check);
        $ch=mysqli_fetch_array($ch);
        if($ch!=NULL)
        {
            $qy="update cart set quantity='$cap',total_cost='$tot',seller_id=".$_SESSION['seller']." where item_id='$id'";
            echo "hi";
        }
        else
        {
            $qy="insert into cart values('$cid','$id','$cap','$rate','$tot',".$_SESSION['seller'].")"; 
            echo "hello";
        }
        mysqli_query($connection,$qy);
    }
    $s_id=$_SESSION['seller'];
    $link="customerloginsuccessful.php";
    header("location:$link?id=$s_id");
    // echo "<div class>Redirect to Main page? <a href='>Click here</a></div>";
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