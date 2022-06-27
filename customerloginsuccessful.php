<div class='text'>
<div>
<div class>Redirect to Main page? <a href="selectSeller.php">Click here</a></div>
<div id="right"><a href="index.php">Log - out</a></div>
<br>
<img style src="images/sabziwala.jpg" alt="SW" class="center1">
<br>
<h1> List of items </h1>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> -->
<title>Sabziwala</title>
<link rel="icon" href="images/sabziwala.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="signup-form">
<?php
    session_start();
    $_GET['id'] = str_replace("'", '"', $_GET['id']);
    // echo $_GET['id'];
    $_SESSION['seller']=$_GET['id'];
    // echo gettype($_SESSION['seller']);
    // echo $_SESSION['seller'];
    // $_SESSION['seller']=$_GET['id'];
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $qry="select * from items where seller_id=".$_SESSION['seller']."";
    $cn=mysqli_query($connection,$qry);
    echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Item</th>";
        echo "<th>Description</th>";
        echo "<th>Rate</th>";
        echo "</tr>";
    while($row=mysqli_fetch_array($cn))
    {
        echo "<tr>";
            echo "<td>".$row["item_id"]."</td>";
            echo "<td>".$row["item_name"]."</td>";
            echo "<td>".$row["item_desc"]."</td>";
            echo "<td>".$row["price"]."/kg.</td>";
            // " ".." ".." <br>";
        //     $link="http://localhost/Dbms_project/customerloginsuccessful.php";
        //     $od=$row['id'];
        //     // echo "<br>";
        //     echo "<td><a href=$link?id=$od> Select </a></td>";
        //     echo "</tr>";
        // echo $row["item_id"]." ".$row["item_name"]." ".$row["item_desc"]." ".$row["price"]."/kg <br>";
    }
    echo "</table>";
    // $qry="update items set capacity='$cap' where item_id='$id'";
    // mysqli_query($connection,$qry);
    //header("location:sellerloginsuccessful.php");
?>
</div>
<br>
<div>	
    <h1> Order cart</h1>
</div>
<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');

    $qry="select id from cust";
    $cid=mysqli_query($connection,$qry);
    $cid=mysqli_fetch_array($cid);
    $cid=$cid["id"];
    $qry="select * from cart where cust_id='$cid' and seller_id=".$_SESSION['seller']."";
    $cn=mysqli_query($connection,$qry);

    echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Item</th>";
        echo "<th>Rate</th>";
        echo "<th>Quantity</th>";
        echo "<th>Total Cost</th>";
        echo "</tr>";
    while($row=mysqli_fetch_array($cn))
    {
        
        $n=$row["item_id"];
        $qr="select item_name from items where item_id='$n'";
        $name=mysqli_query($connection,$qr);
        $name=mysqli_fetch_array($name);  
        echo "<tr>";
            echo "<td>".$row["item_id"]."</td>";
            echo "<td>".$name["item_name"]."</td>";
            echo "<td>".$row["rate"]."Rs/kg</td>";
            echo "<td>".$row["quantity"]."kgs</td>";  
            echo "<td>".$row["total_cost"]."Rs </td>";  
        // echo $row["item_id"]." ".$name["item_name"]." ".$row["rate"]."/kg ".$row["quantity"]."kgs ".$row["total_cost"]."Rs <br>";
    }
    echo "</table>";
    // $qry="update items set capacity='$cap' where item_id='$id'";
    // mysqli_query($connection,$qry);
?>
<br>
<div class>	
    <form action="addcustitem.php" method="post">
            <!-- <h2>Login</h2> -->
            <h1>Add item to cart</h1>
            <!-- <hr> -->
            <div class>
                <div class="row">
                    <div class="col-xs-6"><input type="int" class="form-control" name="item_id" placeholder="Enter id" required="required"></div>   
                </div> 
                <div class="row">
                    <div class="col-xs-6"><input type="float" class="form-control" name="cap" placeholder="Enter quantity in kg" required="required"></div>   
                </div>        
                    
            </div>
            <div class>    
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div> 
        </form>
</div>
<br>
<div>	
    <form action="removecustitem.php" method="post">
            <!-- <h2>Login</h2> -->
            <h1>Remove item from cart</h1>
            <!-- <hr> -->
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6"><input type="int" class="form-control" name="item_id" placeholder="Enter id" required="required"></div>   
                </div>        
                    
            </div>
            <div class="form-group">    
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div> 
        </form>
</div>
<br>
<div>	
    <form action="clearcart.php" method="post">
            <!-- <h2>Login</h2> -->
            <h1>Clear cart</h1>
            <div class="form-group">    
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div> 
        </form>
</div>
</body>
</html> 
<br>
<h1>Check out</h1>
<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');

    $qry="select id from cust";
    $cid=mysqli_query($connection,$qry);
    $cid=mysqli_fetch_array($cid);
    $cid=$cid["id"];
    $chk="select * from customer where cust_id='$cid' and order_status!='delivered' and order_status!='cancelled' and seller_id=".$_SESSION['seller']."";
    $ans=mysqli_query($connection,$chk);
    $ans=mysqli_fetch_array($ans);
    if($ans!=NULL)
    {
        echo "Order already placed wait for delivery<br>";
        $qry="select Total_bill from customer where cust_id='$cid' and order_status!='delivered' and seller_id=".$_SESSION['seller']."";
        $tot=mysqli_query($connection,$qry);
        $tot=mysqli_fetch_array($tot);
        echo "<h2>Bill due ".$tot['Total_bill']."/- to be paid on delivery <br></h2>";
        echo "<h2>!!! Cannot Place Order !!!</h2><br>";
    }
    else
    {
        echo "Total Bill to pay!! <br>";
        $qry="select * from cart where cust_id='$cid' and seller_id=".$_SESSION['seller']."";
        $cn=mysqli_query($connection,$qry);
        $tot=0;
        while($row=mysqli_fetch_array($cn))
        {
            $tot=$tot+$row["total_cost"];
        }
        $_SESSION['tot']=$tot;
        echo $tot." Rs/-<br><br>"; 
        echo "<a href=placeorder.php><h1>Place Order<h1></a> <br>";
        echo "";
    }  
    //$play="op.php";
    //header("location:$play?totalprice=$tot");   
    // $qry="update items set capacity='$cap' where item_id='$id'";
    // mysqli_query($connection,$qry);
?>
</div>
</div>


