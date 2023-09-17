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
    $qry="select * from customer where seller_id='$s_id' and order_status!='Not delivered order by order_id  desc'";
    $ans=mysqli_query($connection,$qry);
?>
    <div class="container mt-5">
    <h2>Past Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Order Status</th>
                <th>Total Bill</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($ans)) : ?>
                <?php
                    $id = $row['cust_id'];
                    $qry = "SELECT * FROM customer_login WHERE cust_id='$id'";
                    $ab = mysqli_query($connection, $qry);
                    $ab = mysqli_fetch_array($ab);
                ?>
                <tr>
                    <td><?= $row['order_id'] ?></td>
                    <td><?= $ab['First_name'] ?></td>
                    <td><?= $ab['Last_name'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['cust_address'] ?></td>
                    <td><?= $row['order_status'] ?></td>
                    <td><?= $row['Total_bill'] ?> Rs/-</td>
                    <td>
                        <?php if ($row['order_status'] == 'delivered') : ?>
                            <a href="http://localhost/Dbms_project/notdeliver.php?order_id=<?= $row['order_id'] ?>" class="btn btn-warning">Make it not delivered</a>
                            <a href="http://localhost/Dbms_project/invoice.php?order_id=<?= $row['order_id'] ?>&bill=<?= $row['Total_bill'] ?>" class="btn btn-primary">Print invoice</a>
                        <?php else : ?>
                            <span>-</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>