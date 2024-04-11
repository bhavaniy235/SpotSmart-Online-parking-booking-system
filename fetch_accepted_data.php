<?php
include("connection.php");
// Select the last five rows from the accepted table
$query = "SELECT BookingID,customer_name,mobile_number,vehicle_number FROM accepted_table ORDER BY BookingID DESC LIMIT 5";
$result = mysqli_query($conn, $query);
// Check for errors in the query
if (!$result) {
    die("Error fetching data from accepted table: " . mysqli_error($conn));
}
// Fetch the data and convert it to an associative array
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
// Close the connection
mysqli_close($conn);
// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
