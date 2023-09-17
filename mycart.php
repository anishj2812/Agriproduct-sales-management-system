<?php
    $_GET['id'] = str_replace("'", '"', $_GET['id']);
    $page="mycart.php";
    $page=$page."?id=".$_GET['id'];
    $page1="myorders.php";
    $page1=$page1."?id=".$_GET['id'];
?>
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
                    <a class="nav-link" href="selectSeller.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $page; ?>">Mycart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $page1; ?>">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
    session_start();
    $_GET['id'] = str_replace("'", '"', $_GET['id']);
    $_SESSION['seller']=$_GET['id'];
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
<h1>Check out</h1>
<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'agriproduct');
    $qry="select id from cust";
    $cid=mysqli_query($connection,$qry);
    $cid=mysqli_fetch_array($cid);
    $cid=$cid["id"];
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
    echo "<a href=placeorder.php?id=1><h1>Place Order<h1></a> <br>";
    echo "";  
    //$play="op.php";
    //header("location:$play?totalprice=$tot");   
    // $qry="update items set capacity='$cap' where item_id='$id'";
    // mysqli_query($connection,$qry);
?>
</body>
</html> 


