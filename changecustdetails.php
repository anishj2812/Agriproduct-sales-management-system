<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="images/sabziwala.jpg">
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> -->
<title>Sabziwala</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->

</head>
<body>
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
