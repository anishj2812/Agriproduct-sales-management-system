<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> -->
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
<form action="changedetails.php" method="post">
		<!-- <h2>Login</h2> -->
		<h3>Enter changed details</h3>
		<!-- <hr> -->
        <div class>
            <div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="cid" placeholder="Enter customer id" required="required"></div>   
			</div> 
            <div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="mob" placeholder="Enter changed mobile number" required="required"></div>   
			</div> 
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="add" placeholder="Enter changed address" required="required"></div>   
			</div>        
			<!-- <div class="row">
				<div class="col-xs-6"><input type="number" class="form-control" name="pric" placeholder="Enter price/kg" required="required"></div>   
			</div>         -->
            	
        </div>
        <div class>    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>  
    </form>
</body>
</html>
