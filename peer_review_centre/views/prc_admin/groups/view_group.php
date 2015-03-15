<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../../includes/initialise_admin.php');
  require_once("../../../controllers/prc_admin/groups.php");
  InitialiseAdmin::checkLoggedIn();
?>

<h2><?php echo $group->groupName; ?></h2>

<!-- Display all students in group -->
<div id="group-members">
  <h3>Group members</h3>
  <table>
  <?php foreach($studentsInGroup as $student): ?>
    <tr>
      <td>
        <?php echo $student->fullName(); ?>
      </td>
      <td>
        <?php echo $student->email; ?>
      </td>
      <td>
        <?php echo $student->lastActive; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <br>
  </table>
<?php if(empty($studentsInGroup)) {echo "Group allocation has not been made yet.";} ?>
</div>

<!-- Display report with its corresponding average grade. -->
<h3>This team received an average grade of <?php echo $group->averageGrade; ?></h3>

<?php include '../../../layouts/admin_footer.php';?>
