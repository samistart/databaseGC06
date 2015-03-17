<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."controllers/prc_admin/assessments_assign.php");
  InitialiseAdmin::checkLoggedIn();

?>

<?php echo $session->message; ?>

<form class="form-horizontal" method="post" 
  action="../../../controllers/prc_admin/assessments_assign.php" 
  name="neededQuestionMark">
  <fieldset>
    <legend>Assessment Allocation</legend>
    
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Assessing Group</label>
      <div class="col-lg-10">
        <select class="form-control" id="assesser" name="student1">
          <option value="0" selected>select assessing group</option>
          <?php foreach($groups as $group) {
            echo '<option>'.$group->groupID.'</option>'; } ?>
        </select>
        <hr>
      </div>
      <label for="select" class="col-lg-2 control-label">Receiving Groups</label>
      <div class="col-lg-10">
        <select class="form-control" id="assessee1" name="student2">
          <option value="0" selected>select group to be assessed</option>
          <?php foreach($groups as $group) {
            echo '<option>'.$group->groupID.'</option>'; } ?>
        </select>
        <br>
        <select class="form-control" id="assessee2" name="student3">
          <option value="0" selected>select group to be assessed</option>
          <?php foreach($groups as $group) {
            echo '<option>'.$group->groupID.'</option>'; } ?>
        </select>
        <br>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

<?php include '../../../layouts/footer.php'; ?>
