<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
   ;

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
      google.charts.setOnLoadCallback(drawChart5);
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
        var PieChartData = '<?php echo $PieChartData; ?>';
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Program');
        data.addColumn('number', 'Anggaran');
        data.addRows(JSON.parse(PieChartData));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle; ?>',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      function drawChart1() {
        var PieChartData1 = '<?php echo $PieChartData1; ?>';

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Program');
        data.addColumn('number', 'Realisasi');
        data.addRows(JSON.parse(PieChartData1));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle1; ?>',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
      function drawChart2() {
        var PieChartData2 = '<?php echo $PieChartData2; ?>';

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Tahun');
        data.addColumn('number', 'Anggaran');
        data.addRows(JSON.parse(PieChartData2));

        // Set chart options
        var options = {
          'title':'<?php echo $PieChartTitle2; ?>',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
      function drawChart3() {
        var PieChartData3 = '<?php echo $PieChartData3; ?>';

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Tahun');
        data.addColumn('number', 'Realisasi');
        data.addRows(JSON.parse(PieChartData3));

        // Set chart options
        var options = {
          'title':'<?php echo $PieChartTitle3; ?>',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
      function drawChart4() {
        var PieChartData4 = '<?php echo $PieChartData4; ?>';

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tahun');
        data.addColumn('number', 'Realisasi');
        data.addRows(JSON.parse(PieChartData4));

        // Set chart options
        var options = {
          'title':'<?php echo $PieChartTitle4; ?>',
                       'width':600,
                       'height':500,
                       'sliceVisibilityThreshold': .01};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }
      function drawChart5() {
        var PieChartData5 = '<?php echo $PieChartData5; ?>';

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tahun');
        data.addColumn('number', 'Realisasi');
        data.addRows(JSON.parse(PieChartData5));

        // Set chart options
        var options = {
          'title':'<?php echo $PieChartTitle5; ?>',
                       'width':600,
                       'height':500,
                       'sliceVisibilityThreshold': .01};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div5'));
        chart.draw(data, options);
      }
      
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
   <table style="width:100%">
     <tr>
       <td><div id="chart_div"></div></td>
         <td> <div id="chart_div1"></div></td>
     </tr>
     <tr>
       <td> <div id="chart_div4"></div></td>
       <td><div id="chart_div5"></div></td>
     </tr>
     <tr>
       <td> <div id="chart_div2"></div></td>
       <td><div id="chart_div3"></div></td>
     </tr>
   </table> 
    
   
   
    
    

  
  </body>
</html>