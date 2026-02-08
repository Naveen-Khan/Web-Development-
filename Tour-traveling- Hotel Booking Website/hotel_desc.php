<?php
$hotel_id = intval($_GET['hotel_id']);
$Check =( $_GET['check']);      // used to indicate case 1 or 2
$checkin=($_GET['checkin']);
$checkout=($_GET['checkout']);




function display_data($row) {
    global $Check;
    global $hotel_id;
    global $hotel_name;
    global $city_name;
    global $checkin;
    global $checkout;
  

    echo "<div class='h_img_container'>
    <img class='hotel_images' src='" . ($row['hotel_image']) . "' alt='Hotel Image Not Found'>
    <h1>Adventure awaits you!!</h1>
  </div>
  <div class='h_content_text'>
    <h1>" . ($row['city_name']) . "</h1>
    <h3>Hotel Name: " . ($row['hotel_name']) . "</h3>
    <h3>Address: " . ($row['address']) . "</h3>
    <h3>Price Per Night: " . ($row['price_per_night']) . " PKR</h3>
    <h3>Description:</h3> <h4><pre>" . ($row['description']) . "</pre></h4>";
    
    if( $Check === 't'){
        echo "<h3>Available Room:</h3> <h4>" . intval($_GET['available_room']) . "</h4>";
    }
  
    
    echo "<h3>Rating:</h3><div class='star'>
    <ion-icon name='star'></ion-icon>
    <ion-icon name='star'></ion-icon>
    <ion-icon name='star'></ion-icon>
    <ion-icon name='star'></ion-icon>
    <ion-icon name='star'></ion-icon>
</div></h3>";

echo "<a href='book_now.php?" . http_build_query([
    'hotel_id' => $hotel_id,
    'hotel_name' => urlencode(($row['hotel_name']) ),
    'city_name' => urlencode(($row['city_name'])),
    'price' => ($row['price_per_night']),
    'checkin' => $checkin,
    'checkout' => $checkout]) . "' class='booknow'>Book Now</a>
  </div>";




  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Description</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        .hotel_desc_body {
            width: 100%;
            height: fit-content;
            background-color: #ffe0e0;
            /* Light pink */
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 80%;
            /* Adjust width for consistency */
            max-width: 1200px;
            background-color: whitesmoke;
            border: 1px solid gray;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 1rem;
            overflow: hidden;
        }

        .h_img_container {
            background-color: white;
            border: 1px solid gray;
            border-radius: 0.3rem;
            width: 100%;
            height: 55vh;
            position: relative;
            overflow: hidden;
        }

        .h_img_container img {
            width: 100%;
            /* Ensures full width */
            height: 100%;
            /* Ensures full height */
            object-fit: cover;
            /* Prevents image distortion */
        }

        .h_img_container h1 {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            /* Transparent background */
            padding: 0.5rem 1rem;
            font-size: 2.5rem;
            font-style: italic;
        }

        .h_content_text>* {
            font-size: 1.7rem;
            margin: 2rem;
            color: gray;

        }

        .h_content_text h1 {
            color: orange;
            margin-bottom: 1rem;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 2.5rem;
        }

        .star {
            display: flex;
            justify-content: start;
            gap: 0.5rem;
            margin: 0.5rem 0;
            padding-left: 2rem;
        }

        .star ion-icon {
            font-size: 2rem;
            color: rgb(255, 233, 35);
        }



        .booknow {
            background-color: rgb(153, 218, 56);
            color: white;
            width: 10rem;
            font-size: 1.6rem;
            text-align: center;
            box-shadow: 0.1rem 0.1rem 0.3rem 0.1rem gray;
            border-radius: 0.3rem;
            font-weight: bold;
            padding: 0.5rem;
            cursor: pointer;
            float: right;
        }

        .h_content_text h4 {
            margin: 1.2rem 2rem;
            line-height: 2;
            padding-left: 2rem;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                /* Adjust container width for smaller screens */
            }

            .h_img_container {
                height: 40vh;
                /* Adjust height */
            }

            .h_img_container h1 {
                font-size: 1.8rem;
                /* Adjust font size */
            }

            .booknow {
                width: 100%;
                /* Full width on mobile */
                float: none;
                /* Reset float */
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="hotel_desc_body">
        <div class="container">
            <?php
$hotel_id = intval($_GET['hotel_id']);



// Establish database connection
$con = new mysqli("localhost", "root", "", "we_project");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Prepare the SQL statement
$query = $con->prepare('SELECT h.hotel_name, h.address, h.city_name, h.description, h.price_per_night, h.hotel_image FROM hotels h WHERE h.hotel_id = ?');

$query->bind_param('i', $hotel_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        display_data($row);
    }
} else {
    echo "<h3>No data found</h3>";
}

// Close the statement and connection
$query->close();
$con->close();
?>
        </div>
    </div>
</body>


<!-- Icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>