<?php
// Data from hotel_desc.php, filled automatically after filtering
$hotel_id = urldecode($_GET['hotel_id']);
$hotel_name =urldecode( $_GET['hotel_name']);
$city_name = $_GET['city_name'];
$price = $_GET['price'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Stay</title>
    <style>
        /* Global Reset and Styling */
        body,
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            width: 100%;
            height: 100%;
        }

        /* Center the booking form */
        .booknow_body {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.7)), url('images/bacground.jpg') no-repeat center center/cover;
        }

        /* Booking form container */
        .book_form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 500px;
            max-width: 90%;
        }

        .book_form h1 {
            text-align: center;
            color: orange;
            margin-bottom: 30px;
            font-size: 3rem;
            font-weight: bold;
            font-style: italic;
            font-family: 'Times New Roman', Times, serif;
        }

        .book_form label {
            display: block;
            margin: 10px 0 5px;
            color: #495057;
            font-weight: 600;
        }

        .book_form input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:disabled,
        input[type="date"]:disabled,
        input[type="number"]:disabled {
            background-color: #e9ecef;
        }

        .book_form button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .book_form table td {
            padding: 0.4rem 1rem;

        }

        .book_form button:hover {
            background-color: #218838;
        }

        .message {
            color: red;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 600px) {
            .book_form {
                width: 95%;
            }

            .book_form h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="booknow_body">
        
        <div class="book_form">
            <h1>Book Your Stay</h1>

            <form action="book_data.php" method="POST" onsubmit="return validateForm()">
                <table>
                    <tr>
                        <td><label for="city_name">City Name:</label>
                            <input type="text" id="city_name" name=city_name value='<?php echo $city_name; ?>' readonly required>
                        </td>
                        <td>
                       
                            <label for="hotel_name">Hotel Name:</label>
                            <input type="text" id="hotel_name" name="hotel_name" value="<?php echo $hotel_name; ?>" readonly required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <label for="check_in">Check-in Date:</label>
                            <input type="date" id="check_in" name="checkin" value="<?php echo $checkin; ?>" readonly required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=2>
                            <label for="check_out">Check-out Date:</label>
                            <input type="date" id="check_out" name="checkout" value="<?php echo $checkout; ?>" readonly required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=2>
                            <label for="name">Guest Name:</label>
                            <input type="text" id="name" name="Guest_name" placeholder="Enter Guest Name" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=2>
                            <label for="cnic_guest">Guest CNIC:</label>
                            <input type="text" id="cnic_guest" name="cnic_guest" placeholder="XXXXX-XXXXXXX-X"
                                pattern="\d{5}-\d{7}-\d" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=2>
                            <label for="user_cnic">User CNIC:</label>
                            <input type="text" id="user_cnic" name="user_cnic" placeholder="XXXXX-XXXXXXX-X"
                                pattern="\d{5}-\d{7}-\d" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="price">Price Per Night:</label>
                            <input type="number" id="price" name=price value="<?php echo $price; ?>" readonly required>
                        </td>

                        <td>
                            <label for="totalprice">Total Price:</label>
                            <input type="number" id="totalprice" name="totalprice"
                                value="<?php echo '<script> calculateTotalPrice();</script>'?>" readonly required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=2>
                            <button type="submit" >Confirm Booking</button>
                    </tr>
                    </td>
                    <div class="message" id="message"></div>
                </table>
            </form>
        </div>
    </div>

    <script>
        const checkInInput = document.getElementById('check_in');
        const checkOutInput = document.getElementById('check_out');
        const priceInput = document.getElementById('price');
        const totalPriceInput = document.getElementById('totalprice');
        const message = document.getElementById('message');



        function calculateTotalPrice() {
            const checkInDate = new Date(checkInInput.value);
            const checkOutDate = new Date(checkOutInput.value);
            const pricePerNight = parseFloat(priceInput.value);

            message.textContent = ""; // Clear previous error messages

            if (checkOutDate <= checkInDate) {
                message.textContent = "Check-out date must be after check-in date.";
                totalPriceInput.value = "";
                return;
            }

            const nights = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24);
            const totalPrice = nights * pricePerNight;
            totalPriceInput.value = totalPrice;
        }

        addEventListener('load', calculateTotalPrice);

        function validateForm() {
            if (message.textContent !== "") {
                return false;
            }
            return true;
        }


    </script>
</body>

</html>