<?php
include("connection.php");
?>
<?php
session_start();
if (isset($_SESSION['user_email']) && isset($_SESSION['user_name'])) {
    $user_email = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
} else {
    // If the user is not logged in, handle it accordingly (e.g., redirect to the login page)
    echo "something went wrong";
    exit();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="style1.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script>
        function calculateHours() {
    var startTime = $('#startTime').val();
    var endTime = $('#endTime').val();
    if (startTime && endTime) {
        var start = new Date('1970-01-01T' + startTime + 'Z');
        var end = new Date('1970-01-01T' + endTime + 'Z');

        // Check if end time is earlier than start time and adjust
        if (end < start) {
            end.setDate(end.getDate() + 1); // Add 1 day to end time
        }

        var diff = (end - start) / (1000 * 60 * 60);
        // Update the hours span
        $('#hours').text(diff.toFixed(2));

        // Calculate and update the total price based on block and hourly rate
        var block = $('#block').val();
        var hourlyRate = ((block === 'A' || block === 'B') ? 50 : 70);
        var totalPrice = diff * hourlyRate;
        console.log('totalPrice:', totalPrice);
        $('#totalPrice').text('' + totalPrice.toFixed(2));
        $('#hiddenTotalPrice').val(totalPrice.toFixed(2));
    }
}
        // Use window.onload to ensure the script runs after the DOM is fully loaded
        window.onload = function () {
            // Get today's date in the format YYYY-MM-DD
            var today = new Date().toISOString().split('T')[0];
            // Set the minimum attribute of the date picker to today
            $('#datePicker').attr('min', today);
            // Function to calculate the time difference in hours between two time inputs
            // Attach the calculateHours function to the change event of start time and end time inputs
            $('#startTime, #endTime,#block').change(calculateHours);
            // Function to populate slots based on the selected block
            // Attach the calculateHours function to the click event of the "NEXT" button
            $('#nextButton').click(function () {
                calculateHoursBeforeSubmit();
            });
            $('form').submit(function (event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                // Call calculateHours and then submit the form programmatically
                calculateHours();
                this.submit();
            });
            window.calculateHoursBeforeSubmit = function () {
                calculateHours(); // Call calculateHours before submitting the form
                // Get the total price
                var totalPrice = parseFloat($('#totalPrice').text().replace('$', ''));
                // Check if the total price is greater than zero
                if (totalPrice > 0) {
                    return true; // Allow the form to be submitted
                } else {
                    alert('Total price cannot be zero. Please adjust your booking details.');
                    return false; // Prevent the form from being submitted
                }
            };
            function populateSlots() {
                var block = $('#block').val();
                var numSlots = 30;
                // Clear previous options
                $('#slot').empty();
                // Populate slots dynamically
                for (var i = 1; i <= numSlots; i++) {
                    $('#slot').append('<option value="' + i + '">Slot ' + i + '</option>');
                }
            }
            // Attach the populateSlots function to the change event of the block select
            $('#block').change(populateSlots);
            // Initial population of slots
            populateSlots();
            calculateHours();
        };
    </script>
</head>
<header class="header">
    &emsp; &emsp;&emsp; <a href="#" class="logo"><img src="IMG_20231001_062437.jpg"></a>
</header>

<body>
    <form action="book_slot.php" method="POST">
        <center>
            <h1>BOOK SLOT</h1>
        </center>
        <table border=0 width="100%" cellpadding="30" cellspacing="40">
            <tr>
                <td width="30%" height="50">
                    <div class="forbg">
                        <center>
                            <h2>
                                <?php echo "Welcome  $user_name";?>
                            </h2>
                            <h5>
                                <?php echo "$user_email";?>
                            </h5>
                            <a href="ss2.html">LOGOUT</a>
                        </center>
                    </div>
                </td>
                <td class="forbg" width="70" rowspan="3">
                    <div class="forborder">
                        <div class="container">
                            <center>
                                <h1 class="head">Fill the Details</h1>
                            </center>
                            <!-- Booking Date and Time Selection -->
                            <div class="mb-4">
                                <label for="datePicker">
                                    <h2>Booking Date:</h2>
                                </label>
                                <input type="date" id="datePicker" name="bookingDate" class="form-control">
                            </div><br>
                            <div class="mb-4">
                                <label for="bookingTime">
                                    <h2>Booking Time:</h2>
                                </label>
                                <label for="startTime">Start Time:</label>
                                <input class="form-control" type="time" id="startTime" name="startTime"
                                    onchange="calculateHours()">
                                <label for="endTime">End Time:</label>
                                <input class="form-control" type="time" id="endTime" name="endTime"
                                    onchange="calculateHours()">
                                <p>Number of Hours: <span id="hours" name="hours">0</span> hours</p>
                            </div>

                            <h2>Select a Slot:</h2>
                            <p><span class="material-icons-sharp">two_wheeler</span>Rs.50/- per hour at Block A|B</p>
                            <p><span class="material-icons-sharp">directions_car</span>Rs.70/- per hour at Block C|D</p><br>
                            <label for="block">Select the block:</label>
                            <select id="block" name="block" class="form-control">
                                <option value="A">Block A</option> 
                                <option value="B">Block B</option>
                                <option value="C">Block C</option>
                                <option value="D">Block D</option>
                            </select>
                            <input type="hidden" id="hiddenTotalPrice" name="totalPrice" value="0">
                            <br><br>
                            <label for="slot">Available slots:</label>
                            <select class="form-control" id="slot" name="slot">
                                <!-- Slots will be populated dynamically based on the selected block -->
                            </select><br><br>
                            <!-- Selected Slots and Pricing -->
                            <b>
                                <font size="5px" class="price" name="totalPrice">Total Price:</font><span
                                    id="totalPrice">0</span>
                            </b>
                            <!-- Payment Button -->
                            <center><button id="nextButton" class="btn btn-primary"><b>NEXT>></b></button></center>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr></tr>
        </table>
    </form>
</body>
</html>
