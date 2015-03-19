<?php

// Author Sami Start
// Reference: based on http://www.lynda.com/MySQL-tutorials/Creating-Session-class/653/47385-4.html

// A class to help work with Sessions
// In our case, primarily to manage logging students and admins in and out

// Keep in mind that it is generally inadvisable to store
// DB - related objects in sessions (data might become outdated or take up too much space)

class Session {
  
  private $loggedIn = false;
  private $isAdmin;
  public $userID;
  public $message;
  public $errorMessage;
  public $activeTab; 
  
  function __construct() {
    session_start();
    $this->checkMessage();
    $this->checkErrorMessage();
    $this->checkLogin();
    $this->checkAdmin();
    if($this->loggedIn) {
      // Actions to take right away if student is logged in
    } else {
      // Actions to take right away if student is not logged in
    }
  }
  
  public function isLoggedIn() {
    return $this->loggedIn;
  }

  public function isAdmin() {
    return $this->isAdmin;
  }

  //@args: student or admin object and a boolean for admin status
  public function login($user, $isAdmin) {

    // If it's an admin log in based on the $user's adminID
      if($user){
      $this->userID = $_SESSION['userID'] = $user->getPk();
      $this->isAdmin = $_SESSION['isAdmin'] = $isAdmin;
      $this->loggedIn = true;
      }

    // Database should find student based on studentname/password
    
  }
  
  public function logout() {
    unset($_SESSION['userID']);
    unset($this->userID);
    unset($this->isAdmin);
    $this->loggedIn = false;
  }

  public function message($msg="") {
    if(!empty($msg)) {
      // Then this is "set message"
      // Make sure you understand why $this->message=$msg wouldn't work
      $_SESSION['message'] = $msg;
    } else {
      // Then this is "get message"
      return $this->message;
    }
  }

    public function errorMessage($msg="") {
    if(!empty($msg)) {
      // Then this is "set message"
      // Make sure you understand why $this->message=$msg wouldn't work
      $_SESSION['errorMessage'] = $msg;
    } else {
      // Then this is "get message"
      return $this->errorMessage;
    }
  }

  private function checkLogin() {
    if(isset($_SESSION['userID'])) {
      $this->userID = $_SESSION['userID'];
      $this->loggedIn = true;
    } else {
      unset($this->userID);
      $this->loggedIn = false;
    }
  }

  private function checkAdmin() {
    if(isset($_SESSION['isAdmin'])) {
      $this->isAdmin = $_SESSION['isAdmin'];
    } else {
      unset($this->isAdmin);
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

  private function checkErrorMessage() {
    // Is there a message stored in the session?
    if(isset($_SESSION['errorMessage'])) {
      // Add it as an attribute and erase the stored version
      $this->errorMessage = $_SESSION['errorMessage'];
      unset($_SESSION['errorMessage']);
    } else {
      $this->errorMessage = "";
    }
  }
  
}

$session = new Session;
$message = $session->message();
$errorMessage = $session->errorMessage();

?>
