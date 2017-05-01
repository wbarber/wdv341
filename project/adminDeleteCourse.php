<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/29/2017
 * Time: 11:04 PM
 */

session_start();
if ($_SESSION['validUser'] == "yes") {
    include 'connect.php';

    $deleteRecId = $_GET['recID'];

    $sql = "DELETE FROM wdv341_resources WHERE id = $deleteRecId";


    $query = $conn->prepare($sql);

    $query->execute();

    $conn = null;
}
else
{
    header('Location: adminLogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course Deleted</title>
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
<div class="container">
<h1>Click <a href='adminSelectView.php'>here</a> to return to view</h1>
</div>


</body>



</html>