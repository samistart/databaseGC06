<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."controllers/prc_admin/groups_allocate.php");
?>

<?php echo $session->message; ?>

<form class="form-horizontal" method="post" 
  action="../../../controllers/prc_admin/groups_allocate.php" 
  name="neededQuestionMark">
  <fieldset>
    <legend>Allocation</legend>
    
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="student1" name="student1">
          <?php foreach($students as $student) {
            echo '<option>'.$student->fullName().'</option>'; } ?>
        </select>
        <br>
        <select class="form-control" id="student2" name="student2">
          <?php foreach($students as $student) {
            echo '<option>'.$student->fullName().'</option>'; } ?>
        </select>
        <br>
        <select class="form-control" id="student3" name="student3">
          <?php foreach($students as $student) {
            echo '<option>'.$student->fullName().'</option>'; } ?>
        </select>
        <br><br>
        <select class="form-control" id="group" name="group">
          <?php foreach($groups as $group) { 
            echo "<option>$group->groupID</option>"; } ?>
        </select>
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
