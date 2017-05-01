<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/29/2017
 * Time: 10:51 PM
 */

session_start();


if ($_SESSION['validUser'] == "yes") {

    include 'connect.php';

    $stmt = $conn->prepare("SELECT id, course_subject, course_link, course_description, course_id FROM wdv341_resources ORDER BY course_id ASC");

    if( $stmt->execute() )
    {

    }

    else {

        $message = "<h1>There was a problem</h1>";
        echo $message;
    }
}
else
{
    header('Location: adminLogin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

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
        body {
            background-color: #c8c8c8;
        }

        .th1 {
            border-radius: 5px 0px 0px 5px;
        }

        .th2 {
            border-radius: 0px 5px 5px 0px;
        }
    </style>
</head>

<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>Update or Delete</h1>
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
    <p>Select a row to update or delete</p>
        <table class="table">
            <thead>
            <tr>
                <th class="th1">ID</th>
                <th>Subject</th>
                <th>Link</th>
                <th>Description</th>
                <th>Course ID</th>
                <th>Update</th>
                <th class="th2">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //Display rows of data in table
            while( $row = $stmt->fetch() )
                //Turn each row of the result into an associative array
            {
                //For each row you have in the array create a table row
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['course_subject']."</td>";
                echo "<td>".$row['course_link']."</td>";
                echo "<td>".$row['course_description']."</td>";
                echo "<td>".$row['course_id']."</td>";
                echo "<td><a href='adminUpdateCourse.php?recID=".$row['id']. "'>Update</a></td>";
                echo "<td><a href='adminDeleteCourse.php?recID=".$row['id']. "'>Delete</a></td>";
                echo "</tr>\n";
            }
            $conn = null;	//Close the database connection
            ?>
            </tbody>
        </table>
</div>
</body>
</html>