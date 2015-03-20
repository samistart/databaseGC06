<?php
  // Initialise admin files and verify whether an admin user is logged in.
  require_once('../../../includes/initialise_admin.php');
  InitialiseAdmin::checkLoggedIn();
?>

<!-- Create student object corresponding to the studentID passed in the URL -->
<?php $student = Student::findByID( $database->escapeValue( (int) trim($_GET['studentID']) ) );?>

<!-- Title of page (student's full name) -->
<h2>
  <?php echo $student->fullName(); ?>
  <button onclick="javascript:history.back()" class="btn btn-default">Back</button>
</h2>

<!-- Display information about student -->
<div id="group-members" class="panel panel-default">
  <div class="panel-body">
    <h4>Email</h4>
    <a href=<?php echo "mailto:".$student->email; ?> >
      <?php echo $student->email; ?>
    </a>
    <h4>Group</h4>
    This student belongs to 
      <a href="../groups/view_group.php?groupID=<?php echo $student->groupID; ?>">
        group <?php echo $student->groupID; ?>.
      </a>
    <h4>Last activity</h4>
    <?php echo $student->lastActive; ?>
  </div>
</div>

<?php include '../../../layouts/footer.php';?>
