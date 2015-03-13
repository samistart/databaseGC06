  </div> <!-- container div -->

  <div id="footer">Copyright <?php echo date("Y", time()); ?>,
    Team 38
  </div>
  
</body>

</html>
<?php if(isset($database)) { $database->closeConnection(); } ?>
