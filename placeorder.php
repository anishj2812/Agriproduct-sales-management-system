<?php
    $_GET['id'] = str_replace("'", '"', $_GET['id']);
    $page="mycart.php";
    $page=$page."?id=".$_GET['id'];
    $page1="myorders.php";
    $page1=$page1."?id=".$_GET['id'];
    $page2="orderplaced.php";
    $page2=$page2."?id=".$_GET['id'];
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
    <h1 class="m-2"> Check Out Details !! <h1>
    <form action="<?php echo $page2; ?>" method="post">
    <!-- <h2>Login</h2> -->
    <!-- <hr> -->
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6"><input type="int" class="form-control m-2" name="mobile" placeholder="Enter mobile number" required="required"></div>   
        </div> 
        <div class="row">
            <div class="col-xs-6"><input type="text" class="form-control m-2" name="add" placeholder="Enter address" required="required"></div>   
        </div>        
            
    </div>
    <div class="form-group">    
        <button type="submit" class="btn btn-success btn-md m-2">Place order</button>
    </div> 
</form>
</body>
</html>