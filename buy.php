<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buy</title>
    <?php include_once 'helper/template/include.php'; ?>
</head>
    <?php include_once 'helper/template/header.php'; ?>
<body>
<div class="title">
        <center>
          <h3>Buy</h3>
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
          </p>
			</div>

        <!-- Show Products -->
       <?php 
       include './database/db.php';
       $id = $_GET['id'];
       $sql = "SELECT * FROM products WHERE id ='$id'";
       $result = $conn->query($sql);
       while($row = $result->fetch_assoc()){
           ?>
           <div>
           <p><b> <?php echo $row['brand']?> </b></p> <!-- Show smartphone brand from database -->
                  <!-- Image from path public/image/product/{image} -->
                  <center>
                    <img src="./public/image/product/<?php echo $row['image'] ?>" class="img-responsive" alt="Image"> <!-- {image} = image from database -->
                  </center>
                  <p><?php echo $row['type']?></p> <!-- Show smartphone type from database -->
                  <p>Rp <?php echo $row['price']?></p> <!-- Show smartphone price from database -->
                  <!-- Input all data to server for temporary use -->
                  <?php $_SESSION['brand'] = $row['brand']; ?>
                  <?php $_SESSION['price'] = $row['price']; ?>
                  <?php $_SESSION['type'] = $row['type']; ?>
                  <?php $_SESSION['image'] = $row['image']; ?>
           </div>
        <?php      
         }
       ?>
       <form action="./controller/addtocart.php" method="post">
       <div>Quantity: <input type="number" name="quantity" size = "10"></div>
       <input type="submit" value="AddToCart" class="btn btn-success">
       </form>
       <a class="btn btn-danger" href="./index.php?">Cancel</a>
</body>
</html>