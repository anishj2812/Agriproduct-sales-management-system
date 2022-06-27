<?php
$connection=mysqli_connect('localhost','root');
if($connection)
{
    echo "hi";
}
else
{
    echo "Oh! no";
}
mysqli_select_db($connection, 'agriproduct');
// $qry="select * from currentconference";
// $con=mysqli_query($connection,$qry);
// $con=mysqli_fetch_array($con);
   
// $cn= $con['con_id'];


// $qry1="delete from currentconference where $con['con_id']=con_id";
// mysqli_query($connection,$qry1);
$fn=$_POST['first_name'];
$ln=$_POST['last_name'];
$em=$_POST['email'];
$kl=$_POST['password'];
echo $kl;
$data="insert into customer_login(First_name,Last_name,email,password) values('$fn','$ln','$em','$kl')";
mysqli_query($connection,$data);
//header("location:successfulsignup.php");
header("location:index.php");
?>