<?php
  //require_once("../../../includes/initialise_student.php");
  require_once("../../../controllers/prc_student/comments.php");
  InitialiseStudent::checkLoggedIn();
?>

<!-- Display thread title and content -->
<div id="thread">
  <legend>
    <h2>
      <?php echo $thread->title; ?>
      <button onclick="window.location.href='../forums/view.php'" class="btn btn-default">Back to forum</button>
    </h2>
  </legend>
  <div class="content">
    <p class="lead"> <?php echo $thread->content; ?> </p>
  </div>
  <div class="author">
    Started by <?php $student = Student::findByID($thread->studentID);
    echo $student->fullName(); ?> on <?php echo $thread->lastEdited; ?>
  </div>
</div>

<!-- Find and display all existing posts in current thread. -->
<div id="comments">
  <table class="table table-striped">
    <thead>
      <th style="width:70%;"></th>
      <th style="width:15%;"></th>
      <th></th>
    </thead>
    <tbody>
    <?php foreach($comments as $comment): ?>
      <tr>
        <td>
          <?php echo $comment->content; ?>
        </td>
        <td>
          <?php $student = Student::findByID($comment->studentID);
          echo $student->fullName(); ?>
        </td>
        <td>
          <?php echo $comment->lastEdited; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<!-- Display message if there are no posts. -->
<?php if(empty($comment)) {echo "No posts.";} ?>
</div>

<!-- Form to allow user to create a new post. -->
<div id="thread-form" style="width:60%;">
  <h4>Reply to thread</h4>
  <?php echo $session->message; ?>
  <form class="form-horizontal" method="post" action="../../../controllers/prc_student/comments.php?threadID=<?php echo $thread->threadID;?>" name="newComment">
    <fieldset>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Content</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="5" name="content" maxlength="400"></textarea>
          <span class="help-block">Maximum 400 characters.</span>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
