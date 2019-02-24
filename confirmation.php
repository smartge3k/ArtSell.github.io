<?php

    require 'core/init.php';

    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'user_delete':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   //$aResult['result'] = add(floatval($_POST['arguments'][0]));
                    //$aResult['result'] =  "data sent is : " . floatval($_POST['arguments'][0]);
                    //$aResult['result'] =  test(floatval($_POST['arguments'][0])) . test(floatval($_POST['arguments'][1]));
                    
                    if (delete_user(floatval($_POST['arguments'][0]) , floatval($_POST['arguments'][1])) == true) {
                      $aResult['result'] =  "Success";
                    }
                    else {
                      $aResult['error'] =  "There was some error";
                    }
                    
               }
               break;

            case 'user_reactivate':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) != 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   //$aResult['result'] = add(floatval($_POST['arguments'][0]));
                    //$aResult['result'] =  "data sent is : " . floatval($_POST['arguments'][0]);
                    //$aResult['result'] =  test(floatval($_POST['arguments'][0])) . test(floatval($_POST['arguments'][1]));
                    
                    if (activate_user(floatval($_POST['arguments'][0]) , floatval($_POST['arguments'][1])) == true) {
                      $aResult['result'] =  "Success";
                    }
                    else {
                      $aResult['error'] =  "There was some error";
                    }
                    
               }
               break;

            case 'news':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>