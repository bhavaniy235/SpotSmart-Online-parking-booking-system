<?php
include("connection.php");
// Query to fetch data from the 'bookings' table
$sql = "SELECT BookingID,user_email,booking_date,start_time,end_time,block,selected_slot,total_price,customer_name,mobile_number,vehicle_number FROM bookings";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Fetching data and storing it in an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
// Sending the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "No data found";
}
// Close the database connection
$conn->close();
?>
