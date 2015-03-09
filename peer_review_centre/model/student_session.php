<?php

//Author Sami Start
//Reference: based on http://www.lynda.com/MySQL-tutorials/Creating-Session-class/653/47385-4.html

//A class to help work with Sessions
//In our case, primarily to manage logging students and admins in and out

// Keep in mind that it is generally inadvisable to store
// DB - related objects in sessions (data might become outdated or take up too much space)

class StudentSession {
  
  private $logged_in=false;
  public $student_id;
  public $message;
  
  function __construct() {
    session_start();
    $this->check_message();
    $this->check_login();
    if($this->logged_in) {
      // actions to take right away if student is logged in
    } else {
      // actions to take right away if student is not logged in
    }
  }
  
  public function is_logged_in() {
    return $this->logged_in;
  }

  public function login($student) {
    // database should find student based on studentname/password
    if($student){
      $this->student_id = $_SESSION['student_id'] = $student->id;
      $this->logged_in = true;
    }
  }
  
  public function logout() {
    unset($_SESSION['student_id']);
    unset($this->student_id);
    $this->logged_in = false;
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

  private function check_login() {
    if(isset($_SESSION['student_id'])) {
      $this->student_id = $_SESSION['student_id'];
      $this->logged_in = true;
    } else {
      unset($this->student_id);
      $this->logged_in = false;
    }
  }
  
  private function check_message() {
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

$session = new StudentSession;
$message = $session->message();

?>