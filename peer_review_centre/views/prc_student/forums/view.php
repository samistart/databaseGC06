<?php
  // Include controller for this view and verify whether a student user is logged in.
  require_once("../../../controllers/prc_student/threads.php");
  InitialiseStudent::checkLoggedIn();
?>

<legend>
  <h2>Welcome to your group forum</h2>
</legend>

<!-- Table to diplay all existing threads in current forum -->
<div id="threads">
  <table class="table table-striped table-hover">
    <thead>
      <th class="col-lg-7">Thread title </th>
      <th class="col-lg-3">Author </th>
      <th class="col-lg-2">Last Edited </th>
    </thead>
    <!-- Display message if there are no threads -->
    <?php if(empty($threads)) {echo "No threads have been started.";} ?>
    <tbody>
    <!-- Loop through all corresponding the thread entries in the database -->
    <?php foreach($threads as $thread): ?>
      <tr>
        <td>
          <a href="../threads/view.php?threadID=<?php echo $thread->threadID; ?>">
            <?php echo $thread->title; ?>
          </a>
        </td>
        <td>
          <?php $student = Student::findByID($thread->studentID);
            echo $student->fullName(); ?>
        </td>
        <td>
          <?php echo $thread->lastEdited; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Display possible success message in green box -->
<?php if (($session->message)) {greenBox($session->message);} ?>

<!-- Form to allow user to create a new thread. -->
<div id="thread-form" style="width:60%;">
  <h4>Start a new thread</h4>
  
  <!-- Display possible error message in red box -->
  <?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>
  <form class="form-horizontal" method="post" action="../../../views/prc_student/forums/view.php" name="newThread">
    <fieldset>

      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Title</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
      </div>

      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Content</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="5" name="content" maxlength="400"></textarea>
          <span class="help-block">Maximum 400 characters.</span>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary" name="submit">Create thread</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
