
// code for drop down menu

function toggleMenu() {
    let icon = document.querySelector("#mobile_navbar_btn");
    let ul = document.querySelector("#nav_links");

    ul.classList.toggle("Showdata");
    console.log(ul);
}

//VIDEO

function change(i) {
    const btns = document.querySelectorAll(".slider_nav_btn");

    btns.forEach((btn) => {
        btn.style.backgroundColor="white";
    });
    
    if (i === 1){
        btns[0].style.backgroundColor = "blue";
        document.querySelector(".video_slide").src = "images/1.mp4";
      
        }
    else if (i === 2){
        btns[1].style.backgroundColor = "blue";
    document.querySelector(".video_slide").src = "images/2.mp4";
    document.querySelector(".heading").innerHTML="Explore World Together";

    }
    else if(i === 3){
        btns[2].style.backgroundColor = "blue";
        document.querySelector(".video_slide").src = "images/3.mp4";
        document.querySelector(".heading").innerHTML="Enjoy Your Life";
      
    }
    else if(i === 4){
        btns[3].style.backgroundColor = "blue";
        document.querySelector(".video_slide").src = "images/4.mp4";
        document.querySelector(".heading").innerHTML="Discover your Independance";
        
    }
    else if( i === 5){
        btns[4].style.backgroundColor = "blue";
        document.querySelector(".video_slide").src = "images/5.mp4";
        document.querySelector(".heading").innerHTML="Adventure Awaits You";
        
    }


}


// script of date validation in hotel list file
function date_validation(){
    const checkin_date = document.getElementById('checkin').value;
    const checkout_date = document.getElementById('checkout').value;
    const error_message = document.querySelector('.error_message');
    error_message.textContent = "";
    checkIn = new Date(checkin_date);
    checkOut = new Date(checkout_date);
    c_date = new Date();

    if(checkIn < c_date){
        error_message.innerHTML = "Check-in date cannot be a past date.";
        return false;
    }
    if(checkOut <= checkIn){
        error_message.innerHTML = "Check-out date must be after the check-in date.";
        return false;
    }
    return true;
} 

    
// icon access 


