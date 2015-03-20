<?php
  // Include controller for this view and verify whether an admin user is logged in.
  require_once("../../../controllers/prc_admin/groups.php");
  InitialiseAdmin::checkLoggedIn();
?>

<!-- Group followed by its ID -->
<h2>
  <?php echo "Group ".$group->groupID; ?>
  <button onclick="javascript:history.back()" class="btn btn-default">Back</button>
</h2>

<!-- Display all students in group -->
<div id="group-members" class="panel panel-default">
<div class="panel-body">

  <h3>Group members</h3>
  <table class="table table-striped">

    <thead>
      <tr>
        <th class="col-lg-5">Name</th>
        <th class="col-lg-5">Email address</th>
        <th class="col-lg-2">Last active</th>
      </tr>
    </thead>

    <tbody>
    <!-- Loop through all the students in the class and write them to the table -->
    <?php foreach($studentsInGroup as $student): ?>
      <tr>
        <td>
          <a href="../students/view_student.php?studentID=<?php echo $student->studentID; ?>">
            <?php echo $student->fullName(); ?>
          </a>
        </td>
        <td>
          <?php echo $student->email; ?>
        </td>
        <td>
          <?php echo $student->lastActive; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>

  </table>

<!-- Display message if group allocation has not been made yet -->
<?php if(empty($studentsInGroup)) {echo "Group allocation has not been made yet.";} ?>
</div>
</div>

<!-- Display report with its corresponding average grade. -->
<h3>This team received an average grade of <?php echo $group->averageGrade; ?></h3>

<?php include '../../../layouts/footer.php';?>
