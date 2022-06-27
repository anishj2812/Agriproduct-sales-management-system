<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $id=$_POST["item_id"];
    $cap=$_POST["cap"];
    // $pr=$_POST["pric"];
    // $qnt=$_POST["qnty"];
    // $em=$_POST["name"];
    $qry="select capacity from items where item_id='$id'";
    $cn=mysqli_query($connection,$qry);
    $cn=mysqli_fetch_array($cn);
    $cap=$cap+$cn['capacity'];
    $qry="update items set capacity='$cap' where item_id='$id'";
    mysqli_query($connection,$qry);
    header("location:sellerloginsuccessful.php");
    // if($cn['Conference_id']==NULL)
    // {
    //     header("location:sellerloginsuccessful.php");
    //     echo"ina";
    // }
    // echo $cn['Conference_id'];
    // $cn=$cn['Conference_id'];
    // $_SESSION['con']=$cn;
?>