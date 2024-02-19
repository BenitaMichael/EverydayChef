// Get references to various elements in the document
let title = document.getElementById("title");
let signinBtn = document.getElementById("signupBtn");
let Password = document.getElementById("Password")
let emailField= document.getElementById("emailField");


// Function triggered when signup button is clicked
signinBtn.onclick = function(){
	// Adjust the maximum height of various input fields to reveal them
	emailField.style.maxHeight = "60px";
	Password.style.maxHeight = "60px";
	// Update the title of the form
	title.innerHTML = "EverydayChef";
}