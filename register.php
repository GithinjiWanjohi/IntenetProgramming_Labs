<?php
//include_once 'DBConnector.php';
include_once 'user.php';

if (isset($_POST['btn-save'])){
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$city = $_POST['cityName'];

//	Posting timezone variables to DB
    $utc_timestamp = $_POST['utc_timestamp'];
    $offset = $_POST['time_zone_offset'];
	
	$user = new User($firstName, $lastName, $city, $username, $password, $utc_timestamp, $offset);

//	checking whether the user has input data in all fields
    if(!$user->validateForm()){
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    }else if (!$user->isUserExists()){
        echo "Username exists!!!";
    }else {
//    calls the save function once button is clicked
        $res = $user->save();

//    Save notification progress notification
        if($res){
            echo "Save operation successful";
        }else{
            echo "Save unsuccessful";
        }
//        $con->closeDatabase();
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Internet Programming Lab
		</title>
		<script type="text/javascript" src="validate.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">

        <!--including jquery here-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Timezone js-->
        <script type="text/javascript" src="timezone.js"></script>
	</head>
	<body>
		<form method="POST" name="user_details"	id="user_details 
		"onsubmit="return validateForm()"
		action="register.php">
			<table align="centre">
                <tr>
                    <div id="form-errors">
                    <?php
                        session_start();
                        if(!empty($_SESSION['form_errors'])){
                            echo " ".$_SESSION['form_errors'];
                            unset($_SESSION['form_errors']);
                        }
                    ?>
                    </div>
                </tr>
				<tr>
					<td><input type="text" name="firstName" id="firstName" required placeholder="First Name" /></td>
				</tr>
				<tr>
					<td><input type="text" name="lastName" id="lastName" placeholder="Last Name" /></td>
				</tr>
				<tr>
					<td><input type="text" name="cityName" id="cityName" placeholder="City" /></td>
				</tr>
                <tr>
                    <td><input type="text" name="username" id="username" placeholder="Username" /></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password" placeholder="Password" /></td>
                </tr>
				<tr>
					<td><input type="submit" name="btn-save" value="Save"/></td>
				</tr>
                <tr>
                    <td><a href="login.php">Login</a></td>
                </tr>
                <tr>
                    <!--Hidden controls to store client utc date and time zone-->
                    <td><input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""></td>
                    <td><input type="hidden" name="time_zone_offset"  id="time_zone_offset"></td>
                </tr>
                </table>
		</form>
	</body
</html>