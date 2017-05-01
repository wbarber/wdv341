<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/29/2017
 * Time: 10:51 PM
 */

session_start();	//provide access to the current session

$_SESSION['validUser']='no';
session_unset();	//remove all session variables related to current session
session_destroy();	//remove current session

header('Location: adminLogin.php');

