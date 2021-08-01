<?php

header('Content-Type: application/json');

$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) )  {

    switch($_POST['functionname']) {
        case 'readUpdate':
           if( !is_array($_POST['arguments'])) {
               $aResult['error'] = 'Error in arguments!';
           }
           else {

            $servername = "localhost";
            $username = "root";
            $password = "kanishka12@AB";
            $dbname = "houses_r_us";
          
          
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $id = $_POST['arguments'][0];
          
            $sql = "UPDATE messages SET msgStat='READ' WHERE msgNo='$id'";
          
            if ($conn->query($sql) === TRUE) {
              $aResult['result'] = 'Successfully updated';
            } else {
              $aResult['result'] = 'Error '.$conn->error;
            }
               
           }
          $conn->close();

          
          break;

        default:
           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
           break;
    }

}

echo json_encode($aResult);
?>