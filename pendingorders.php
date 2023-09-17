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
    session_start();
    $s_id=$_SESSION["s_id"];
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");
    $qry="select * from customer where seller_id='$s_id' and order_status='Not delivered'";
    $ans=mysqli_query($connection,$qry);
?>
  <div class="container mt-5">
    <h2>Pending Orders</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Total-bill</th>
                <th>Order list</th>
                <th>To deliver</th>
                <th>To cancel</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($ans)): ?>
                <?php
                $id = $row['cust_id'];
                $qry = "select * from customer_login where cust_id='$id'";
                $ab = mysqli_query($connection, $qry);
                $ab = mysqli_fetch_array($ab);
                $od = $row['order_id'];
                ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $ab['First_name']; ?></td>
                    <td><?php echo $ab['Last_name']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['cust_address']; ?></td>
                    <td><?php echo $row['Total_bill']; ?> Rs/-</td>
                    <td><a href="orderlist.php?order_id=<?php echo $od; ?>" class="btn btn-warning">Order List</a></td>
                    <td><a href="deliver.php?order_id=<?php echo $od; ?>" class="btn btn-danger">Make it delivered</a></td>
                    <td><a href="cancel.php?order_id=<?php echo $od; ?>" class="btn btn-dark">Cancel Order</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
</div>