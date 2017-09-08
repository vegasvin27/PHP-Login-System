<?php
//Force the user to be logged in or redirect
function Forcelogin() {
      if (isset($_SESSION['user_id'])) {
      //The user is allowed here
    }
    else {
      //The user is not allowed here
      header("Location: login.php"); exit;
    }
  }

  function ForceDashboard(){
    if (isset($_SESSION['user_id'])) {
      //The user is allowed here
        header("Location: dashboard.php"); exit;
    }
    else {
      //The user is not allowed here

    }
  }


?>