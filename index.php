<?php
require 'connection.php';
if(isset($_POST["delete"]) && isset($_POST["deleteId"])){
  foreach($_POST["deleteId"] as $deleteId){
    $delete = "DELETE FROM list_table WHERE id = $deleteId";
    mysqli_query($conn, $delete);
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="style.less" />
    <script src="https://cdn.jsdelivr.net/npm/less" ></script>
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
    <body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "list_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$mysqli = new mysqli($servername,$username,$password,$dbname) or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM list_table") or die($mysqli->error);


?>

    <form class="nav_form" action="" method="post">
      <div class="d-flex sp">
        <h2>Product List</h2>
        <div class="">
          <a class="cancel" href="Product.phtml">ADD</a>
          <button type="submit" name="delete" >MASS DELETE</button>
        </div>
      </div>
        <div id="list" class="d-flex list">
          <div class="container">
            <div class="row">
              <?php
              $rows = mysqli_query($conn,"SELECT * FROM list_table");
              $i = 1;
                while($row = $result->fetch_assoc()):?>
        
                  <div class="Product-card col-2">
                  <input type="checkbox" name="deleteId[]" class="delete-checkbox" id="checkbox" value="<?php echo $row['id']; ?>">
                  <ul class="main-list">
                  <li><?php echo $row['sku']; ?></li>
                  <li><?php echo $row['fname']; ?></li>
                  <li><?php echo $row['price']; ?>$</li>
                  <li>
                    <?php
                    if($row['size'] != 0)
                    {
                    ?>size:<?php
                      echo $row['size'];?>MB <?php
                    }
                    else if($row['weight'] != 0)
                    {
                    ?>Weight:<?php
                      echo $row['weight']; ?>KG <?php
                    }
                    else{
                    ?> Dimension:<?php 
                    echo $row['vfirst'];?>x<?php
                    echo $row['vsecond'];?>x<?php
                    echo $row['vthird'];
                  }

                ?>
                </li>

            </ul>
          </div>
        
      <?php endwhile; ?>
    </form>

    </div>
  </div>
</div> 
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
</body>
</html>