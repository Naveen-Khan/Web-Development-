<?php
// Initialize variables to store error or success messages
$error = "";
$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Cnic = $_POST['cnic'];
    $Password = $_POST['password'];
    $Phone = $_POST['phone'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "we_project");

    if ($con->connect_error) {
        $error = "Failed to connect to the database: " . $con->connect_error;
    } else {
        // Check if the user already exists based on email or CNIC
        $checkStmt = $con->prepare("SELECT * FROM registration WHERE Email = ? OR Cnic = ?");
        if ($checkStmt) {
            $checkStmt->bind_param("ss", $Email, $Cnic);
            $checkStmt->execute();
            $result = $checkStmt->get_result();

            if ($result->num_rows > 0) {
                $error = "User with this Email or CNIC already exists!";
            } else {
                // Proceed with the registration
                $stmt = $con->prepare("INSERT INTO registration (Name, Email, Cnic, `Password`, Phone) VALUES (?, ?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ssssi", $Name, $Email, $Cnic, $Password, $Phone);

                    if ($stmt->execute()) {
                        $success = "Registration successful!";
                        header("location: login.php");
                    } else {
                        $error = "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $error = "Error preparing statement: " . $con->error;
                }
            }
            $checkStmt->close();
        } else {
            $error = "Error preparing select statement: " . $con->error;
        }
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        #register_body {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("images/bacground.jpg");
            background-size: cover;
            background-position: center;
        }

        .container {
            border: 0.16rem solid black;
            border-radius: 1.3rem;
            background-color: aliceblue;
            box-shadow: 0.2rem 0.2rem 10rem   black;
            width: 22rem;
            padding: 1rem;
        }

        h1 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            text-shadow: 0.0625rem 0.0625rem gray;
        }

        form {
            justify-content: space-around;
        }

        input {
            width: 90%;
            height: 1.7rem;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border-radius: 0.3rem;
            border: 1px solid #ccc;
    
        }

        input[type="submit"] {
            background-color: orange;
            border-radius: 0.8rem;
            width: 100%;
            height: 3rem;
            color: white;
            font-weight: bolder;
            font-size: 1rem;
            box-shadow: 0.2rem 0.2rem 0.1rem gray;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkorange;
        }

        label {
            font-size: 1.3rem;
        }

        .message {
            margin-top: 10px;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 500px) {
            .container {
                width: 80%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div id="register_body">
        <div class="container">
            <h1>Registration</h1>

            <!-- Display error or success message -->
            <?php if ($error): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="message success"><?php echo $success; ?></div>
            <?php endif; ?>

            <form class="register_form" action="" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>

                <label for="cnic">Cnic</label>
                <input type="text" id="cnic" name="cnic" placeholder="Enter your CNIC" 
                       pattern="\d{5}-\d{7}-\d" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" 
                       placeholder="Enter Your Password" 
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                       title="Must contain at least one number, one uppercase, and one lowercase letter, and be at least 6 characters long" 
                       required>

                <label for="phone">Phone No</label>
                <input type="tel" id="phone" name="phone" 
                       placeholder="Your Phone Number" 
                       pattern="\d{11}" 
                       title="Must be 11 digits" required>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>
</html>
