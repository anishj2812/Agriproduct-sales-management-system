<?php
    session_start();
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $em=$_POST["email"];
    $pw=$_POST['password'];
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
    $data="select * from customer_login";
    $ans=mysqli_query($connection,$data);
    while($row=mysqli_fetch_array($ans))
    {
        if($em==$row['email'] && $pw==$row['password'])
        {
            $cid=$row['cust_id'];
            $chk='1';
            //echo $cid;
            $qry="truncate table cust";
            mysqli_query($connection,$qry);
            $qry="insert into cust values($cid,$chk)";
            mysqli_query($connection,$qry);
            header('location:selectSeller.php');   
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sabziwala</title>
<link rel="icon" href="images/logo.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!-- <link rel="stylesheet" type="text/css" href="css/signup.css"> -->
<style type="text/css">
	body {
			background-color:#2781BA;
			background-image:url('images/bg1.gif');
			
		}
		
	table {
				border: 0px red solid;
			
				padding-top:0px;
				margin-top:0px;
				cellspacing:0px; 
				cellpadding:0px;
	}
	td {
		border:0px green dotted;
	}
	
	table.login_tab {
		background:rgba(255,255,255,0.9);
		cellspacing:0px; 
		cellpadding:0px;
	}
	
	table.main_tab {
		background:rgba(0,0,0,0);
		width:70%;
	}
	
	td.login {
			background-color:#C0C0C0;
			padding-left:5px;
			padding-right:5px;
	}
	td.login_table {
			background:rgba(248,248,255,1);
			padding-top:50px;
			padding-left:40px;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
	}
	td.login_nam {
		height:30px;
		font-size:13pt;
		color:white;
		background-color:#3b5998;
		padding-left:5px;
	}
	td.new {
		height:30px;
		font-weight:none;
		font-size:11pt;
	}
	
	a.normal{color:black;}
	a.normal:hover{color:black;font-size: 12px;}
	a.normal:visited{color:black;}
	
	a {
		color:#000000;
	}
	a:hover {
	
		font-size:20pt;
	}
	td.marquee{
		padding-top:1px;
		padding-bottom:1px;
		padding-left:130px;
		background:rgba(0,0,0,1);
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
	}
	td.footer {
		background-color:#2952A3;
		background-image:url('images/tdback1.gif');
		border-top: 1px grey solid;
		color:#999933;
		text-align:center;
		font-size:8pt;
		padding-bottom:5px;
		padding-top:5px;
	}
	


</style>
</head>
<html>
<h1> invalid details </h1>