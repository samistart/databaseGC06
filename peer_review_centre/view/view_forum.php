<html>

<head>
	<title>Forum</title>
  	<link rel="shortcut icon" href="../icon.ico" />
</head>

<body>
  <?php require_once("header_student.php"); ?>
  <?php require_once("../controller/process_threads.php"); ?>
  <?php require_once("../model/student.php"); ?>

  <h2>Welcome to your group forum</h2>

  <!-- Display all existing threads. -->
  <div id="threads">
    <h3>Threads</h3>
    <table class="bordered">
      <tr>
        <th>Thread title</th>
        <th>Date/Time</th>
        <th>Author</th>
      </tr>
    <?php foreach($threads as $thread): ?>
      <tr>
        <td>
          <a href="view_thread.php?threadID=<?php echo $thread->threadID; ?>">
            <?php echo $thread->title; ?>
          </a>
        </td>
        <td>
          <?php echo $thread->dateCreated; ?>
        </td>
        <td>
          <?php $student = Student::find_by_id($thread->studentID);
            echo $student->fullName(); ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
  <?php if(empty($threads)) {echo "No threads.";} ?>
  </div>

  <!-- Form to allow user to create a new thread. -->
  <div id="thread-form">
    <h3>Start a new thread</h3>
    <form method='post' action='../controller/process_threads.php' name='newThread'>
      <label>Title:</label>
      <input type='text' name='title' size='50'><br>
      <label>Content:</label>
      <input type='text' name='content' size='1000' style="height:300px; width:500px;"><br>
      <p><input type='submit' name='submit' value='Create thread'></p>
    </form>
  </div>
</body>

</html>
