<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification</title>
    <?php include_once 'helper/template/include.php'; ?>
</head>
    <?php include_once 'helper/template/header.php'; ?>
    <?php include_once 'helper/csrf.php'; ?>
<body>
<div class="title">
        <center>
          <h3>Notification</h3>
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
        $sql = "SELECT * FROM notification";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          ?>
            <div class="col-sm-4 distance">
                  <!-- Image from path public/image/product/{image} -->
                  <center>
                    <img src="./public/image/product/<?php echo $row['image'] ?>" class="img-responsive" alt="Image"> <!-- {image} = image from database -->
                  </center>
                  <p><?php echo $row['username']?></p> <!-- Show username from database -->
                  <form action="controller/DeleteNotif.php?id=<?php echo $row['id']?>" method="post">
                  <button type="submit" class ="btn btn-danger">Approve</button>
                  </form>
                </div> 
              <!-- End Show Products -->    
          <?php
        }
      ?>
      </div>
</body>
</html>