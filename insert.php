<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "list_db";
$sku = $_POST['SKU'];
$fname = $_POST['name'];
$price = $_POST['price'];
$vfirst = $_POST['height'];
$vsecond = $_POST['width'];
$vthird = $_POST['length'];
$size = $_POST['size'];
$weight = $_POST['weight'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO list_table (sku, fname, price,vfirst,vsecond,vthird,size,weight) VALUES ('$sku', '$fname', '$price', '$vfirst','$vsecond','$vthird','$size','$weight')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$referer = $_SERVER['HTTP_REFERER'];
header("Location: product.phtml");

$conn->close();
?>

