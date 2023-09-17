<!-- <h1 id='align' id="text"> Login successful</h1> -->
<!-- <div id="right"><a href="index.php">Log - out</a></div> -->
<!-- <img style src="images/Vegieboy.jpg" alt="SW" class="center1"> -->
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
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <br>
    <div id='mydiv' class='textual'>
    <!-- ... your other HTML code ... -->
    
    <h2 class="text-center"> List of Sellers </h2>

    <div class="row">
        <?php
        session_start();
        $connection=mysqli_connect('localhost','root');
        mysqli_select_db($connection,'agriproduct');
        $qry="select * from seller_details";
        $cn=mysqli_query($connection,$qry);
        
        while($row=mysqli_fetch_array($cn))
        {
            $od=$row['id'];
            $link="http://localhost/Dbms_project/customerloginsuccessful.php?id=$od";

            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<div class="card-header">Name: ' . $row["Name"] . '</div>';
            echo '<div class="card-body">';
            echo '<p class="card-text">Mobile: ' . $row["Mobile"] . '</p>';
            echo '<p class="card-text">Shop-Address: ' . $row["Shop"] . '</p>';
            echo '<a href="' . $link . '" class="btn btn-primary">Select</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
