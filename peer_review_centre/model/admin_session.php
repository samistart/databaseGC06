<?php

//Author Sami Start
//Reference: based on http://www.lynda.com/MySQL-tutorials/Creating-Session-class/653/47385-4.html

//A class to help work with Sessions
//In our case, primarily to manage logging admins and admins in and out

// Keep in mind that it is generally inadvisable to store
// DB - related objects in sessions (data might become outdated or take up too much space)

class AdminSession {
  
  private $logged_in=false;
  public $admin_id;
  public $message;
  
  function __construct() {
    session_start();
    $this->check_message();
    $this->check_login();
    if($this->logged_in) {
      // actions to take right away if admin is logged in
    } else {
      // actions to take right away if admin is not logged in
    }
  }
  
  public function is_logged_in() {
    return $this->logged_in;
  }

  public function login($admin) {
    // database should find admin based on adminname/password
    if($admin){
      $this->admin_id = $_SESSION['admin_id'] = $admin->id;
      $this->logged_in = true;
    }
  }
  
  public function logout() {
    unset($_SESSION['admin_id']);
    unset($this->admin_id);
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
    if(isset($_SESSION['admin_id'])) {
      $this->admin_id = $_SESSION['admin_id'];
      $this->logged_in = true;
    } else {
      unset($this->admin_id);
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

$session = new Session();
$message = $session->message();

?>