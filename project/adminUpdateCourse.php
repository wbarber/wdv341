<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/29/2017
 * Time: 11:04 PM
 */

$id= "";
$course_subject = "";
$course_link = "";
$course_description = "";
$course_id = "";


include 'connect.php';

if(isset($_POST["submit"])) {
    $id = $_POST['id'];
    $course_subject = $_POST['course_subject'];
    $course_link = $_POST['course_link'];
    $course_description = $_POST['course_description'];
    $course_id = $_POST['course_id'];


    $stmt = $conn->prepare("UPDATE wdv341_resources SET course_id = :courseID, course_subject = :courseSubject, course_link = :courseLink, course_description = :courseDescription WHERE `id` = $id");

    $stmt->bindParam(':courseID', $course_id, PDO::PARAM_STR);
    $stmt->bindParam(':courseSubject', $course_subject, PDO::PARAM_STR);
    $stmt->bindParam(':courseLink', $course_link, PDO::PARAM_STR);
    $stmt->bindParam(':courseDescription', $course_description, PDO::PARAM_STR);

    if ( $stmt->execute() )
    {
        $message = "<h1>The course has been updated</h1>";
        $message .= "<p>Click <a href='adminSelectView.php'>Here</a> to view courses</p>";
    }
    else
    {
        $message = "<h1>You've encountered an error</h1>";
    }
}
else
{
    $updateRecID = $_GET['recID'];

    $sql = "SELECT id, course_subject, course_link, course_description, course_id FROM wdv341_resources WHERE id = :updateRecID";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':updateRecID'=> $updateRecID));

    $stmt->bindColumn('id', $id);
    $stmt->bindColumn('course_subject', $course_subject);
    $stmt->bindColumn('course_link', $course_link);
    $stmt->bindColumn('course_description', $course_description);
    $stmt->bindColumn('course_id', $course_id);


    $row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #c8c8c8;
        }</style>
    <title>Update Courses</title>
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
//If the user submitted the form the changes have been made
if(isset($_POST["submit"]))
{
    echo $message;	//contains a Success or Failure output content
}//end if submitted

else
{	//The page needs to display the form and associated data to the user for changes
    ?>
    <form id="updateForm" name="updateForm" method="post" action="adminUpdateCourse.php">

        <p>Update the following Course Information.  </p>
        <div class="form-group">
            <label for ="courseSubject">Course Subject:</label>
            <input type="text" class="form-control" name="course_subject" id="courseSubject" value="<?php echo $course_subject ?>"/>
        </div>
        <div class="form-group">
            <label for ="courseLink">Course Link:</label>
            <input type="text" class="form-control" name="course_link" id="courseLink" value="<?php echo $course_link; ?>">
        </div>
        <div class="form-group">
            <label for ="courseDescription">Course Description:</label>
            <input type="text" class="form-control" name="course_description" id="courseDescription" value="<?php echo $course_description; ?>">
        </div>
        <div class="form-group">
            <label for ="courseID">Course ID:</label>
            <select class="form-control" name="course_id" id="courseID">
                <option disabled selected value> -- select an option -- </option>
                <option value="1">HTML/CSS - 1</option>
                <option value="2">Java - 2</option>
                <option value="3">JavaScript - 3</option>
                <option value="4">PHP - 4</option>
            </select>
        </div>
        <div class="form-group">
        <input type="hidden" name="id" id="id"
               value="<?php echo $id?>" />
        </div>
        <button type="submit" name="submit" class="btn">Update</button>
        <button type="reset" name="reset" class="btn">Clear Form</button>

    </form>

    <?php
}//end else submitted

$conn = null;
?>
</div>

</body>
</html>