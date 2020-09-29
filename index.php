<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jual Beli</title>
  <meta charset="utf-8">
  
  <?php include_once 'helper/template/include.php'; ?>
</head>
<body>

<?php include_once 'helper/template/header.php'; ?>

<div class="container text-center">
  <h3>
    <!-- View After Login -->
    <?php
      if(isset($_SESSION['username']))
      {
        echo "Welcome, ".$_SESSION['username'];
      }
    ?>
  </h3><br>
  <div class="row">
  <!-- Show All Products and Searching -->
      <?php
        include './database/db.php';

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          ?>
            <div class="col-sm-4 distance">
                  <p><b> <?php echo $row['brand']?> </b></p> <!-- Show smartphone brand from database -->
                  <!-- Image from path public/image/product/{image} -->
                  <center>
                    <img src="./public/image/product/<?php echo $row['image'] ?>" class="img-responsive" alt="Image"> <!-- {image} = image from database -->
                  </center>
                  <p><?php echo $row['type']?></p> <!-- Show smartphone type from database -->
                  <p>Rp <?php echo $row['price']?></p> <!-- Show smartphone price from database -->
                  <!-- Show Button Update and Delete -->
                  <?php
                    if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin')
                    {
                    ?>
                      <a class="btn btn-warning" href="update.php?id=<?php echo $row['id']?>"> Update</a>     
                      <a class="btn btn-danger" href="controller/doDelete.php?id=<?php echo $row['id']?>">Delete</a>
                    <?php
                    }
                  ?>
                  <?php 
                  if(isset($_SESSION['username']) && $_SESSION['username'] != 'admin'){
                    ?>
                    <a class="btn btn-warning" href="buy.php?id=<?php echo $row['id']?>"> Buy</a>  
                 <?php } ?>
                </div> 
              <!-- End Show Products -->    
          <?php
        }
      ?>
      </div>
  </div>
    <br>



</body>
</html>
