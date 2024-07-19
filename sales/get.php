<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Modified SQL query to aggregate data by year
$sql = "SELECT year_id, SUM(sales) AS total_sales FROM sales_data_sample GROUP BY year_id";
$result = $conn->query($sql);

$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'Year', 'type' => 'string'),
    array('label' => 'Sales', 'type' => 'number')
);

foreach($result as $r) {
    $temp = array();
    // The following line will ensure that the year is treated as a string
    $temp[] = array('v' => (string) $r['year_id']);
    $temp[] = array('v' => (int) $r['total_sales']);
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;

$conn->close();
?>
