<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    //Always return JSON format


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');


        $return = [];

        //Make sure the suer does not exist

        //Make sure the user CAN be added and is Added

        //Return the proper info back to JavaScript to redirect us

        $return['redirect'] = '/dashboard.php';

        $return['name'] = 'Vincent Tripi';

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
    else {
        //Kill the script
        exit('test');
    }


?>