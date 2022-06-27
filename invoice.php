<h1> Invoice </h1>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sabziwala</title>
<link rel="icon" href="images/sabziwala.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

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
<div class="hint-text">Redirect to Main page? <a href="pastorders.php">Click here</a></div>
  </div>
</div>

</body>
<html>
