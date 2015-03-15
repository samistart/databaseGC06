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
  <table>
    <tr>
      <th>Rank </th>
      <th>Group </th>
      <th>Grade </th>
    </tr>
  <?php foreach($groupsByRank as $group): ?>
    <tr>
      <td>
        <?php echo $group->ranking; ?>
      </td>
      <td>
        <a href="view_group.php?groupID=<?php echo $group->groupID; ?>">
          <?php echo $group->groupName; ?>
        </a>
      </td>
      <td>
        <?php echo $group->averageGrade; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  <br>
  </table>
<?php if(empty($groupsByRank)) {echo "Group allocation has not been made yet.";} ?>
</div>

<?php include '../../../layouts/admin_footer.php';?>
