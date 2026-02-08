<?php
// Initialize variables for error/success messages
$error = "";
$success = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $Cnic = $_POST['cnic'];
    $Password = $_POST['password'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "we_project");

    // Check the connection
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    } else {
        // Prepare the statement to fetch the user by CNIC
        $stmt = $con->prepare("SELECT * FROM registration WHERE cnic = ?");
        $stmt->bind_param("s", $Cnic);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        // Check if a user with the given CNIC exists
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            // Verify the password
            if ($data['Password'] === $Password) {
                $success = "Login successful!";
                // Redirect to homepage.php after a successful login
                header("Location: homepage.php");
                exit; // Stop script execution after redirect
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "Invalid CNIC or password.";
        }
        $stmt->close();
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

#register_body ,#login_body{
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
    font-size: 1.4rem;
    box-shadow: 0.2rem 0.2rem 0.1rem gray;
    cursor: pointer;

}

input[type="submit"]:hover {
    background-color: darkorange;
}

label {
    font-size: 1.5rem;
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
    <div id="login_body">
        <div class="container">
            <h1>Login</h1>

            <!-- Display error or success message -->
            <?php if ($error): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="message success"><?php echo $success; ?></div>
            <?php endif; ?>

            <form class="login_form" action="" method="post">
                <label for="cnic">CNIC</label>
                <input type="text" id="cnic" placeholder="Enter your CNIC" name="cnic" pattern="\d{5}-\d{7}-\d" required>

                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter Your Password" name="password"
                       title="Must be at least 6 characters and include one number, one uppercase letter, and one lowercase letter"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

                <input type="submit" value="Login">
            </form>
            <br>

            <center>
                <h3>Do you want to <a href="register.php" class="link">Sign Up?</a></h3>
            </center>
        </div>
    </div>
</body>

</html>
