  </div> <!-- container div -->

<div class="panel-footer">Copyright <?php echo date("Y", time()); ?>, Team 38</div>
  
</body>

</html>
<?php if(isset($database)) { $database->closeConnection(); } ?>
