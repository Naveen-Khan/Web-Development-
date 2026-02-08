<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="home.css">
    <script src="script.js"></script>

    <style>
         /* Body container */
 /* home page css */
          </style>
</head>

<body>
    <div class="home_body" id=home>
        <!-- =================================================
                               NAVBAR
        ================================================= -->
        <nav class="navbar">
            <!-- Logo Section -->
            <div id="logo">
                <div class=logo_images></div>
               <span> Tour Insights<span>
            </div>

            <!-- Navbar Links -->
            <ul id="nav_links">
                <li><a href="#home">Home</a></li>
                <li><a href="#aboutus">About</a></li>
                <li><a href="#Testimonials">Reveiws</a></li>
                <li><a href="#contactus">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Help</a>
                    <div class="dropdown-content">
                     <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                    </div>
                 </li>
            </ul>

            <!-- Mobile Menu Button -->
            <div id="mobile_navbar_btn" onclick="toggleMenu()">
                <ion-icon class="navbar_icon" name="menu-outline"></ion-icon>
                <ion-icon class="navbar_icon" name="close-outline"></ion-icon>
            </div>
        </nav>

        <!-- =================================================
                               BODY
        ================================================= -->
        <main class="mainSection">
            <video class="video_slide" src="images/1.mp4" autoplay muted loop></video>
            <div class="content">
                <h1 class="heading">Wonderful Island</h1>
                <p class="para">Lorem ipsum expedita ipsum sint tenetur voluptas quae quibusdam beatae iure architecto
                    maiores odio,
                    alias totam explicabo inventore sapiente.
                    .</p>
            </div>
            <!-- Nav buttons 4-->
            <div class="slider_nav">
                <div class="slider_nav_btn" onclick="change(1)"></div>
                <div class="slider_nav_btn" onclick="change(2)"></div>
                <div class="slider_nav_btn" onclick="change(3)"></div>
                <div class="slider_nav_btn" onclick="change(4)"></div>
                <div class="slider_nav_btn" onclick="change(5)"></div>
            </div>
            <!-- =====================destination main  _Section====================== -->

        </main>
        <section class="sec_location">
            <div class="sec_location_text">
            <div class=logo_images></div>
                <h1>Destination</h1>
                <h4>Enjoy beauty of world</h4>
            </div>

            <!-- =====================cards _Section====================== -->

            <div class="cards_section" >
      <?php include 'location.php';?>

            </div>
        </section>

        <?php include 'aboutus.php';
        ?>

    </div>
    <script>


        function toggleMenu() {
            let icon = document.querySelector("#mobile_navbar_btn");
            let ul = document.querySelector("#nav_links");

            ul.classList.toggle("Showdata");
            console.log(ul);
        }

    </script>

    <!-- Ionicons for icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  

</body>

</html>