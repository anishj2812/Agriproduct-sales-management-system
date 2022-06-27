<div id='div' class='text'>
<h1 id='align' id="text"> Login successful</h1>
<div id="right"><a href="index.php">Log - out</a></div>
<br>
<img style src="images/sabziwala.jpg" alt="SW" class="center1">
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
    <br>
<h2> List of Sellers </h2>
    <?php
        session_start();
        $connection=mysqli_connect('localhost','root');
        mysqli_select_db($connection,'agriproduct');
        $qry="select * from seller_details";
        $cn=mysqli_query($connection,$qry);
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Mobile</th>";
        echo "<th>Shop-Address</th>";
        echo "<th>Select-seller</th>";
        echo "</tr>";
        while($row=mysqli_fetch_array($cn))
        {
            echo "<tr>";
            echo "<td>".$row["Name"]."</td>";
            echo "<td>".$row["Mobile"]."</td>";
            echo "<td>".$row["Shop"]."</td>";
            // " ".." ".." <br>";
            $link="http://localhost/Dbms_project/customerloginsuccessful.php";
            $od=$row['id'];
            // echo "<br>";
            echo "<td><a href=$link?id=$od> Select </a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html> 
</div>  