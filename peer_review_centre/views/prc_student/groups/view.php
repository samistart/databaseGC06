<?php
  // Include controller for this view and verify whether a student user is logged in.
  require_once("../../../controllers/prc_student/groups.php");
  InitialiseStudent::checkLoggedIn();
?>

<h2> <?php echo "Group ".$student->groupID; ?> </h2>

<!-- Display all team members and their info -->
<div id="group-members" class="panel panel-default">
<div class="panel-body">
  <legend>
    <h3>Your teammates</h3>
  </legend>

  <!-- Table containing teammates of current student -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="col-lg-5">Name</th>
        <th class="col-lg-5">Email address</th>
        <th class="col-lg-2">Last active</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($members as $member): ?>
      <tr>
        <td><?php echo $member->fullName(); ?></td>
        <td>
          <a href=<?php echo "mailto:".$member->email; ?> >
            <?php echo $member->email; ?>
          </a>
        </td>
        <td><?php echo $member->lastActive; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<hr>

<!-- Link to group Forum if there are other team members, message otherwise -->
<?php if(empty($members)) {echo "Group allocation has not been made yet.";} ?>
<?php if(!empty($members)) {echo "You can discuss your report and assessments with your group via your private <a href='../forums/view.php' > group forum</a>.";} ?>
</div>
</div>

<!-- Group performance -->
<div id="performance" class="panel panel-default">
<div class="panel-body">

  <legend>
    <h3>Your group's performance </h3>
  </legend>

  <!-- Box with current group's average grade -->
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Your grade</h3>
      </div>
      <div class="panel-body">
        <?php echo $group->averageGrade; ?> out of 5.
      </div>
    </div>
  </div>

  <!-- Box with class average grade -->
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Average grade</h3>
      </div>
      <div class="panel-body">
        The average grade in your class is <?php echo $totalAverage; ?>.
      </div>
    </div>
  </div>

  <!-- Box with current group's ranking -->
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Ranking</h3>
      </div>
      <div class="panel-body">
        Your group is ranked <?php echo $groupRank; ?> out of <?php echo $noGroups; ?> groups.
      </div>
    </div>
  </div>

</div>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
