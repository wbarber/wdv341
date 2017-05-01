<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/29/2017
 * Time: 8:58 PM
 */

session_cache_limiter('none');
session_start();

$_SESSION['validUser'] = "";

if ($_SESSION['validUser'] == "yes")				//is this already a valid user?
{
    //User is already signed on.  Skip the rest.
    $message = "Welcome Back!";	//Create greeting for VIEW area
}
else
{
    if (isset($_POST['submitLogin']) )			//Was this page called from a submitted form?
    {
        $userName = $_POST['loginUserName'];	//pull the username from the form
        $userPassword = $_POST['loginPassword'];	//pull the password from the form

        include 'connect.php';				//Connect to the database

        $sql = "SELECT user_name, user_password FROM wdv341_project_users WHERE user_name = :userName AND user_password = :userPassword";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':userPassword', $userPassword);

        	//prepare the query

        if ($stmt->execute()) {
           //message for later, maybe?
        }

        $count = $stmt->rowCount();

        if ($count == 1 )		//If this is a valid user there should be ONE row only
        {
            $_SESSION['validUser'] = "yes";				//this is a valid user so set your SESSION variable
            $message = "Welcome Back! $userName";

        }
        else
        {
            //error in processing login.  Logon Not Found...
            $_SESSION['validUser'] = "no";
            $message = "Sorry, there was a problem with your username or password. Please try again.";
        }

        $conn = null;

    }
    else
    {

    }

}//end else valid user

//turn off PHP and turn on HTML
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login Page</title>

    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        th {
            background-color: black;
            color: white;
        }

    </style>
</head>

<body>

<div class="jumbotron">
<div class="container text-center">
    <h1>Site Admin Page</h1>
</div>
</div>

<nav class="navbar navbar-inverse bg-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="subjects.php">Home</a></li>
                <li><a href='selectResults.php?recID=1'>HTML/CSS</a></li>
                <li><a href='selectResults.php?recID=2'>Java</a></li>
                <li><a href='selectResults.php?recID=3'>JavaScript</a></li>
                <li><a href='selectResults.php?recID=4'>PHP</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a> </li>
                <li><a href="adminLogin.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">


<?php
if ($_SESSION['validUser'] == "yes")	//This is a valid user.  Show them the Administrator Page
{

//turn off PHP and turn on HTML
    ?>
    <h2>Choose an option below</h2>

    <p><a href="adminSelectView.php">List Courses</a></p>
    <p><a href="adminInsertForm.php">Input New Courses</a></p>
    <p><a href="adminLogout.php">Logout of Admin System</a></p>

    <?php
}
else									//The user needs to log in.  Display the Login Form
{
    ?>

    <h2>Please login to the Administrator System</h2>
    <!--Change this style!!!-->
    <form method="post" action="adminLogin.php" >
        <div class ="form-group">
            <label for ="loginUserName">User Name:</label>
            <input type="text" class="form-control" name="loginUserName" id="loginUserName" placeholder="User Name">
        </div>
        <div class="form-group">
            <label for="loginPassword">Password:</label>
            <input type="password" class="form-control" name="loginPassword" id="loginPassword" autocomplete="new-password" placeholder="Password">
        </div>
        <button type="submit" name="submitLogin" class="btn btn-default">Submit</button>
    </form>

    <?php //turn off HTML and turn on PHP
}//end of checking for a valid user

//turn off PHP and begin HTML
?>

<p>Return to <a href='subjects.php'>Home</a></p>
</div>
</body>
</html>