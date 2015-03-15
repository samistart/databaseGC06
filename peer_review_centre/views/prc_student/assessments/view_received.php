


<div id="">
    <h3>Reports to assess</h3>
    <table class="bordered">
      <tr>
        <th>Group</th>
        <th>Report</th>
      </tr>
      <?php foreach($reports as $comment): ?>
      <tr>
        <td>
          <?php $student = Student::findByID($comment->studentID);
          echo $student->fullName(); ?>
        </td>
        <td>
          <?php echon $comment->content; ?>
        </td>
        <td>
          <?php echo $comment->lastEdited; ?>
        </td>
      </tr>
      <?php endforeach; ?> 
    </table>
    <?php if(empty($comment)) {echo "No posts.";} ?>
  </div>