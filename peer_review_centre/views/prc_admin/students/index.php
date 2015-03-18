<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  //require_once('../../../includes/initialise_admin.php');
  require_once("../../../controllers/prc_admin/students.php");
  InitialiseAdmin::checkLoggedIn();
?>

<!-- Display all students and the groups they belong to -->
<div id="student-list">
  <h2>Students</h2>
  <table class="table table-striped table-hover">
    <thead>
      <th style="width:80%;">Full Name </th>
      <th>Group </th>
    </thead>
    <!-- Display message if there aren't any students in the database yet -->
    <?php if(empty($students)) {echo "There are currently no student accounts.";} ?>
    <tbody>
    <?php foreach($students as $student): ?>
      <tr>
        <td>
          <a href="view_student.php?studentID=<?php echo $student->studentID; ?>">
          <?php echo $student->reverseFullName(); ?>
          </a>
        </td>
        <td>
          <?php $group = Group::findByID($student->groupID);?>
          <?php echo "Group ".$student->groupID; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include '../../../layouts/footer.php';?>
