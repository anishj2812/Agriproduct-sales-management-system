<?php
    session_start();
    $s_id=$_SESSION["s_id"];
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $name=$_POST["name"];
    $desc=$_POST["desc"];
    // $pr=$_POST["pric"];
    // $qnt=$_POST["qnty"];
    // $em=$_POST["name"];
    $qry="insert into items (item_name,item_desc,price,seller_id) values('$name','$desc',0,'$s_id')";
    
    mysqli_query($connection,$qry);
    // $cn=mysqli_fetch_array($cn);
    // if($cn['Conference_id']==NULL)
    // {
    header("location:sellerloginsuccessful.php");
    //     echo"ina";
    // }
    // echo $cn['Conference_id'];
    // $cn=$cn['Conference_id'];
    // $_SESSION['con']=$cn;
?>