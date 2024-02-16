let title = document.getElementById("title");
let signinBtn = document.getElementById("signupBtn");
let Password = document.getElementById("Password")
let emailField= document.getElementById("emailField");


signinBtn.onclick = function(){
	emailField.style.maxHeight = "60px";
	Password.style.maxHeight = "60px";
	title.innerHTML = "EverydayChef";
}