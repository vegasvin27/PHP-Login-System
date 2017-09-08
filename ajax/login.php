<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    //Always return JSON format


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //header('Content-Type: application/json');


        $return = [];

        $email = Filter::String($_POST['email']);

        //Make sure the suer does not exist
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if ($findUser->rowCount() == 1) {
            //User exists. Try and sign them in
            $User = $findUser->fetch(PDO::FETCH_ASSOC);

            $return['error'] = "You already have an account";
            $return['is logged in'] = false;
        }
        else {
            //They need to create a new account
            $return['error'] = "You do not have an account. <a href='register.php'>Create one now?</a>";
        }



        //Make sure the user CAN be added and is Added

        //Return the proper info back to JavaScript to redirect us

        $return['name'] = 'Vincent Tripi';

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
    else {
        //Kill the script
        exit('Invalid URL');
    }


?>