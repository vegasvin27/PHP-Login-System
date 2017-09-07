<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    //Always return JSON format


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');


        $return = [];

        $email = Filter::String($_POST['email']);

        //Make sure the suer does not exist
        $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if ($findUser->rowCount() == 1) {
            //User exists
            //Also check to see if they are able to login
            $return['error'] = "You already have an account";
        }
        else {
            //User does not exist. Add now.
            $addUser = con->prepare("INSERT INTO users(email, password) VALUES(:email, :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
             $addUser->bindParam(':password', $password, PDO::PARAM_STR);
              $addUser->execute();
        }



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