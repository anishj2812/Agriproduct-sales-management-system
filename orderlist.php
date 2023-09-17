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
<?php
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");
    $oid=$_GET['order_id'];
    $qry="select items.item_name,order_list.quantity,order_list.rate ,order_list.cost from order_list inner join items on items.item_id=order_list.item_id where order_list.order_id=".$_GET['order_id']."";
    $ans=mysqli_query($connection,$qry);
?>  
 <div class="container mt-5">
    <h2>Order List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($ans))
            {
                echo "<tr>";
                    echo "<td>".$row['item_name']."</td>";
                    echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['rate']."Rs</td>";
                    echo "<td>".$row['cost']."Rs</td>";  
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
</div>