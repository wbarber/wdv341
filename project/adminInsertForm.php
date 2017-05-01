<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/29/2017
 * Time: 10:51 PM
 */

session_start();
if ($_SESSION['validUser'] == "yes")
{

    if (isset($_POST["submitForm"])) {

        include 'connect.php';

        $inCourseSubject = $_POST['course_subject'];
        $inCourseLink = $_POST['course_link'];
        $inCourseDescription = $_POST['course_description'];
        $inCourseID = $_POST['course_id'];


        $stmt = $conn->prepare("INSERT INTO wdv341_resources (course_subject, course_link, course_description, course_id)
    VALUES (:courseSubject, :courseLink, :courseDescription, :courseID)");

        $stmt->bindParam(':courseSubject', $inCourseSubject);
        $stmt->bindParam(':courseLink', $inCourseLink);
        $stmt->bindParam(':courseDescription', $inCourseDescription);
        $stmt->bindParam(':courseID', $inCourseID);

        if ($stmt->execute()) {
            $message = "<p>Form has been submitted.</p>";
            $message .= "<p>Click <a href='adminSelectView.php'>Here</a> to view</p>";
        } else {
            $message = "<p>You have encountered a problem.</p>";
        }

        $conn = null;

    } else {
        $message = "Please enter your info on the form.";
    }
}
else
{
    header('Location:adminLogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert Course Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #c8c8c8;
        }
    </style>
</head>

<body>

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
if(isset($_POST["submitForm"]))
{
    ?>
    <h1><?php echo $message; ?></h1>
    <?php
}
else {
    ?>
    <h2><?php echo $message; ?></h2>

    <form method="post" action="adminInsertForm.php">

        <div class="form-group">
            <label for ="courseSubject">Course Subject:</label>
            <input type="text" class="form-control" name="course_subject" id="courseSubject" />
        </div>
        <div class="form-group">
            <label for ="courseLink">Course Link:</label>
            <input type="text" class="form-control" name="course_link" id="courseLink" />
        </div>
        <div class="form-group">
            <label for ="courseDescription">Course Description:</label>
            <input type="text" class="form-control" name="course_description" id="courseDescription" />
        </div>
        <div class="form-group">
            <label for ="courseID">Course ID:</label>
            <select class="form-control" name="course_id" id="course_id">
                <option disabled selected value> -- select an option -- </option>
                <option value="1">HTML/CSS - 1</option>
                <option value="2">Java - 2</option>
                <option value="3">JavaScript - 3</option>
                <option value="4">PHP - 4</option>
            </select>
        </div>
        <button type="submit" name="submitForm" class="btn btn-primary">Submit</button>
        <button type="reset" name="reset" class="btn">Clear Form</button>

    </form>

    <?php
}
?>
</div>
</body>
</html>