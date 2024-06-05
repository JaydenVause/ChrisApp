let hamburger_menu = document.querySelector("#hamburger");
let mobile_menu = document.querySelector("#mobileMenu");
let closeBtn = document.querySelector("#closeMenuBtn");

function toggleVisibleMenu (event){
	if(mobile_menu.style.display == "none"){
		mobile_menu.style.display = "flex";
		mobile_menu.classList.add("opening");
		mobile_menu.classList.remove("closing");
	}else{
		mobile_menu.style.display = "none";
		mobile_menu.classList.add("closing");
		mobile_menu.classList.remove("opening");
	}
}

hamburger_menu.addEventListener("click", toggleVisibleMenu);
closeBtn.addEventListener("click", toggleVisibleMenu);