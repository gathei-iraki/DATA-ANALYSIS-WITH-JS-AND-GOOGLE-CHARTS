<?php
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

$sql = "SELECT year_id, sales FROM sales_data_sample";
$result = $conn->query($sql);

$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'year_id', 'type' => 'string'),
    array('label' => 'sales', 'type' => 'number')
);

foreach($result as $r) {
    $temp = array();
    // The following line will ensure that the year is treated as a string
    $temp[] = array('v' => (string) $r['year_id']);
    $temp[] = array('v' => (int) $r['sales']);
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;

$conn->close();
?>
