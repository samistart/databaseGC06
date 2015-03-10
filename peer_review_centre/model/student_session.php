<?php

// Author Sami Start
// Reference: based on http://www.lynda.com/MySQL-tutorials/Creating-Session-class/653/47385-4.html

// A class to help work with Sessions
// In our case, primarily to manage logging students and admins in and out

// Keep in mind that it is generally inadvisable to store
// DB - related objects in sessions (data might become outdated or take up too much space)

class StudentSession {
  
  private $loggedIn=false;
  public $studentID;
  public $message;
  
  function __construct() {
    session_start();
    unset($_SESSION['studentID']);
    $this->checkMessage();
    $this->checkLogin();
    if($this->loggedIn) {
      // actions to take right away if student is logged in
    } else {
      // actions to take right away if student is not logged in
    }
  }
  
  public function isLoggedIn() {
    return $this->loggedIn;
  }

  public function login($student) {
    // database should find student based on studentname/password
    if($student){
      $this->studentID = $_SESSION['studentID'] = $student->studentID;
      $this->loggedIn = true;
    }
  }
  
  public function logout() {
    unset($_SESSION['studentID']);
    unset($this->studentID);
    $this->loggedIn = false;
  }

  public function message($msg="") {
    if(!empty($msg)) {
      // then this is "set message"
      // make sure you understand why $this->message=$msg wouldn't work
      $_SESSION['message'] = $msg;
    } else {
      // then this is "get message"
      return $this->message;
    }
  }

  private function checkLogin() {
    if(isset($_SESSION['studentID'])) {
      $this->studentID = $_SESSION['studentID'];
      $this->loggedIn = true;
    } else {
      unset($this->studentID);
      $this->loggedIn = false;
    }
  }
  
  private function checkMessage() {
    // Is there a message stored in the session?
    if(isset($_SESSION['message'])) {
      // Add it as an attribute and erase the stored version
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
  }
  
}

$studentSession = new StudentSession;
$message = $studentSession->message();

?>