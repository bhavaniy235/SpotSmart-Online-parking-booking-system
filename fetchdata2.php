<?php
include("connection.php");
$sql = "SELECT id,bookingID,email,contactNumber,message,created_at FROM compliants";
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
