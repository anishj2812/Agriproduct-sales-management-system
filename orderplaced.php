<?php
    require 'config.php';
    require 'vendor/autoload.php';
    // require_once('razorpay-php-master/autoload.php');
    use Razorpay\Api\Api;

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
<?php
  session_start();
  $tot=$_SESSION['tot'];
  if(!empty($tot))
  {
      echo $tot;
      $api=new Api(API_KEY,API_SECRET);
      echo "...";
      $res=$api->order->create(
        array(
            'receipt'=>'123',
            'amount'=> 100*$tot,
            'currency'=>'INR',
            'notes'=>array('key1'=>'value3','key2'=>'value2')
        )
    );
    
    echo "***";
    if (!empty($res['id'])) {
        echo "//";
        $_SESSION['trans_id'] = $res['id'];
        ?>
        <form action="<?php echo BASE_URL ?>success.php?id=<?php echo $_GET['id'] ?>"method="POST">
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo API_KEY ?>"
                data-amount="<?php echo $tot ?>"
                data-currency="INR"
                data-order_id="<?php echo $res['id'] ?>"
                data-buttontext="Pay <?php echo $tot ?>"
                data-name="<?php echo COMPANY_NAME ?>"
                data-description="XYZ"
                data-image="<?php echo COMPANY_LOGO_URL ?>"
                data-prefill.name="ANISH"
                data-prefill.email="<?php echo $email ?>"
                data-theme.color="#F37254"
            ></script>
                <input type="hidden"  name="mobile" value=<?php echo $_POST["mobile"]?>>
                <input type="hidden"  name="add" value=<?php echo $_POST["add"]?>>
            <input type="hidden" custom="Hidden Element" name="hidden"/>
        </form>
        <?php
    }
  }    
 // updating item list to the order_list table
    // $qry="delete from cart where cust_id='$cid[id]'";
    // mysqli_query($connection,$qry);
?>
</body>
</html>
</div>