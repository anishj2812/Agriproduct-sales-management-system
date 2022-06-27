<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sabziwala</title>
<link rel="icon" href="images/sabziwala.jpg">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!-- <link rel="stylesheet" type="text/css" href="css/signup.css"> -->
</head>
<html>
<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    // $em=$_POST["pass"];
    $pw=$_POST["pass"];
    $npw=$_POST["newpass"];
    // $data1='anishj469@gmail.com';
    // $data2='am';
    // if($em==$data1 && $pw==$data2)
    // {
    //     header('location:loginsuccessful.php');
    // }
    // else
    // {
    //     echo "error incorrect email or password";
    // }
    $qry="select * from seller where password='$pw'";
    $ans=mysqli_query($connection,$qry);
    $row=mysqli_fetch_array($ans);
    if($row!=NULL)
    {
        $qry="update seller set password='$npw' where password='$pw'";
        mysqli_query($connection,$qry);
        header('location:sellerlogin.php');
    }
?>
<h1> invalid details </h1>