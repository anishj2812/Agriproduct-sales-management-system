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
<form action="checkpage.php" method="post">
		<h2>Change Password</h2> 
		<!-- <p>Please enter Credentials!</p> -->
		<hr>
        <div class="form-group">
        	<input type="password" class="form-control" name="pass" placeholder="Enter old password" required="required">
        </div>
        <div class="form-group">
        	<input type="password" class="form-control" name="newpass" placeholder="Enter new password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Change Password</button>
        </div>  
    </form>
</body>
</html>