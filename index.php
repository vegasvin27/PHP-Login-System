<?php
    define('__CONFIG__', true);
    require_once "inc/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="follow">

  <title>Page Title</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>

<div class="uk-section uk-container">
  <?php
    echo "Hello World Today is: ";
    echo date("m d Y");
    ?>

    <p>
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
    </p>

</div>




<?php require_once "inc/footer.php"; ?>


</body>
</html>