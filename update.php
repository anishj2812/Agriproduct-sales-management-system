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
<div class="row mt-3">
            <div class="col-md-12">
                <h3>Update Customer Details</h3>
                <form action="changecustdetails.php" method="post">
                    <button type="submit" class="btn btn-primary">Change Details</button>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Update Password</h3>
                <form action="changepw.php" method="post">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>