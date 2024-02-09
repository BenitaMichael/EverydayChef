let title = document.getElementById("title");
let signinBtn= document.getElementById("signinBtn");
let emailField= document.getElementById("emailField");
let Password = document.getElementById("Password")



signinBtn.onclick = function(){
	emailField.style.maxHeight = "0";
	Password.style.maxHeight = "0";
	title.innerHTML = "EverydayChef";
}
  
  addEventListener('click', function() {
    alert('Sign In Successful!');
    window.location.href = 'search.html';
  }
  );