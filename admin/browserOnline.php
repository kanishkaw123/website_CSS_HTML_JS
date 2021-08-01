<?php

header('Content-Type: application/json');
session_start();

$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) )  {

    switch($_POST['functionname']) {
        case 'online':
           if( !is_array($_POST['arguments'])) {
               $aResult['error'] = 'Error in arguments!';
           }
           else {
               $_SESSION['time']=time();

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