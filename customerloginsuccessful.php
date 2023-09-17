<?php
    $_GET['id'] = str_replace("'", '"', $_GET['id']);
    $page = "mycart.php";
    $page = $page . "?id=" . $_GET['id'];
    $page1 = "myorders.php";
    $page1 = $page1 . "?id=" . $_GET['id'];
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">   
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
                    <!-- <a class="nav-link" href="<?php echo $page; ?>">Mycart</a> -->
                <li class="nav-item"><a class="nav-link"  data-bs-toggle="offcanvas" data-bs-target="#offcanvas"><i class="fas fa-shopping-cart m-2 "></i></a></li>
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
    <div class="signup-form">
        <!-- <h2 class="text-center"> List of Sellers </h2> -->
        <div class="row m-2">
            <?php
            session_start();
            $_GET['id'] = str_replace("'", '"', $_GET['id']);
            $_SESSION['seller'] = $_GET['id'];
            $connection = mysqli_connect('localhost', 'root');
            mysqli_select_db($connection, 'agriproduct');
            $qry = "select * from items where seller_id=" . $_SESSION['seller'] . "";
            $cn = mysqli_query($connection, $qry);

            while ($row = mysqli_fetch_array($cn)) {
                $itemName = mysqli_real_escape_string($connection, $row["item_name"]); // Escape and quote the string
                $query = "SELECT path FROM item_images WHERE name='$itemName'";
                $img = mysqli_query($connection, $query);
                $img=mysqli_fetch_array($img);
                echo '<div class="col-md-2">';
                echo '<div class="card">';
                if($img!=NULL)
                {
                ?>
                    <div class="card mb-1">
                        <img src=<?php echo $img['path'];?> class="card-img-top" alt="Image 1" style="width: 100%; height: 150px;">
                    </div>
                <?php
                }
                echo '<div class="card-header">' . $row["item_name"] . '</div>';
                echo '<div class="card-body">';
                echo '<p class="card-text">fresh</p>';
                echo '<p class="card-text">Rate: ' . $row["price"] . '/kg.</p>';
                echo '<form action="addcustitem.php" method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["item_id"] . '">';
                // echo '<div class="form-group">';
                // echo '<input type="number" class="form-control" name="cap" placeholder="Enter quantity in kgs" required>';
                // echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="item_quantity" class="form-label">Quantity</label>';
                echo '<div class="input-group">';
                // echo '<button type="button" class="btn btn-secondary" id="decrease">-</button>';
                echo '<input type="number" class="form-control" id="item_quantity" name="cap" required min="1" value="1">';
                // echo '<button type="button" class="btn btn-secondary" id="increase">+</button>';
                echo '</div>';
                echo '</div>';
                
        //     <div class="input-group">
        //         <button type="button" class="btn btn-secondary" id="decrease">-</button>
        //         <input type="number" class="form-control" id="item_quantity" name="item_quantity" required min="1" value="1">
        //         <button type="button" class="btn btn-secondary" id="increase">+</button>
        //     </div>
        // </div>
                echo '<button type="submit" class="btn btn-primary">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div id="offcanvas" class="offcanvas offcanvas-end">
    <div class="offcanvas-body">
        <!-- <div class="text"> -->
            <?php
            $_GET['id'] = str_replace("'", '"', $_GET['id']);
            $_SESSION['seller'] = $_GET['id'];
            $connection = mysqli_connect('localhost', 'root');
            mysqli_select_db($connection, 'agriproduct');

            $qry = "select id from cust";
            $cid = mysqli_query($connection, $qry);
            $cid = mysqli_fetch_array($cid);
            $cid = $cid["id"];
            $qry = "select * from cart where cust_id='$cid' and seller_id=" . $_SESSION['seller'] . "";
            $cn = mysqli_query($connection, $qry);

            echo '<table class="m-auto p-auto" style="font-size:17px;">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Item</th>';
            echo '<th>Rate</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = mysqli_fetch_array($cn)) {
                $n = $row["item_id"];
                $qr = "select item_name from items where item_id='$n'";
                $name = mysqli_query($connection, $qr);
                $name = mysqli_fetch_array($name);

                echo '<tr>';
                echo '<td>' . $name["item_name"] . '</td>';
                echo '<td>' . $row["rate"] . ' Rs/kg</td>';
                echo '<td>' . $row["quantity"] . ' kgs</td>';
                echo '<td>' . $row["total_cost"] . ' Rs</td>';
                echo '<td>';
                echo '<form action="removecustitem.php" method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["item_id"] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm mt-2">Remove</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            ?>
        <!-- </div> -->

<div class="my-5">	
    <form action="clearcart.php" method="post">
            <!-- <h2>Login</h2> -->
            <i class="bi bi-cart"></i>
            <!-- <h2>Clear cart</h1> -->
            <!-- <div class="form-group">    
                <button type="submit" class="btn btn-primary btn-lg">Clear cart</button>
            </div>  -->
                <button type="submit" class="btn btn-dark btn-sm m-2 p-2">
                <i class="fas fa-trash-alt me-1"></i> Clear Cart
            </button>
        </form>
</div>
<h2 class="my-5">Check out</h2>
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
    echo "<a href=placeorder.php?id=".$_GET['id']." class='btn btn-success' my-5>Buy Now</a>";
    //$play="op.php";
    //header("location:$play?totalprice=$tot");   
    // $qry="update items set capacity='$cap' where item_id='$id'";
    // mysqli_query($connection,$qry);
?>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
</body>
</html> 


