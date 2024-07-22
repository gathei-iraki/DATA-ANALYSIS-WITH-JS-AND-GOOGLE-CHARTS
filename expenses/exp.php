<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chart";



// Get the start and end dates from the URL parameters (or set default values)
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '2021-03-31';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '2021-12-31';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}

// SQL query to obtain yearly totals for multiple columns
$sql = "SELECT YEAR(date) AS year,
       SUM(total_revenue) AS total_revenue,
       SUM(cost_of_revenue) AS total_cost_revenue,
       SUM(gross_profit) AS total_gross_profit,
       SUM(premium_revenue) AS total_premium_revenue,
       SUM(premium_cost_revenue) AS total_premium_cost_revenue,
       SUM(premium_gross_profit) AS total_premium_gross_profit,
       SUM(ad_revenue) AS total_ad_revenue,
       SUM(ad_cost_revenue) AS total_ad_cost_revenue,
       SUM(ad_gross_profit) AS total_ad_gross_profit,
       SUM(mau) AS total_mau,
       SUM(premium_mau) AS total_premium_mau,
       SUM(ad_mau) AS total_ad_mau,
       SUM(salesandmarketing_cost) AS total_salesandmarketing_cost,
       SUM(researchanddev_cost) AS total_researchanddev_cost,
       SUM(generalandadmin_cost) AS total_generalandadmin_cost
FROM spotify_quarterly_1
WHERE date BETWEEN ? AND ?
GROUP BY YEAR(date);


$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'Year', 'type' => 'string'),
    array('label' => 'Total Revenue', 'type' => 'number'),
    array('label' => 'Total Cost of Revenue', 'type' => 'number'),
    array('label' => 'Total Gross Profit', 'type' => 'number'),
    array('label' => 'Total Premium Revenue', 'type' => 'number'),
    array('label' => 'Total Premium Cost Revenue', 'type' => 'number'),
    array('label' => 'Total Premium Gross Profit', 'type' => 'number'),
    array('label' => 'Total Ad Revenue', 'type' => 'number'),
    array('label' => 'Total Ad Cost Revenue', 'type' => 'number'),
    array('label' => 'Total Ad Gross Profit', 'type' => 'number'),
    array('label' => 'Total MAU', 'type' => 'number'),
    array('label' => 'Total Premium MAU', 'type' => 'number'),
    array('label' => 'Total Ad MAU', 'type' => 'number'),
    array('label' => 'Total Sales and Marketing Cost', 'type' => 'number'),
    array('label' => 'Total Research and Development Cost', 'type' => 'number'),
    array('label' => 'Total General and Admin Cost', 'type' => 'number')
);

foreach($result as $r) {
    $temp = array();
    $temp[] = array('v' => (string) $r['year']);
    $temp[] = array('v' => (int) $r['total_revenue']);
    $temp[] = array('v' => (int) $r['total_cost_revenue']);
    $temp[] = array('v' => (int) $r['total_gross_profit']);
    $temp[] = array('v' => (int) $r['total_premium_revenue']);
    $temp[] = array('v' => (int) $r['total_premium_cost_revenue']);
    $temp[] = array('v' => (int) $r['total_premium_gross_profit']);
    $temp[] = array('v' => (int) $r['total_ad_revenue']);
    $temp[] = array('v' => (int) $r['total_ad_cost_revenue']);
    $temp[] = array('v' => (int) $r['total_ad_gross_profit']);
    $temp[] = array('v' => (int) $r['total_mau']);
    $temp[] = array('v' => (int) $r['total_premium_mau']);
    $temp[] = array('v' => (int) $r['total_ad_mau']);
    $temp[] = array('v' => (int) $r['total_salesandmarketing_cost']);
    $temp[] = array('v' => (int) $r['total_researchanddev_cost']);
    $temp[] = array('v' => (int) $r['total_generalandadmin_cost']);
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;

$stmt->close();
$conn->close();
?>
