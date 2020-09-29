<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proof</title>
    <?php include_once 'helper/template/include.php'; ?>
</head>
    <?php include_once 'helper/template/header.php'; ?>
<body>
<div class="title">
        <center>
          <h3>Proof</h3>
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
        <form action="./controller/checkout.php<?php echo $_GET['id']?>" method="post">
        <div class="form-group">
              <label class="control-label col-sm-2" for="image">Image:</label>
              <div class="col-sm-10">
                <input type="file" id="image" name="image">
              </div>
            </div>
            <button type="submit" class="btn btn-default">Submit</button></button>
        </form>
    
</body>
</html>