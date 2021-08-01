<?php 
include('./functions.php') ;
session_start() ;
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 15)) {
    // last request was more than 30 minutes ag0
    echo "<script >console.log('error running')</script>";
    session_unset();
    session_destroy();   // destroy session data in storage
}
$_SESSION['time']=time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./browser.js"></script>   
    <title>Houses - R US admin</title>
</head>
<body>
    <header>
        <div>
            <h1>Messages Panel</h1>
            <div id="loginPanel"> 
                <?php if (!isset( $_SESSION['loggedname'])){?> 
                <h3> User has not signed-in</h3>
            <?php }else{ ?>
                <h3>Signed in as <br>
                <?php echo $_SESSION['loggedname'] ;?>
                </h3>
                <button onclick="activityCheck()">Sign Out</button>
            <?php } ?>
            </div>
        </div>        
    </header>
    <main id="main">
        <div class="grid headers">
            <div class="grid-item" style="padding-left: 10px;">Message ID</div>
            <div class="grid-item">Date & Time</div>
            <div class="grid-item">Name</div>
            <div class="grid-item">Message</div>
            <div class="grid-item">Contact Num</div>
            <div class="grid-item">Email</div>
            <div class="grid-item" style="padding-right: 0px;">Complaint</div>
        </div>
        <div class="data" id="messagesData">
            <div id="messagesDataPanel">
        <?php
        if (!isset( $_SESSION['loggedname'])){
            ?> <div> Session not available! <a href="./adminlogin.php">Click here to login</a></div>
            <?php
        }else{
             loadData(); 
        }
        ?>
            </div>
        </div>
    </main>
     
<script src="./admin.js"></script>
</body>
</html>