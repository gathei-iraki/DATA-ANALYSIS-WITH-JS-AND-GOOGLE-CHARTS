google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Months', 'Sales', 'Expenses'],
    ['Jan',  1000,      400],
    ['Feb',  1170,      460],
    ['March',  660,       1120],
    ['April',  1030,      540],
    ['May', 1250,          900],
    ['June', 850,        1000],
    ['July', 1240,       550],
    ['Aug',  1350,       700],
    ['Sep', 1050,        340],
    ['Oct', 1100,        600],
    ['Nov', 890,         550],
    ['Dec', 1400,        900]

  ]);

  var options = {
    title: 'Company Performance',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart.draw(data, options);
}