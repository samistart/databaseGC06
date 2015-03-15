</div> <!-- container div -->
<footer class="footer">
  <div class="container">
    <p class="text-muted">Copyright <?php echo date("Y", time()); ?>, Team 38.</p>
  </div>
</footer>
</body></html>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./test_files/ie10-viewport-bug-workaround.js"></script> 

<?php if(isset($database)) { $database->closeConnection(); } ?>
