let title = document.getElementById("title");
let nameField_First = document.getElementById("nameField_First");
let nameField_Last = document.getElementById("nameField_Last");
let nameField_Middle = document.getElementById("nameField_Middle");
let signupBtn = document.getElementById("signupBtn");
let signinBtn= document.getElementById("signinBtn");
let password2Field= document.getElementById("password2Field");
let emailField= document.getElementById("emailField");



signinBtn.onclick = function(){
	nameField_First.style.maxHeight = "0";
	nameField_Last.style.maxHeight = "0";
	nameField_Middle.style.maxHeight = "0";
	emailField.style.maxHeight = "0";
	password2Field.style.maxHeight = "0";
	title.innerHTML = "EverydayChef";
	signupBtn.classList.add("disable");
	signinBtn.classList.remove("disable");
}


signupBtn.onclick = function(){
	nameField_First.style.maxHeight = "60px";
	nameField_Last.style.maxHeight = "60px";
	nameField_Middle.style.maxHeight = "60px";
	emailField.style.maxHeight = "60px";
	password2Field.style.maxHeight = "60px";
	title.innerHTML = "EverydayChef";
	signupBtn.classList.remove("disable");
	signinBtn.classList.add("disable");
}