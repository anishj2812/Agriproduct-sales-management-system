<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> -->
<title>Vegieboy</title>
<link rel="icon" href="images/logo.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">   
    <title>Vegieboy</title>
    <style>
      div.background {
        background: url(agri.jfif) repeat;
        border: 2px solid black;
      }

      div.transbox {
        margin: 30px;
        background-color: #ffffff;
        border: 1px solid black;
        opacity: 0.6;
      }

      div.transbox p {
        margin: 5%;
        font-weight: bold;
        color: #000000;
      }
      </style>
</head>
<body>
<div id='mydiv' class='textual'>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Vegieboy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sellerloginsuccessful.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="update.php">Update details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pendingorders.php">Pending Orders!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pastorders.php">Past Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="background">
  <div class="transbox">
    <p><?php
    // echo $_GET['order_id'];
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");    
    $tid=$_GET['order_id'];
    echo "Transaction id - ".$tid."<br>";
    // echo "Total Bill - ".$_GET['bill']."/- Rs<br>";
    $qry="select * from customer where order_id=".$tid."";
    $ans=mysqli_query($connection,$qry);
    $ans=mysqli_fetch_array($ans);

    $qry="select * from customer_login where cust_id=".$ans['cust_id'];
    $ab=mysqli_query($connection,$qry);
    $ab=mysqli_fetch_array($ab);
    echo $ab['First_name']." ".$ab['Last_name']."<br>Mobile - ".$ans['mobile']." Address - ".$ans['cust_address']." <br>Order - ".$ans['order_status']."<br>Bill Paid- ".$ans['Total_bill']."Rs/-  ";
?>
<button onClick="window.print()">Print</button></p>
<!-- <div class="hint-text">Redirect to Main page? <a href="pastorders.php">Click here</a></div> -->
  </div>
</div>

</body>
<html>
