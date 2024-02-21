// Get references to various elements in the document
let title = document.getElementById("title");
let nameField_First = document.getElementById("nameField_First");
let nameField_Last = document.getElementById("nameField_Last");
let nameField_Middle = document.getElementById("nameField_Middle");
let signupBtn = document.getElementById("signupBtn");
let Password = document.getElementById("Password")
let password2Field= document.getElementById("password2Field");
let emailField= document.getElementById("emailField");


// Function triggered when signup button is clicked
signupBtn.onclick = function(){
	// Adjust the maximum height of various input fields to reveal them
	nameField_First.style.maxHeight = "60px";
	nameField_Last.style.maxHeight = "60px";
	nameField_Middle.style.maxHeight = "60px";
	emailField.style.maxHeight = "60px";
	Password.style.maxHeight = "60px";
	password2Field.style.maxHeight = "60px";
	// Update the title of the form
	title.innerHTML = "Create account";
}