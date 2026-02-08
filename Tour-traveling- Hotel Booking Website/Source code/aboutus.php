<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>About us</title>
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
     <style>
       *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        
            
        }

        .wrap{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bg-colours{
            width: 100%;
            min-height: 100vh;
            display: flex;
        }

        .bg1{
            flex: 1;
            background-color: black;
        }

        .bg2{
            flex: 1;
            background-color:orange;
        }

        .about-container{
            width: 85%;
            min-height: 80vh;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 1.5rem;
            border-radius: 5px;
            box-shadow: 5px 5px 10px #000000

        }

        .img-container{
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .img-container img{
            width: 500px;
            height: 500px;
            border: 2px solid white;
            object-fit: cover;
            border-radius: 5px;
        }

        .text-container{
            flex: 1;
            border: 2px solid white;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
        }

        .text-container h1{
            font-size: 3.12rem;
            padding: 10px 0px;
        }

        .text-container p{
            font-size: 1.2rem;
            padding: 10px 0px;
        }

        .a{
            text-decoration: none;
        }

        #Testimonials{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            background-color: rgb(254, 255, 207);
        }

        .Testimonials-heading{
            letter-spacing: 1px;
            margin: 30px 0px;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; 
        }

        .Testimonials-heading h1{
            font-size: 2.2rem;
            font-weight: 500;
            background-color: #202020;
            color: white;
            padding: 10px 20px;
        }

        .Testimonials-heading span{
            font-size: 1.3rem;
            color: #252525;
            margin-bottom: 0.6rem;
            letter-spacing: 0.2rem;
            text-transform: uppercase;
        }

        .Testimonials-box-container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }

        .Testimonials-box{
            width: 500px;
            box-shadow: 1px 1px 20px rgba(0,0,0,1);
            background-color: white;
            padding: 1.5rem;
            margin: 1rem;
            cursor: pointer;
        }

        .Profile-img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .Profile-img img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .Profile{
            display: flex;
            align-items: center;
        }

        .name-user{
            display: flex;
            flex-direction: column;
        }

        .name-user strong{
            color: #3d3d3d;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .name-user span{
            color: #979797;
            font-size: 0.8rem;
        }

        .reviews{
            color: #f9d71c;
        }

        .Box-top{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .client-review p{
            font-size: 0.9rem;
            color: #4b4b4b;
        }

        .Testimonials-box:hover{
            transform: translateY(-10px);
            transition: all ease 0.3s;
        }

        @media(max-width:1060px)
        {
            .Testimonials-box{
                width: 45%;
                padding: 0.7rem;
            }
        }

        @media(max-width:790px)
        {
            .Testimonials-box{
                width: 100%
            }

            .Testimonials-heading h1{
                font-size: 1.4rem;
            }
        }

        @media(max-width:340px)
        {
            .Box-top{
            flex-wrap: wrap;
            margin-bottom: 10px;
            }

            .reviews{
            margin-top: 10px;
            }
        }

        ::selection{
            color: #ffffff;
            background-color: #252525;

        }

        @media screen and (max-width:1600px)
        {
            .about-container{
                width: 90%;
            }

            .img-container img{
                width: 350px;
                height: 350px;
            }

            .text-container h1{
                font-size: 3.12rem;

            }
        }

        @media screen and (max-width:1100px)
        {
            .img-container img{
                width: 300px;
                height: 300px;
            }

            .about-container{
                flex-direction: column;
            }

            .text-container {
                align-items: center;
            }
        }

        @media screen and (max-width:550px)
        {
           .img-container img{
            width: 260px;
            height: 260px;
           }

           .text-container p{
            font-size: 1.5rem;
           }
        }
        #FAQS{
            background-color: rgb(254, 255, 207);   height:100vh;
            padding:100px;
            display:flex;
            align-items: center;
            justify-content: center;
        }

        .faq-box{
            width: 70%;
         
           
            background: #fff;
            border-radius: 7px;
            box-shadow: 1px 2px 4px rgba(0,0,0,0.3);
       
        }

        .faq-box h1{
            background-color: rgb(215,223,239);
            border-radius: 7px 7px 0px 0px;
            padding: 20px;
            color: #345688;
            text-align: center;
            font-weight: 700PX;
            font-size: 40px;
        }

        .Faqs{
            padding: 0px 20px 20px;
        
        }

        details{
            background-color: #f6f6f6;
            padding: 10px 20px;
            border-radius: 7px;
            margin-top: 20px;
            font-size: 14px;
            cursor: pointer;
        }

        details summary{
            outline: none;
            font-size: 20px;
            padding: 8px;
            color: rgb(34,33,35);
            font-weight: 600;
        }

        details p{
            font-size: 12px;
            line-height: 24px;
            color: #888;
            padding: 8px;
        }

        @media(max-width: 768px){
            .faq-box{
                width: 90%;
                
                margin: 100px auto;
                background: #fff;
                border-radius: 7px;
                box-shadow: 1px 2px 4px rgba(0,0,0,0.3);
            }

            details summary{
            outline: none;
            font-size: 12px;
            padding: 8px;
            color: rgb(34,33,35);
            font-weight: 600;
        }
        }

        .footer-container{
            max-width: 1170px; 
            margin: auto;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }

        ul{
            list-style: none;
        }

        .footer{
            background-color: #24262b;
             padding: 70px 0; 
        }
        .footer h1{
         font-size:3rem;
             color:orange; 
             text-align:center;
             padding-bottom:3rem;
        }

        .footer-col{
            width: 25%;
            padding: 0 0.8rem;
        }

        .footer-col h4{
            font-size: 1.2rem;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 2rem;;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before{
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #e91e63;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child){
            margin-bottom: 10px;
        }

        .footer-col ul li a{
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover{
            color: #ffffff;
            padding-left: 8px;

        }

        .footer-col .social-links a{
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255,255,255,0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }

        .footer-col .social-links a:hover{
            color: #24262b;
            background-color: #ffffff;
        }

        @media(max-width:767px){
            .footer-col{
                width: 50%;
                margin-bottom: 30px;

            }
        }

        @media(max-width:574px){
            .footer-col{
                width: 100%
                
            }
        }
        @media(max-width:574px){
        .img-container img{
                width: 170px;;
                height: 170px;
            }
        }

</style>
</head>
<body>
    <div class="wrap" id="aboutus">
        <div class="bg-colours">
            <div class="bg1"></div>
            <div class="bg2"></div>
        </div>

        <div class="about-container">
            <div class="img-container">
                <img src="images/travel.png" alt="">
            </div>
            <div class="text-container" >
                <h1>About Us</h1>
                <p>Welcome to Tour Insights, your ultimate companion for finding 
                    and booking the perfect accommodations around the world.
                    We understand that planning a trip can be both exciting and overwhelming, 
                    especially when it comes to choosing the right place to stay. 
                    That’s why we’ve made it our mission to simplify the process. 
                    Our platform allows you to explore beautiful destinations, discover a variety 
                    of hotels and resorts, and book your stay with just a few clicks. 
                    Whether you’re looking for a luxury getaway, a cozy budget-friendly stay,
                    or anything in between, we’ve got options to suit every traveler's needs.
                    At the heart of what we do is a passion for helping you create 
                    unforgettable travel experiences, making your journey as smooth and 
                    enjoyable as possible. So, pack your bags, and let us handle the rest!
                </p>
            </div>
        </div>
     </div>
<!-- =================================================================================================
Review Section -->

<section id="Testimonials">

    
    <div class="Testimonials-heading" >
        <span>Reviews</span>
        <h1>Clients Says</h1>
    </div>

    <div class="Testimonials-box-container">

        <div class="Testimonials-box">

            <div class="Box-top">

                <div class="Profile">

                    <div class="Profile-img">
                        <img src="images/c-1.jpg" alt="">
                    </div>

                    <div class="name-user">
                        <strong>Chris</strong>
                        <span>@Chrisweb</span>
                    </div>
                </div>

                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
               
            </div>

            <div class="client-review">
                <p>This website made planning my vacation so much easier! 
                    I found the perfect hotel in minutes, and the booking process was seamless. 
                    Highly recommend to anyone looking for stress-free travel planning!</p>
            </div>
        </div>

        <div class="Testimonials-box">

            <div class="Box-top">

                <div class="Profile">

                    <div class="Profile-img">
                        <img src="images/c-2.jpg" alt="">
                    </div>

                    <div class="name-user">
                        <strong>Darla</strong>
                        <span>@Darlaweb1</span>
                    </div>
                </div>

                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
               
            </div>

            <div class="client-review" >
                <p>I’m impressed with how smoothly everything worked. 
                    The website offers a wide range of options, and the prices were better than 
                    other booking sites I’ve used. I’ll be back for my next vacation!</p>
            </div>
        </div>

        <div class="Testimonials-box">

            <div class="Box-top">

                <div class="Profile">

                    <div class="Profile-img">
                        <img src="images/c-3.jpg" alt="">
                    </div>

                    <div class="name-user">
                        <strong>Oliver</strong>
                        <span>@Oliver123</span>
                    </div>
                </div>

                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
               
            </div>

            <div class="client-review">
                <p>A must-visit website for travelers! 
                    I found the perfect place to stay for my honeymoon, 
                    and the whole experience was smooth from start to finish. 
                    The pictures and descriptions are spot on, 
                    and the whole process is hassle-free.</p>
            </div>
        </div>

        <div class="Testimonials-box">

            <div class="Box-top">

                <div class="Profile">

                    <div class="Profile-img">
                        <img src="images/c-4.jpg" alt="">
                    </div>

                    <div class="name-user">
                        <strong>Michelle</strong>
                        <span>@Michelle98</span>
                    </div>
                </div>

                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
               
            </div>

            <div class="client-review">
                <p>oved using this site for my travel plans! 
                    The hotel options were great, and I had my booking done in no time. 
                    It’s my new go-to for all my travel needs! 
                    Highly recommend to anyone looking for stress-free travel planning!</p>
            </div>
        </div>

    </div>
</section>
<!-- =================================================================================================
FAQ Section -->

<section id=FAQS>
    <div class="faq-box" >
        <h1>Frequently Asked Questions (FAQ's)</h1>
        <div class="Faqs">
            <details>
                <summary>Can I book a hotel without creating an account?</summary>
                <p>To ensure a smooth booking process and keep track of your 
                    reservations, you’ll need to create an account before making a booking.
                    This also allows us to provide better customer support for 
                    any questions or changes to your reservations.</p>
            </details>

            <details>
                <summary>How do I find hotels that fit my budget?</summary>
                <p>You can easily filter hotels based on your budget after 
                    selecting a city. Use the filter options on the hotel 
                    listing page to set your preferred price range, and we’ll show 
                    you the best options within your budget.
                </p>
            </details>

            <details>
                <summary>Are there any hidden fees when booking a hotel?</summary>
                <p>No, there are no hidden fees. 
                    The price you see during the booking process is 
                    the price you pay. Any applicable taxes or fees 
                    will be clearly displayed before you complete your booking.
                </p>
            </details>

            <details>
                <summary>How do I know if the hotel has the amenities I’m looking for?</summary>
                <p>When you view the details of a hotel, you’ll find a 
                    complete list of available amenities, including Wi-Fi, 
                    parking, breakfast, and more. This helps you choose the perfect 
                    place that meets your needs.
                </p>
            </details>
        </div>
    </div>
</section>

<!-- =================================================================================================
Contact us Section -->

<footer class="footer" id=contactus>

    <div class="footer-container">
    <div class =contact_head>
                <h1>Contact Us</h1>
            </div>
        <div class="row">
            
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="#aboutus">About Us</a></li>
                    <li><a href="#">Our Reviews</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="#FAQS">FAQs</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Contact no</h4>
                <ul>
                    <li><a href="#">+92-XXXXXXXXXX</a></li>
                    <li><a href="#">XYZ@gmail.com</a></li>
                </ul>
            </div>
            
            <!-- <div class="footer-col">
                <h4></h4>
                <ul>
                    <li><a href="#"></a></li>
                </ul>
            </div> -->

            <div class="footer-col">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>

                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>