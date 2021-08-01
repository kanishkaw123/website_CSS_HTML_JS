
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Special meta tags-->
    <meta name="description" content="Contact details">
    <meta name="keywords" content="houses r us contact, contact houses r us ">
    <meta name="author" content="K G M Withanawasam">

    <!--linking a title image-->
    <link rel="shortcut icon" href="../home_page_images/home.png">
    
    <!--Title of the page-->
    <title>Houses R US - Contact Us page</title>

    <!--Style sheets-->
    <link rel="stylesheet" href="../shared.css"> 
    <link rel="stylesheet" href="./contact.css">

    
</head>


<body>

<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\website\contact_us\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\website\contact_us\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\website\contact_us\PHPMailer\src\SMTP.php';
require 'C:\xampp\phpMyAdmin\vendor\autoload.php';

if (isset($_POST['NAME'])){
    // Getting data from submitted form
    $name =$_POST['TITLE'].' '.$_POST['NAME'];
    $conNum = $_POST['CONTACT_NUMBER'];
    $email = $_POST['EMAIL'];
    $comments = $_POST['comments'];
    $bestCon = $_POST['BEST_WAY_TO_CONTACT'];
    $reason = $_POST['COMPLAINT'];
    $msgSta="UNREAD";

    $servername = "localhost";
    $username = "root";
    $password = "kanishka12@AB";
    $dbname = "houses_r_us";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";


    //script for inserting data
    $sql = "INSERT INTO messages (msgName, contact, email, comments, contMethd, msgStat, reason, date_time)
    VALUES ('$name', '$conNum', '$email', '$comments', '$bestCon', '$msgSta' ,'$reason', CURRENT_TIMESTAMP);";

    if ($conn->query($sql) === TRUE) { 
        
        $refNum = $conn->insert_id;
        $ref="";
        if ($reason=='YES') {
            $ref="C".$refNum;
        } else{
            $ref="N".$refNum;
        }
        
        ?>
        <div id="modal_container" style="display:block;">
            <div id="modal">
                <h3>Thank you for your enquiry!</h3>
                <div>
                    Your response has been successfully recorded. One of our agents will contact you
                    as soon as possible 
                    <br>
                    <strong>Your Ref:<?php echo $ref ?> </strong> 

                    <?php 

                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug =0;

                    if (isset($ref)) {
                        //Server settings                    //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'wwithanawasam@gmail.com';                     //SMTP username
                        $mail->Password   = 'kanishkaG12@AB';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('wwithanawasam@gmail.com', 'Wixkler');
                        $mail->addAddress($email, $name);     //Add a recipient

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Your inquiry ref: '.$ref;
                        $mail->Body    = '
                        
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="apple-mobile-web-app-capable" content="yes">
                            <style>
                                /*Styles for modal*/
                                #modal_container{
                                    display: block;
                                    position: fixed;
                                    width: 100%;
                                    padding: 40px 0 40px 0;
                                    background-color:#232336  ;
                                }

                                /*Styles for modal box banner*/
                                #modal{
                                    background-color: white;
                                    width: 500px;
                                    padding: 20px;
                                    border-radius: 5px;
                                    margin-left: auto;
                                    margin-right: auto;
                                }

                                /*Styles for modal banner heading*/
                                #modal h3{
                                    margin: 10px auto;
                                }
                                </style>
                        </head>


                        <body>
                            <div id="modal_container">
                                <div id="modal">
                                    <h3>Thank you for your enquiry!</h3>
                                    <div>
                                    Your response has been successfully recorded. One of our agents will contact you
                                    as soon as possible 
                                    <br>
                                    <br>
                                    <strong>Your Ref: '.$ref.' </strong>
                                    </div>
                                </div>
                            </div>     
                        </body>
                        
                        </html>
                        
                        
                        ';

                        $mail->send();
                        echo '<div> Your referance number sent to your email <div>';
                    } else {
                        echo "<div>Emailing referance failed due to error: {$mail->ErrorInfo} </div>";
                    }
                    ?>
                </div>
                <div style="margin-top: 15px;">
                    <input type="button" id="modal_close_button" onClick="goToHome()" value="Home" style="padding: 5px 30px;">
                </div>
            </div>
        </div>
    

    <?php
    
    } else { ?>
    <div id="modal_container" style="display:block;">
        <div id="modal">
            <h3>Something went wrong</h3>
            <div>
                Error: <?php echo" ".$sql.$conn->error ?>
            </div>
            <div style="margin-top: 15px;">
                <input type="button" id="modal_close_button" onClick="goToHome()" value="Go to Home" style="padding: 5px 30px;">
            </div>
        </div>
    </div>

    <?php
    }

    $conn->close(); 
}
?>
    <script src="./form.js"></script>
</body>
</html>