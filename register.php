<!-- Form Login & Check Session -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include_once 'helper/template/include.php'; ?>
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
	<?php include_once 'helper/template/header.php'; ?>
	
	<!-- If user has logged in, Redirect to index.php -->

	<div class="container text-center login">
    	<div class="container">
	        <div class="card card-container">
	            <img id="profile-img" class="profile-img-card" src="public/image/asset/avatar_2x.png" />
	            <p id="profile-name" class="profile-name-card"></p>
				 <?php if(isset($_SESSION['error'])){
							echo $_SESSION['error'];
						}
							unset($_SESSION['error']);
						?>
	            <form class="form-signin" method="POST" action="./controller/doRegister.php">
	                <input type="text" name="txtUsername" id="inputUsername" class="form-control" placeholder="Username">
	                <input type="password" name="txtPassword" id="inputUsername" class="form-control" placeholder="Password">
					<div class="g-recaptcha" data-sitekey="6LfbNMgUAAAAAON6zIgG-OT-o48GT9A-6TdWFl_e"></div>
				    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
	            </form>
	        </div>
        </div>
	</div>
	
</body>
</html>