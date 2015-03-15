<?php
  require_once('../../../includes/initialise_student.php');
  require_once("../../../controllers/prc_student/groups.php");
  InitialiseStudent::checkLoggedIn();
?>

<!-- Display all team members and their info -->
<div id="group-members">
  <h3>Your group members</h3>
  <table class="bordered">
  <?php foreach($members as $member): ?>
    <tr>
      <td>
        <?php echo $member->fullName(); ?>
      </td>
      <td>
        <?php echo $member->email; ?>
      </td>
      <td>
        <?php echo "Last active on ".$student->lastActive; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <br>
  </table>
<?php if(empty($members)) {echo "Group allocation has not been made yet.";} ?>
</div>

<!-- Link to group Forum -->
You can contact your team members via your <a href='../forums/view.php' > group forum</a>.

<!-- Class ranking -->
<div id="ranking">
  <h3>Your group's ranking </h3>
  Your group's total grade is <?php echo $group->averageGrade; ?> <br>
  The total average grade for all groups is <?php echo $totalAverage; ?> <br>
  You are ranked <?php echo $groupRank; ?> from a total of <?php echo $noGroups; ?> groups. <br>
</div>

<?php include '../../../layouts/footer.php';?>
