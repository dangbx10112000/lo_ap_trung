<?php
include "connect.php";
?>

<?php
  $x_date  = mysqli_query($connect, 'SELECT datenow FROM ( SELECT * FROM sensor ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  $y_temp   = mysqli_query($connect, 'SELECT temp FROM ( SELECT * FROM sensor ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  $y_humd   = mysqli_query($connect, 'SELECT humd FROM ( SELECT * FROM sensor ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Biểu đồ nhiệt độ & độ ẩm</h3>
    </div>

    <div class="panel-body">
      <canvas id="myChart"></canvas>
      <script>
       var canvas = document.getElementById('myChart');
        var data = {
            labels: [<?php while ($b = mysqli_fetch_array($x_date)) { echo '"' . $b['datenow'] . '",';}?>],
            datasets: [
            {
                label: "temp",
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(105, 0, 132, .2)",
                borderColor: "rgba(200, 99, 132, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(200, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($y_temp)) { echo  $b['temp'] . ',';}?>],
            },
            {
                label: "humd", 
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(0, 137, 132, .2)",
                borderColor: "rgba(0, 10, 130, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(0, 10, 130, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($y_humd)) { echo  $b['humd'] . ',';}?>],
            }
            ]
        };

        var option = 
        {
          showLines: true,
          animation: {duration: 0}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

      </script>          
    </div>    
  </div>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Bảng cập nhật nhiệt độ & độ ẩm</h3>
    </div>
    <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>Thời gian</th>
            <th class='text-center'>Nhiệt độ (độ C)</th>
            <th class='text-center'>Độ ẩm (%)</th>
          </tr>
        </thead>
        
        <tbody>
          <?php

            $sql = mysqli_query($connect, "SELECT datenow,temp,humd FROM sensor ORDER BY ID DESC LIMIT 0,20");
            while($data=mysqli_fetch_array($sql))
            {
              echo "<tr >
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