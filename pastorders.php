<div id='div'>
<h3> Orders </h3>
<div class><a href="sellerloginsuccessful.php">Main - Page</a></div>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> -->
<title>Sabziwala</title>
<link rel="icon" href="images/sabziwala.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->

</head>
<body>
<?php
    session_start();
    $s_id=$_SESSION["s_id"];
    $connection=mysqli_connect("localhost","root");
    mysqli_select_db($connection,"agriproduct");
    $qry="select * from customer where seller_id='$s_id' and order_status!='Not delivered'";
    $ans=mysqli_query($connection,$qry);
    echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Mobile</th>";
        echo "<th>Address</th>";
        echo "<th>Order status</th>";
        echo "<th>Total-bill</th>";
        echo "<th>To not deliver</th>";
        echo "<th>Invoice</th>";
        echo "</tr>";
    while($row=mysqli_fetch_array($ans))
    {
        $id=$row['cust_id'];
        $qry="select * from customer_login where cust_id='$id'";
        $ab=mysqli_query($connection,$qry);
        $ab=mysqli_fetch_array($ab);
        echo "<tr>";
            echo "<td>".$row['order_id']."</td>";
            echo "<td>".$ab['First_name']."</td>";
            echo "<td>".$ab['Last_name']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['cust_address']."</td>";
            echo "<td>".$row['order_status']."</td>";
            echo "<td>".$row['Total_bill']."Rs/-  </td>";
        // echo $row['order_id']." ".$ab['First_name']." ".$ab['Last_name']." Mobile - ".$row['mobile']." Add - ".$row['cust_address']." ".$row['order_status']." Bill - ".$row['Total_bill']."Rs/-  ";
        if($row['order_status']=='delivered')
        {
            $link="http://localhost/Dbms_project/notdeliver.php";
            $od=$row['order_id'];
            echo "<td><a href=$link?order_id='$od'>Make it not delivered</a> </td>";
            $invoice="http://localhost/Dbms_project/invoice.php";
            $od=$row['order_id'];
            $tot=$row['Total_bill'];
            echo "<td><a href=$invoice?order_id='$od'&bill='$tot'>Print invoice</a> </td>";
        }
        else
        {
            echo "<td>-</td>";
            echo "<td>-</td>";
        }
        echo "</tr>";
        // $url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
        // $string= preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $link);
        // echo $string;
        // echo "      ";  
        //header('Location: '.$row['Pdf']);
        // echo (,"Report");
        // https://stackoverflow.com/questions/1960461/convert-plain-text-urls-into-html-hyperlinks-in-php
    }
?>
</body>
</html>
</div>