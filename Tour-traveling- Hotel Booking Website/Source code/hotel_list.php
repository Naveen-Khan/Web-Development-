<?php
//***it is used to display the data of hotels cards before and after filtering based on condition $case==1 
  //****************indicate before filtering card display $case==2 after filtering***********************/
$city_id=$_GET['city_id'];
$city_name=$_GET['city_name'];

function displayHotelCard($row, $case,$Checkin_date=' ' ,$Checkout_date=' ') {
    echo "<div class='hotel_cards'>";
    echo "<img class='cardes_img' src='" . htmlspecialchars($row['hotel_image']) . "' alt='" . htmlspecialchars($row['city_name']) . "'>";
    echo "<div class='h_cards_text'>";
    echo "<h2>" . htmlspecialchars($row['hotel_name']) . "</h2>";
    echo "<h3>Location: " . htmlspecialchars($row['city_name']) . "</h3>";
    echo "<h4>Price Per Night: " . htmlspecialchars($row['price_per_night']) . "</h4>";
    echo "<h4>Rating:</h4><div class='star'>
            <ion-icon name='star'></ion-icon>
            <ion-icon name='star'></ion-icon>
            <ion-icon name='star'></ion-icon>
            <ion-icon name='star'></ion-icon>
            <ion-icon name='star-half'></ion-icon>
          </div>";

 //====1.this statement create button  if user enter button before filtering  
 //that means avalablity not check  then available room not display*/
    if ($case === 2) {
       
        echo "<a href='hotel_desc.php?hotel_id=" . intval($row['hotel_id']) . 
             "&available_room=" . intval($row['available_room']) . 
             "& check=" . 't' . "&checkin=".$Checkin_date."&checkout=".$Checkout_date."' class='card_button'>Veiw Hotels</a>";
    } else {
        echo "<a href='hotel_desc.php?hotel_id=" . intval($row['hotel_id']) . 
             "&check=" . 'f' . "' class='card_button'>Veiw Hotels</a>";
    }
    echo "</div></div>";
}

?>






