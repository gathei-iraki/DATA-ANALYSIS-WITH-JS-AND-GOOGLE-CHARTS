google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales', 'Expenses', 'Profit'],
          ['Jan', 1000, 400, 200],
          ['Feb', 1170, 460, 250],
          ['March', 660, 1120, 300],
          ['April', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'KILU HOTEL PERFORMANCE',
            subtitle: 'Sales, Expenses, and Profit: Jan-April',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }