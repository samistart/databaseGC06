<?php
  require_once("../../../includes/initialise_student.php");
  require_once("../../../controllers/prc_student/comments.php");
  InitialiseStudent::checkLoggedIn();
?>

<!-- Display thread title and content -->
<div id="thread">
  <div class="title">
    <h2> <?php echo $thread->title; ?> </h2>
    <button onclick="window.location.href='../forums/view.php'">Back to forum</button>
  </div>
  <div class="content">
    <h3> <?php echo $thread->content; ?> </h3>
  </div>
  <div class="author">
    Started by <?php $student = Student::findByID($thread->studentID);
    echo $student->fullName(); ?> on <?php echo $thread->lastEdited; ?>
  </div>
</div>

<!-- Find and display all existing posts in current thread. -->
<div id="comments">
  <h3>Posts</h3>
  <table class="bordered">
    <tr>
      <th>Author</th>
      <th>Content</th>
      <th>Date</th>
    </tr>
    <?php foreach($comments as $comment): ?>
      <tr>
        <td>
          <?php $student = Student::findByID($comment->studentID);
          echo $student->fullName(); ?>
        </td>
        <td>
          <?php echo $comment->content; ?>
        </td>
        <td>
          <?php echo $comment->lastEdited; ?>
        </td>
      </tr>
    <?php endforeach; ?> 
  </table>
  <?php if(empty($comment)) {echo "No posts.";} ?>
</div>

<!-- Form to allow user to create a new post. -->
<div id="comment-form">
  <h3>Write a new post</h3>
  <?php echo $session->message; ?>
  <form method="post" action="../../../controllers/prc_student/comments.php?threadID=<?php echo $thread->threadID;?>" name="newComment">
    <label>Content:</label>
    <input type="text" name="content"/><br>
    <p><input type="submit" name="submit" value="Submit post"></p>
  </form>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
