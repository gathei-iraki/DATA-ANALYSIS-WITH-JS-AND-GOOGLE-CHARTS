<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chart";

// Get the start and end dates from the URL parameters (or set default values)
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '31-03-2021';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '31-12-2021';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// SQL query to obtain totals for the specified date range
$sql = "SELECT 
           SUM(cost_of_revenue) AS total_cost_revenue,
           SUM(premium_cost_revenue) AS total_premium_cost_revenue,
           SUM(ad_cost_revenue) AS total_ad_cost_revenue,
           SUM(salesandmarketing_cost) AS total_salesandmarketing_cost,
           SUM(researchanddev_cost) AS total_researchanddev_cost,
           SUM(generalandadmin_cost) AS total_generalandadmin_cost
        FROM spotify_quarterly
        WHERE date BETWEEN ? AND ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date); // Bind the actual dates to the placeholders
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'Category', 'type' => 'string'),
    array('label' => 'Total', 'type' => 'number')
);

$categories = [
    'Total Cost of Revenue' => $data['total_cost_revenue'],
    'Total Premium Cost Revenue' => $data['total_premium_cost_revenue'],
    'Total Ad Cost Revenue' => $data['total_ad_cost_revenue'],
    'Total Sales and Marketing Cost' => $data['total_salesandmarketing_cost'],
    'Total Research and Development Cost' => $data['total_researchanddev_cost'],
    'Total General and Admin Cost' => $data['total_generalandadmin_cost']
];

foreach ($categories as $category => $total) {
    $temp = array();
    $temp[] = array('v' => $category);
    $temp[] = array('v' => (int) $total);
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
echo json_encode($table);

$stmt->close();
$conn->close();
?>
