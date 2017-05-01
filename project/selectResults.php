<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/28/2017
 * Time: 7:03 PM
 */

include 'connect.php';

$course_id = $_GET['recID'];

$stmt = $conn->prepare("SELECT course_subject, course_link, course_description FROM wdv341_resources WHERE course_id = $course_id ");

$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Courses</title>
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

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        th {
            background-color: black;
            color: white;

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
        <h1>Development Topics</h1>
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
    <!--Insert Topic somehow here -->
    <p>Visit the links below</p>

    <table class="table">
        <thead>
        <tr>
            <th class="th1">Course Site</th>
            <th class="th2">Description</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while ($row = $stmt->fetch() ) {

            $rowLink = $row['course_link'];
            $rowText = $rowLink;

            echo "<tr>";
            echo "<td><a href='" . $rowLink . "' target='_blank'>".$rowText."</a></td>";
            echo "<td>" . $row['course_description'] . "</td>";
            echo "</tr>\n";
        }

        $conn = null;
        ?>
        </tbody>
    </table>

</div>

</body>
</html>