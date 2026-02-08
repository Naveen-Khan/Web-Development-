<?php
// Fetch data from the form
$city_name = $_POST['city_name'];
$hotel_name = $_POST['hotel_name'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guest_name = $_POST['Guest_name'];
$guest_cnic = $_POST['cnic_guest'];
$user_cnic = $_POST['user_cnic'];
$price = $_POST['price'];
$total_price = $_POST['totalprice'];

// Validate check-in and check-out dates
if (strtotime($checkin) >= strtotime($checkout)) {
    die("Error: Check-out date must be greater than check-in date.");
}

// Database connection
$con = new mysqli("localhost", "root", "", "we_project");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}

// Step 1: Check if the user is registered using CNIC
$query = $con->prepare('SELECT Cnic, id FROM registration WHERE Cnic = ?');
$query->bind_param("s", $user_cnic);
$query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id']; // Store user ID for the booking
    $query->close();

    // Step 2: Find an available room based on hotel and dates
    $A_Query = $con->prepare(
        'SELECT r.room_id, r.room_no, ar.staring_date, ar.ending_date, ar.available_id, r.hotel_id 
         FROM room r 
         JOIN available_room ar ON r.room_id = ar.room_id AND r.hotel_id = ar.hotel_id 
         WHERE r.hotel_id = (SELECT hotel_id FROM hotels WHERE hotel_name = ?) 
         AND ar.staring_date <= ? 
         AND ar.ending_date >= ? 
         LIMIT 1'
    );
    $A_Query->bind_param('sss', $hotel_name, $checkin, $checkout);
    $A_Query->execute();
    $result = $A_Query->get_result();

    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
        $room_id = $room['room_id'];
        $room_no = $room['room_no'];

        // Handle room availability updates based on booking dates
        $room_start = $room['staring_date'];
        $room_end = $room['ending_date'];

        // Case 1: Availability Before and After Booking
        if ($room_start < $checkin && $room_end > $checkout) {
            $new_start_date = date('Y-m-d', strtotime($checkout . ' +1 day'));
            $updateQuery = $con->prepare("UPDATE available_room SET staring_date = ? WHERE available_id = ?");
            $updateQuery->bind_param("si", $new_start_date, $room['available_id']);
            $updateQuery->execute();

            $new_end_date = date('Y-m-d', strtotime($checkin . ' -1 day'));
            $insertQuery = $con->prepare("INSERT INTO available_room (room_id, hotel_id, room_no, staring_date, ending_date) VALUES (?, ?, ?, ?, ?)");
            $insertQuery->bind_param("iisss", $room_id, $room['hotel_id'], $room_no, $room_start, $new_end_date);
            $insertQuery->execute();
        } elseif ($room_start == $checkin || $room_end == $checkout) {
            $new_start_date = date('Y-m-d', strtotime($checkout . ' +1 day'));
            $updateQuery = $con->prepare("UPDATE available_room SET staring_date = ? WHERE available_id = ?");
            $updateQuery->bind_param("si", $new_start_date, $room['available_id']);
            $updateQuery->execute();
        } else {
            $deleteQuery = $con->prepare("DELETE FROM available_room WHERE available_id = ?");
            $deleteQuery->bind_param("i", $room['available_id']);
            $deleteQuery->execute();
        }

        // Step 3: Insert the booking into the booking table
        $booking_time = date('Y-m-d H:i:s');  // Current time
        $bookingQuery = $con->prepare(
            "INSERT INTO booking (User_id, Guest_name, Guest_cnic, Checkin, Checkout, Hotel_name, City_name, Total_price, booking_time, room_no) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $bookingQuery->bind_param(
            "issssssiss", $user_id, $guest_name, $guest_cnic, $checkin, $checkout, 
            $hotel_name, $city_name, $total_price, $booking_time, $room_no
        );
        $bookingQuery->execute();

        // Retrieve the newly inserted booking ID
        $booking_id = $con->insert_id;

        $booking_slip=$con->prepare('select* from booking where Booking_id=? AND booking_time=? ');
        $booking_slip->bind_param('is',$booking_id,$booking_time);
        $booking_slip->execute();
        $result=$booking_slip->get_result();
        if($result->num_rows>0){
            $row=$result->fetch_assoc();

        }


    } else {
        die("<h2>No Available Rooms</h2>");
    }
} else {
    die("<h2>User Not Registered
    
    <script> 
    </script>
    </h2>");
}

$con->close(); // Close the connection
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .transaction_body {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .transaction_details {
            margin-bottom: 20px;
        }

        .detail {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            font-size: 18px;
        }

        .detail span {
            font-weight: bold;
        }

        .printing {
            text-align: center;
            margin-top: 30px;
            font-size: 16px;
            color: #666;
        }

        .printing button ,a{
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration:none;
        }

        .printing button,a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="transaction_body">
    <h1>Transaction Slip</h1>

    <div class="transaction_details">
        <div class="detail">
            <span>Booking ID:</span>
            <span><?php echo $row['Booking_id']; ?></span>
        </div>
        <div class="detail">
            <span>Guest Name:</span>
            <span><?php echo $row['Guest_name']; ?></span>
        </div>
        <div class="detail">
            <span>Guest CNIC:</span>
            <span><?php echo $row['Guest_cnic']; ?></span>
        </div>
        
        <div class="detail">
            <span>Check-in:</span>
            <span><?php echo $row['Checkin']; ?></span>
        </div>
        <div class="detail">
            <span>Check-out:</span>
            <span><?php echo $row['Checkout']; ?></span>
        </div>
        <div class="detail">
            <span>Hotel Name:</span>
            <span><?php echo $row['Hotel_name']; ?></span>
        </div>
        <div class="detail">
            <span>City Name:</span>
            <span><?php echo $row['City_name']; ?></span>
        </div>
        <div class="detail">
            <span>Room No:</span>
            <span><?php echo $row['room_no']; ?></span>
        </div>
        <div class="detail">
            <span>Total Price:</span>
            <span>Rs. <?php echo number_format($row['Total_price'], 2); ?></span>
        </div>
        <div class="detail">
            <span>Booking Time:</span>
            <span><?php echo $row['booking_time']; ?></span>
        </div>
    </div>

    <div class="printing">
        <button onclick="window.print()">Print Slip</button>
      
    <a href="homepage.php" >Go to Home page</a>
    </div>
</div>

</body>
</html>
