<?php

// Establish connection
$con = new mysqli("localhost", "root", "", "we_project");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// FOR SUCCESSFUL CONNECTION
else {
    // Prepare the statement
    $stmt = $con->prepare('SELECT city_id, city_name, contry, description, city_image FROM city;');

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        // Include the CSS file in the HTML head section
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Cities</title>
               <link rel='stylesheet' href='home.css'> 
        </head>
        <body>";

        // Loop through the results
        while ($row = $result->fetch_assoc()) {
            echo "<div class='cards'>";
            echo "<img class='cardes_img' src='" . htmlspecialchars($row['city_image']) . "' alt='" . htmlspecialchars($row['city_name']) . "'>";
            echo "<div class='cards_text'>";
            echo "<h1>" . htmlspecialchars($row['city_name']) . "</h1>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<a href='hotel_list.php?city_id=".($row['city_id'])."&city_name=".($row['city_name'])."' class='card_button'>Veiw Hotels</a>";
            echo "</div>";
            echo "</div>";
        }

    

        // Close the body and html tags
        echo "</body></html>";
    } else {
        echo "No cities found.";
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>