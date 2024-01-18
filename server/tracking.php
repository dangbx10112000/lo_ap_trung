<?php include "header.php"; ?>
<script>
var refreshId = setInterval(function()
{
    $('#responsecontainer').load('chart.php');
}, 1000);
</script>
    
<div class="container">

  <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  
  <div id="responsecontainer">
	
  </div>	
</div>


<?php include "footer.php"; ?>

