<?php
//Author Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once('../includes/initialise_student.php');
include '../model/report.php';

global $session;
//get an object with the current student
$currentStudent = Student::findByID("$session->userID");
//create a report object
$newReport = new Report($_POST["title"], $_POST["abstract"], $_POST["content"], "$currentStudent->groupID");
//use report object to create database entry
$newReport->create();

redirectTo($location = "../view/view_my_report.php");
?>
