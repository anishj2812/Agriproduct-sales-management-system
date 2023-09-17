<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vegieboy</title>
<link rel="icon" href="images/logo.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
      #home{
        /* margin-left: 20%; */
        /* margin-right: 20%; */
        /* margin-top: 10%; */
        text-align: center;
        background-color: rgba(255,255,255,0.7);
        /* color:black; */
      }
      .carousel-item {
      max-height: 400px; /* Adjust this value as needed */
    }

    /* Maintain image aspect ratio using object-fit */
    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
      
  }
	</style>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCustomer" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Customer
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCustomer">
                        <li><a class="dropdown-item" href="custlogin.php">Login</a></li>
                        <li><a class="dropdown-item" href="custsignup.php">New Customer</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSeller" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Seller
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownSeller">
                        <li><a class="dropdown-item" href="sellerlogin.php">Login</a></li>
                        <li><a class="dropdown-item" href="#">New Seller</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <!-- <h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5> -->
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    Customer contact no. : 431-0123-0123
    <br>
    Toll free no. : 1800-786-786
    <br>
    Or email us at: vegieboy@gmail.com  
  </div>
</div>
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/1.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/2.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/3.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/4.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/5.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/6.jpg" class="d-block" alt="...">
      </div>    
      <div class="carousel-item">
        <img src="images/7.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/8.jpg" class="d-block" alt="...">
      </div>
      <!-- <div class="carousel-item">
        <img src="images/9.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/10.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/11.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/12.jpg" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/13.jpg" class="d-block" alt="...">
      </div> -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container mt-5 text-center">
    <div id="home">
    "Fresh from the farm to your table"
    "Locally grown, always fresh"
    "Nourish your body with our farm-fresh produce"
    "Healthy eating starts here"
    "Savor the taste of locally grown produce"
    "From our farm to your family"
    "Experience the difference of farm-fresh vegetables"
    "Healthy living made easy with our fresh produce"
    "Discover the flavor of locally sourced vegetables"
    "A world of flavors in every bite"
    </div>
</div> 
</body>
</html>
</div>