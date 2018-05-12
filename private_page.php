<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/5/2018
 * Time: 11:17 PM
 */
session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
?>

<html>
<head>
    <title>Private page</title>
    <script type="text/javascript" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="validate.css">
    <script src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="apikey.js"></script>
<!--    Bootstrap file-->
<!--    js-->
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<!--    css-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">
</head>
<body>
    <p>This is a private page</p>
    <p> We want to protect it</p>
    <p align="right"><a href="logout.php"></a></p>
    <hr>
    <h3>Here, we will create an API that will allow Users/Developer to order items from external systems</h3>
    <hr>
    <h4>We now put this feature of allowing users to generate an API key. CLick the button to generate the API key</h4>

    <button class="btn btn-primary" id="api-key-btn">Generate API key</button><br><br>
    <!--This text are will hold the API key-->
    <strong>Your API key:</strong>Note that if your API key is already in use by already running applications,
    generating a new key will stop the application from functioning<br>
    <textarea cols="100" rows="2" id="api_key" name="api_key" readonly><?php echo fetchUserApiKey();?></textarea>

    <h3>Service description:</h3>
    We have a service/API that allows external applications to order food and also
    pull all order status by using order id. Let's do it.

    <hr>

</body>
</html>
