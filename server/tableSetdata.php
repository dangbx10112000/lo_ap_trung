<?php
    $sql = mysqli_query($connect,"SELECT tempset,humdset,timeset FROM setdata");
?>
<table class="table table-bordered table-striped">
    <thead>
      <tr >
        <th class='text-center'>Nhiệt độ (độ C)</th>
        <th class='text-center'>Độ ẩm (%)</th>
        <th class='text-center'>Thời gian đảo trứng(phút)</th> 
      </tr>
    </thead>
    <tbody>
    <?php
    
          while($data=mysqli_fetch_array($sql))
        {
          echo "<tr> 
          <td><center>$data[tempset]</td>
          <td><center>$data[humdset]</td>
          <td><center>$data[timeset]</td>              
          </tr>";
        }
    ?>
    </tbody>
</table> 
 