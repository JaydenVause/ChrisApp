let hamburger_button = document.getElementById("hamburger_button");
let mobile_menu = document.getElementById("mobile_menu");
let fade_screen = document.getElementById("fade_screen");
let close_button = document.getElementById("close_button");


function toggleMenu(){
    if(mobile_menu.classList.contains("mobile_menu--hidden")){
        mobile_menu.classList.add('mobile_menu--visible');
        
        mobile_menu.classList.remove('mobile_menu--hidden');
    }else{
        mobile_menu.classList.add('mobile_menu--hidden');
        
        mobile_menu.classList.remove('mobile_menu--visible');
        
    }

    if(fade_screen.classList.contains('fade_screen--hidden')){
        fade_screen.classList.remove('fade_screen--hidden');
        fade_screen.classList.add('fade_screen--visible');
    }else{
        fade_screen.classList.add('fade_screen--hidden');
        fade_screen.classList.remove('fade_screen--visible');
    }
}

let a_links = document.querySelectorAll(".li__a--mobile");

a_links.forEach(element => {
    element.addEventListener('click', ()=>{
        toggleMenu();
    });
});



function open_mobile_menu(){
    toggleMenu();
    
}

function close_mobile_menu(){
   
    mobile_menu.classList.remove('mobile_menu');
   
    
}

hamburger_button.addEventListener('click', ()=>{
    toggleMenu();
})

fade_screen.addEventListener('click', ()=>{
    toggleMenu();
})
close_button.addEventListener('click', ()=>{
    toggleMenu();
})
