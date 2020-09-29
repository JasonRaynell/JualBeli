<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">JualBeli</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

          <?php
            session_start();
            if(isset($_SESSION['username'])== false)
            {
              ?>
                <!-- Guest View -->
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="register.php">Register</a></li>
              <?php
            }
            else {
              ?>
                <!-- Logged In View -->
                <?php if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
                  ?> <li><a href="notification.php">Notification</a></li>
                  <?php
                  }else{
                    ?> <li><a href="cart.php">Cart</a></li>
                    <?php 
                  }
                  ?>
                <li><a href="insert.php">Insert</a></li> 
                <li><a href="controller/doLogOut.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <?php
            }
          ?>
      </ul>
    </div>
  </div>
</nav>