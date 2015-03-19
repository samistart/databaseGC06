<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../../../includes/initialise_admin.php');
  require_once("../../../controllers/prc_admin/rankings.php");
  InitialiseAdmin::checkLoggedIn();
?>

<!-- Display all groups and their grades by ranking -->
<div id="group-members">
  <h2>Group ranking</h2>
  <table class="table table-striped table-hover">
    <thead>
      <th class="col-lg-2">Rank </th>
      <th class="col-lg-8">Group </th>
      <th class="col-lg-2">Grade </th>
    </thead>
    <!-- Display message if groups haven't been allocated yet -->
    <?php if(empty($groupsByRank)) {echo "Group allocation has not been made yet.";} ?>
    <tbody>
    <?php foreach($groupsByRank as $group): ?>
      <tr>
        <td>
          <?php echo $group->ranking; ?>
        </td>
        <td>
          <a href="view_group.php?groupID=<?php echo $group->groupID; ?>">
            <?php echo "Group ".$group->groupID; ?>
          </a>
        </td>
        <td>
          <?php echo $group->averageGrade; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include '../../../layouts/footer.php';?>
