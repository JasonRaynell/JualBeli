<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <?php include_once 'helper/template/include.php'; ?>
</head>
    <?php include_once 'helper/template/header.php'; ?>
<body>
<div class="title">
        <center>
          <h3>Cart</h3>
        </center>
      </div>
		<div class="container text-center update-form">
      
			<div class="errorMessage">
				<!-- Show Error Message -->
					<p style="color: red;"> 
            <?php
							if(isset($_SESSION['error']))
							{
								echo $_SESSION['error'];

								//tidak menunjukan error lagi
								unset($_SESSION['error']);
							}
						?>
      <div class="row">
  <!-- Show All Products and Searching -->
      <?php
        include './database/db.php';
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM cart WHERE username = '$username'";
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
                  <a class="btn btn-success" href="./proof.php?<?php echo $row['id']?>">Checkout</a>
                </div> 
              <!-- End Show Products -->    
          <?php
        }
      ?>
      </div>
</body>
</html>