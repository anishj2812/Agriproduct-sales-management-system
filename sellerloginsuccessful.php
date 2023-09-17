<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">   
    <title>Vegieboy</title>
</head>
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
<div id='mydiv' class='textual'>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Items for Sale</h2>
                <?php
                    session_start();
                    $s_id = $_SESSION["s_id"];
                    $connection = mysqli_connect("localhost", "root");
                    mysqli_select_db($connection, "agriproduct");
                    $qry = "select * from items where seller_id='$s_id'";
                    $ans = mysqli_query($connection, $qry);
                    echo "<table class='table'>";
                    echo "<tr>";
                    // echo "<th>S.No.</th>";
                    echo "<th>Name</th>";
                    echo "<th>Desc</th>";
                    echo "<th>Rate</th>";
                    echo "<th>Remove item</th>";
                    echo "<th>Update price</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($ans)) {
                        echo "<tr>";
                        // echo "<td>" . $row['item_id'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['item_desc'] . "</td>";
                        echo "<td>" . $row['price'] . "/kg </td>";
                        ?>
                        <td>
                        <form action="removeitem.php" method="post">
                                <div >
                                    <input type="hidden" id="item_id" name="item_id" value="<?php echo $row['item_id']?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Remove</button>
                            </form>
                        </td>
                        <td>
                        <form action="updateprice.php" method="post">
                                <div>
                                    <input type="hidden" id="item_id" name="item_id" value="<?php echo $row['item_id']?>">
                                </div>
                                <div class="row">
                                    <!-- <label for="price" class="form-label">New Price per kg</label> -->
                                    <input type="number" id="price" name="price" placeholder="Enter new price in Rs" required>
                                </div>
                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary">Update price</button>
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
        <p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-bs-target
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <div class="container mt-5">
        <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title mb-4">Add Item</h3>
                            <form action="addnewitem.php" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Item Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter item name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter description">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
        
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</div>