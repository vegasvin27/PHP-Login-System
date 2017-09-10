<?php
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    //Always return JSON format


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //header('Content-Type: application/json');


        $return = [];

        $email = Filter::String($_POST['email']);
        $password = $_POST['password'];
        $user_found = User::Find($email, true);

        //Make sure the suer does not exist

        if ($user_found) {
            //User exists. Try and sign them in
            $user_id = (int) $user_found['user_id'];
            $hash = (string) $user_found['password'];

            if (password_verify($password, $hash)) {
                //User is signed in
                $return['redirect'] = 'dashboard.php';
                $_SESSION['user_id'] = $user_id;
            }
            else {
                //Invalid user email/password combo
                $return['error'] = "Invalid user email/password combo";
            }

            $return['is logged in'] = false;
        }
        else {
            //They need to create a new account
            $return['error'] = "You do not have an account. <a href='register.php'>Create one now?</a>";
        }



        //Make sure the user CAN be added and is Added

        //Return the proper info back to JavaScript to redirect us

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }
    else {
        //Kill the script
        exit('Invalid URL');
    }


?>