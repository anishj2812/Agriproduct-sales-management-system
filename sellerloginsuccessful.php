<div id='div' class='text'>
<h2 id='align'> Login successful </h2>
<div id="right"><a href="index.php">Log - out</a></div>
<br>
<img style src="images/sabziwala.jpg" alt="SW" class="center1">
<br>
<h3 > List of items </h3>
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
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->

</head>
<body>
<?php
    session_start();
    $s_id=$_SESSION["s_id"];
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");
    $qry="select * from items where seller_id='$s_id'";
    $ans=mysqli_query($connection,$qry);
    echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Mobile</th>";
        echo "<th>Shop-Address</th>";
        echo "<th>Select-seller</th>";
        echo "</tr>";
    while($row=mysqli_fetch_array($ans))
    {
        echo "<tr>";
            echo "<td>".$row['item_id']."</td>";
            echo "<td>".$row['item_name']."</td>";
            echo "<td>".$row['item_desc']."</td>";
            echo "<td>".$row['price']."/kg </td>";
            echo "</tr>";
        // echo $row['item_id']." ".$row['item_name']." ".$row['item_desc']." ".$row['price']."/kg ";    
    }
    echo "</table>";
?>
<br>
<h3> Orders </h3>
<?php
    $s_id=$_SESSION["s_id"];
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");
    $qry="select * from customer where seller_id='$s_id' and order_status='Not delivered'";
    $ans=mysqli_query($connection,$qry);
    echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Mobile</th>";
        echo "<th>Address</th>";
        echo "<th>Total-bill</th>";
        echo "<th>To deliver</th>";
        echo "<th>To cancel</th>";
        echo "</tr>";
    while($row=mysqli_fetch_array($ans))
    {
        $id=$row['cust_id'];
        $qry="select * from customer_login where cust_id='$id'";
        $ab=mysqli_query($connection,$qry);
        $ab=mysqli_fetch_array($ab);
        // echo $row['order_id']." ".$ab['First_name']." ".$ab['Last_name']." Mobile - ".$row['mobile']." Add - ".$row['cust_address']." ".$row['order_status']." Bill - ".$row['Total_bill']."Rs/-  ";
        // $link="http://localhost/Dbms_project/deliver.php";
        // $od=$row['order_id'];
        // echo "<a href=$link?order_id='$od'>Make it delivered</a> <br>";
        // $link="http://localhost/Dbms_project/cancel.php";
        // $od=$row['order_id'];
        // echo "<a href=$link?order_id='$od'>Cancel Order</a> <br>";

        echo "<tr>";
            echo "<td>".$row['order_id']."</td>";
            echo "<td>".$ab['First_name']."</td>";
            echo "<td>".$ab['Last_name']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['cust_address']."</td>";
            echo "<td>".$row['Total_bill']."Rs/-  </td>";
            $link="http://localhost/Dbms_project/deliver.php";
            $od=$row['order_id'];
            // echo "<a href=$link?order_id='$od'>Make it delivered</a> <br>";
            echo "<td><a href=$link?order_id=$od> Make it delivered </a></td>";
            $link="http://localhost/Dbms_project/cancel.php";
            echo "<td><a href=$link?order_id='$od'>Cancel Order</a> </td>";
            echo "</tr>";
        // $invoice="http://localhost/Dbms_project/invoice.php";
        // $od=$row['order_id'];
        // $tot=$row['Total_bill'];
        // echo "<a href=$invoice?order_id='$od'&bill='$tot'>Print invoice</a> <br>";
        // $url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
        // $string= preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $link);
        // echo $string;
        // echo "      ";  
        //header('Location: '.$row['Pdf']);
        // echo (,"Report");
        // https://stackoverflow.com/questions/1960461/convert-plain-text-urls-into-html-hyperlinks-in-php
    }
    echo "</table>";
?>
<br>
<h3> Check past Order </h3>
<form action="pastorders.php" method="post">
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div> 
    </form>
<br>
<h3> Change customer details <h3>
<form action="changecustdetails.php" method="post">
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div> 
    </form>
<br>
<form action="addnewitem.php" method="post">
		<!-- <h2>Login</h2> -->
		<h3>Add New item</h3>
		<!-- <hr> -->
        <div class="form-group">
            <div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="name" placeholder="Enter item name" required="required"></div>   
			</div> 
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="desc" placeholder="Enter item description" required="required"></div>   
			</div>        
			<!-- <div class="row">
				<div class="col-xs-6"><input type="number" class="form-control" name="pric" placeholder="Enter price/kg" required="required"></div>   
			</div>         -->
            	
        </div>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>  
    </form>
<br>
<form action="removeitem.php" method="post">
		<!-- <h2>Login</h2> -->
		<h3>Remove item</h3>
		<!-- <hr> -->
        <div class="form-group">
            <div class="row">
				<div class="col-xs-6"><input type="int" class="form-control" name="item_id" placeholder="Enter id" required="required"></div>   
			</div> 
			<!-- <div class="row">
				<div class="col-xs-6"><input type="float" class="form-control" name="cap" placeholder="Enter quantity in kg" required="required"></div>   
			</div>         -->
            	
        </div>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div> 
    </form>
<br>
<form action="updateprice.php" method="post">
		<!-- <h2>Login</h2> -->
		<h3>Update price</h3>
		<!-- <hr> -->
        <div class="form-group">
            <div class="row">
				<div class="col-xs-6"><input type="int" class="form-control" name="item_id" placeholder="Enter id" required="required"></div>   
			</div> 
			<div class="row">
				<div class="col-xs-6"><input type="float" class="form-control" name="price" placeholder="Enter new price per kg" required="required"></div>   
			</div>        
            	
        </div>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div> 
    </form>
<br>
<form action="changepw.php" method="post">
		<!-- <h2>Login</h2> -->
		<h3>Change Password</h3>
		<!-- <hr> -->
        <!-- <div class="form-group">
            <div class="row">
				<div class="col-xs-6"><input type="int" class="form-control" name="item_id" placeholder="Enter id" required="required"></div>   
			</div> 
			<div class="row">
				<div class="col-xs-6"><input type="float" class="form-control" name="cap" placeholder="Enter quantity in kg" required="required"></div>   
			</div>        
            	
        </div> -->
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div> 
    </form>
</body>
</html>
</div>
