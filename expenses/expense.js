// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var startDate = '31-03-2021';  // Change this to the desired start date
  var endDate = '31-12-2021';    // Change this to the desired end date
  $.ajax({
      url: "exp.php",
      dataType: "json",
      data: {
          start_date: startDate,
          end_date: endDate
      },
      success: function(jsonData) {
          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(jsonData);

          // Instantiate and draw our chart, passing in some options.
          var options = {
            title: 'Total Costs and Revenues from ' + startDate + ' to ' + endDate,
            width: 600,
            height: 400,
            legend: { position: 'right' },
            pieSliceText: 'value'
          };

          var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
          chart.draw(data, options);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log("Error: " + textStatus + " - " + errorThrown);
      }
  });
}