<!-- ****************************************HTML******************************************** -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>

    <!--  js scripts -->
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
        }

        .hotel_body {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: salmon;
        }

        .h_main_container {
            width: 80%;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.3);
            box-shadow: 0.2rem 0.3rem 0.5rem rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .images {
            width: 100%;
            height: 500px;
            background-image: url("https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/d7/ca/34/rooftop-pool.jpg?w=1200&h=-1&s=1");
            background-position: center;
            background-size: cover;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        .images .logo_images{
            background-image: url('images/logo.png');
    border-radius: 55%;
    width:7rem;
    height:7rem;
    background-position:center;
    background-size:cover;

        }

        .images h1 {
            color: white;
            font-size: 3rem;
            font-family: 'Times New Roman', Times, serif;
            font-style: italic;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            text-decoration:underline orange;
         
        }

        .images h2 {
            color: white;
            font-size: 2rem;
            font-family: 'Times New Roman', Times, serif;
            font-style: italic;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            margin:0.7rem;
         
        }

        .filter {
            width: 80%;
            margin: 2rem auto;
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid gray;
            box-shadow: 0.4rem 0.4rem 0.5rem rgba(0, 0, 0, 0.2);
            margin-bottom: 5rem;
            margin-top: 5rem;
        }

        .filter h1 {
            text-align: center;
            color: orange;
            margin-bottom: 1rem;
            font-style: italic;
        }

        .filter label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .filter input,
        .filter select {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
            font-size: 1rem;
            border: 1px solid rgba(128, 128, 128, 0.5);
            border-radius: 0.3rem;
        }

        .filter input[type="submit"] {
            background-color: orange;
            color: white;
            font-size: 1.5rem;
        }

        .filter input[type="submit"]:hover {
            background: black;
            cursor: pointer;
        }

        .h_card_section {
            width: 80%;
            margin: 2rem auto;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .hotel_cards {
            width: 300px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem;
            box-shadow: 0.3rem 0.3rem 0.5rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: bisque;
            transition: transform 0.3s ease;
        }

        .hotel_cards:hover {
            transform: scale(1.05);
        }

        .cardes_img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .h_cards_text {
            padding: 1rem;
        }

        .h_cards_text h2 {
            margin-bottom: 0.5rem;
            color: orange;
        }

        .star {
            display: flex;
            justify-content: start;
            gap: 0.5rem;
            margin: 0.5rem 0;
        }

        .star ion-icon {
            font-size: 1.5rem;
            color: rgb(255, 233, 35);
        }

        .card_button {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: orange;
            color: white;
            text-decoration: none;
            border-radius: 0.3rem;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .card_button:hover {
            background-color: darkorange;
        }

        .message,
        .error_message {
            color: red;
            font-size: 1.5rem;
            font-style: italic;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="hotel_body">
        <div class="h_main_container">
            <!-- Banner Image Section -->
            <div class="images">
            <div class=logo_images></div>
            <h1> Tour Insights</h1>
                <h2>Enjoy Your Life With Full Of Freedom
                    <ion-icon name="sparkles-outline"></ion-icon>

                </h2>
            </div>

            <!-- Filter Form Section -->
            <div class="filter">
                <form action="" method="post" onsubmit="return date_validation()">
                    <h1>Check Hotel Availability</h1>

                    <label for="location">Destination</label>
                    <select class="select_options" id="location" name="city" required>
                        <option value="">Select-one</option>
                        <option value='Dubai' <?php if($city_name=="Dubai" ) echo 'selected' ;?> >Dubai</option>
                        <option value='Bankok' <?php if($city_name=="Bankok" ) echo 'selected' ;?> > Bangkok</option>
                        <option value='Paris' <?php if($city_name=="Paris" ) echo 'selected' ;?> >Paris</option>
                        <option value='Istambul' <?php if($city_name=="Istambul" )echo 'selected' ;?> >Istambul</option>
                        <option value='Bali' <?php if($city_name=="Bali" )echo 'selected' ;?> >Bali</option>
                    </select>
                    <label for="checkin">Check-In</label>
                    <input type="date" name="checkin_date" id="checkin" required>

                    <label for="checkout">Check-Out</label>
                    <input type="date" name="checkout_date" id="checkout" required>

                    <label for="budget">Budget</label>
                    <select id="budget" name="budget" required>
                        <option value="">Select-one</option>
                        <option>1000</option>
                        <option>2000</option>
                        <option>3000</option>
                        <option>5000</option>
                        <option>6000</option>
                    </select>
                    <input type=submit value="Search">
                </form>
                <div class=error_message></div>
            </div>

            <!-- Hotel Cards Section -->
            <div class="h_card_section">
                <?php
// ========================== Assign values, check for empty inputs =============================
$City = $_POST['city'] ?? '';
$Checkin_date = $_POST['checkin_date'] ?? '';
$Checkout_date = $_POST['checkout_date'] ?? '';
$Budget = $_POST['budget'] ?? '';


// ============================== Establish database connection ================================
$con = new mysqli("localhost", "root", "", "we_project");

// ============================== Check connection ==============================================
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// ============================== Logic to Display Hotels =====================================
if (empty($City) && empty($Checkin_date) && empty($Checkout_date) && empty($Budget)) {
    // If all fields are empty, display all hotels
    $query = $con->prepare('SELECT hotel_id, hotel_name, city_name, description,
     price_per_night, hotel_image FROM hotels 
     where city_id = ?;
    ');
    $query->bind_param('i',$city_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
        displayHotelCard($row,1);                // display cards function
        } 
    
    } else {
        echo "<p>No hotels found.</p>";
    }
    $query->close();
 } 

   else if(!empty($City) && !empty($Checkin_date) && !empty($Checkout_date) && !empty($Budget)) {
   
    // If all fields are filled, filter hotels based on user input
    $query = $con->prepare(' SELECT h.hotel_id,h.hotel_name, h.city_name, h.description, h.price_per_night, h.hotel_image,available_hotels.available_room
        FROM hotels h
        JOIN (
            SELECT r.hotel_id AS a_hotel_id,count(r.room_id)  as available_room
            FROM room r
            JOIN available_room ar 
            ON (ar.hotel_id = r.hotel_id) AND (ar.room_id = r.room_id )
            WHERE ar.staring_date <= ? AND ar.ending_date >= ?
            GROUP BY r.hotel_id
        ) AS available_hotels
        ON h.hotel_id = available_hotels.a_hotel_id
        WHERE h.city_name = ? AND h.price_per_night <= ?
        
    ');
    

    // Check if query preparation failed
    if (!$query) {
        die("Query preparation failed: " . $con->error);
    }
    
    // Bind parameters (dates as strings, budget as integer)
    $query->bind_param('sssi', $Checkin_date, $Checkout_date, $City, $Budget);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            displayHotelCard($row,2,$Checkin_date,$Checkout_date);
        }
    }
     else {
        echo "<p>No hotels found matching your criteria.</p>";
    }
    $query->close();
  } 
  else {
    // If some fields are filled but not all, show a message
    echo "<p>Please fill in all fields to filter results.</p>";
      }

   // Close the connection
    $con->close();


?>
            </div>
        </div>
    </div>

</body>

</html>