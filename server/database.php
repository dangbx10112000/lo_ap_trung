<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><center>Data Base</h3>
		</div>
		<?php 
			if (isset($_GET['sdate']) || isset($_GET['edate'])) {
				$sdate = $_GET['sdate'];
				$edate = $_GET['edate'];
				$sql = mysqli_query($connect,"SELECT id,datenow,temp,humd FROM sensor WHERE datenow BETWEEN '$sdate' AND '$edate' ORDER BY ID DESC LIMIT 0,100");
			}
			else{
				$sql = mysqli_query($connect,"SELECT id,datenow,temp,humd FROM sensor ORDER BY ID DESC LIMIT 0,100");
			}
		 ?>

		<div class="panel-body">
	      <form class="form-horizontal" method="GET">  
	        <div class="form-group">
	          <label class="col-md-2">Từ ngày</label>   
	          <div class="col-md-2">
	            <input type="date" name="sdate" class="form-control" value="<?php echo $sdate; ?>" required>
	          </div>
	        </div>
	        <div class="form-group">
	          <label class="col-md-2">Đến ngày</label>   
	          <div class="col-md-2">
	            <input type="date" name="edate" class="form-control" value="<?php echo $edate; ?>" required>
	          </div>
	        </div>
	        <div class="form-group">
	          <label class="col-md-2"></label>   
	          <div class="col-md-8">
	            <input type="submit" class="btn btn-primary" value="Filter">
	            <a href='database.php'  class='btn btn-warning btn-sm'>Reset</a>
	          </div>
	        </div>
	      </form>

	      <table class="table table-bordered table-striped">
	        <thead>
	          <tr >
	            <th class='text-center'>ID</th>
	            <th class='text-center'>Thời gian</th>
	            <th class='text-center'>Nhiệt độ (độ C)</th>
	            <th class='text-center'>Độ ẩm (%)</th>    
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	            
	          while($data=mysqli_fetch_array($sql))
	          {
	            echo "<tr >
	            <td><center>$data[id]</td>
	            <td><center>$data[datenow]</center></td> 
	            <td><center>$data[temp]</td>
	            <td><center>$data[humd]</td>              
	            </tr>";
	          }
	          ?>
	        </tbody>
	      </table> 
	    </div>
	</div>
</div>
<?php include "footer.php"; ?>