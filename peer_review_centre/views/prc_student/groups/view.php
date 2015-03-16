<?php
  require_once('../../../includes/initialise_student.php');
  require_once("../../../controllers/prc_student/groups.php");
  InitialiseStudent::checkLoggedIn();
?>

<!-- Display all team members and their info -->
<div id="group-members">
  <h3>Your group members</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email address</th>
        <th>Last active</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($members as $member): ?>
      <tr>
        <td><?php echo $member->fullName(); ?></td>
        <td><?php echo $member->email; ?></td>
        <td><?php echo $member->lastActive; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<!-- Link to group Forum if there are other team members, message otherwise -->
<?php if(empty($members)) {echo "Group allocation has not been made yet.";} ?>
<?php if(!empty($members)) {echo "You can discuss your report and assessments with your group via your private <a href='../forums/view.php' > group forum</a>.";} ?>
</div>


<!-- Class ranking -->
<div id="ranking">
  <h3>Your group's performance </h3>
  <div style="width: 100%;">
    <div style="float: left; width: 30%;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Your grade</h3>
        </div>
        <div class="panel-body">
          <?php echo $group->averageGrade; ?> out of 5.
        </div>
      </div>
    </div>
    <div style="float: right; width: 30%;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Average grade</h3>
        </div>
        <div class="panel-body">
          The average grade in your class is <?php echo $totalAverage; ?>.
        </div>
      </div>
    </div>
    <div style="margin: auto; width: 30%;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Ranking</h3>
        </div>
        <div class="panel-body">
          Your group is ranked <?php echo $groupRank; ?> from a total of <?php echo $noGroups; ?> groups.
        </div>
      </div>
    </div>
    <br style="clear: both;" />
  </div>
</div>

<?php include '../../../layouts/footer.php';?>
