<?php
$con = mysqli_connect('localhost','root','','population_db');  
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['years', 'values1'],
          <?php 
			$query = "SELECT * from comparism_tb";

			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)){

			 echo "['".$row['years']."',".$row['values1']."],";
			 }
	?>
        ]);

        var options = {
          title: 'Years'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);S
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1600px; height: 750px;" ></div>
   
  </body>
</html>
