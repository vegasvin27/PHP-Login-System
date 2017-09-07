<?php

    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    //Include the db.php file
    include_once "classes/db.php";

    $con = db::getConnection();

?>