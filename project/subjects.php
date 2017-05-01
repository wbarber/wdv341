<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/28/2017
 * Time: 6:49 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Programming Resources</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

       body { padding-bottom: 70px; }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #222;
            padding: 25px;
        }

        img {
            display: block;
            margin: 0 auto;
        }
        body {
            background-color: #c8c8c8;
        }

    </style>
</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>Development Topics</h1>
    </div>
</div>

<nav class="navbar navbar-inverse">
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
                <li class="active"><a href="#">Home</a></li>
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
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">HTML/CSS</div>
                <div class="panel-body">
                    <a href='selectResults.php?recID=1'><img src='images/html5.png' class='img-responsive' style="width: 75%"; alt='Image'></a></div>
                <div class="panel-footer">Tutorials from beginner to advanced</div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Java</div>
                <div class="panel-body">
                    <a href='selectResults.php?recID=2'><img src="images/java.png" class="img-responsive" style="width:75%" alt="Image"></a></div>
                <div class="panel-footer">Tutorials from beginner to advanced</div>
            </div>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">JavaScript</div>
                <div class="panel-body">
                    <a href='selectResults.php?recID=3'><img src="images/js.png" class="img-responsive" style="width:75%" alt="Image"></a></div>
                <div class="panel-footer">Tutorials from beginner to advanced</div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">PHP</div>
                <div class="panel-body">
                    <a href='selectResults.php?recID=4'><img src="images/php.png" class="img-responsive" style="width:75%" alt="Image"></a></div>
                <div class="panel-footer">Tutorials from beginner to advanced</div>
            </div>
        </div>
    </div>
</div><br><br>


</body>
</html>

