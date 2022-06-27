<?php
$connection=mysqli_connect('localhost','root');
mysqli_select_db($connection, 'agriproduct');
// $qry="select * from currentconference";
// $con=mysqli_query($connection,$qry);
// $con=mysqli_fetch_array($con);
   
// $cn= $con['con_id'];


// $qry1="delete from currentconference where $con['con_id']=con_id";
// mysqli_query($connection,$qry1);
$cid=$_POST['cid'];
$mob=$_POST['mob'];
$add=$_POST['add'];
$data="update customer set mobile='$mob',cust_address='$add' where cust_id='$cid'";
mysqli_query($connection,$data);
//header("location:successfulsignup.php");
header("location:sellerloginsuccessful.php");
?>