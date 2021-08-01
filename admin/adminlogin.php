<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminlogin.css">
    <title>General User Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./adminlogin.js"></script>
</head>
<body>

<?php 

  $servername = "localhost";
  $username = "root";
  $password = "kanishka12@AB";
  $dbname = "users";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
    <div class="wrapper">
    <form class="login" action="adminlogin.php" method="POST">
        <p class="title">Log in</p>
        <input type="text" placeholder="Username" name="username" autofocus/>
        <i class="fa fa-user"></i>
        <input type="password" placeholder="Password" name="password" />
        <i class="fa fa-key"></i>
        <a href="#">Forgot your password?</a>
        <button>
        <i class="spinner"></i>
        <span class="state">Log in</span>
        </button>
        <?php
    if(isset($_POST['username'])){
        $adminusername=$_POST['username'];
        $adminuserpassword=$_POST['password'];
        $sql = "SELECT userID, firstName, lastName , userPassword FROM users WHERE userID='$adminusername' AND userPassword='$adminuserpassword'";
        $result = $conn->query($sql);
        if ($result->num_rows==0){
            echo "<div>Username or password is incorrect</div>";
        } else{
            while($row = $result->fetch_assoc()){
                session_cache_expire();
                session_start();
                sleep(1);
                $_SESSION['loggedname']=$row['firstName'].' '.$row['lastName'];
                echo '<div>done</div>';
                $conn->close();
                ?><script type="text/javascript">goToMain();</script><?php
            }
        }
    }
?>      
    </form>
    <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
    </p>
    </div>
</body>
</html>