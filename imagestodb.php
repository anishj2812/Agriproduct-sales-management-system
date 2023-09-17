<?php
$directory = "images/items"; // Replace with the path to your images directory
$connection = mysqli_connect("localhost","root");
mysqli_select_db($connection, "agriproduct");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO item_images (name,path) VALUES ";

$images = scandir($directory);
foreach ($images as $image) {
    if (is_file($directory . '/' . $image)) {
        $name=pathinfo($image, PATHINFO_FILENAME);
        $filePath = $directory . '/' . $image;
        $sql .= "('$name','$filePath'), ";
    }
}

$sql = rtrim($sql, ", "); // Remove the trailing comma and space
if (mysqli_query($connection, $sql)) {
    echo "Records inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
