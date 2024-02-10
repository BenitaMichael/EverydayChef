let signinBtn= document.getElementById("signinBtn");
let title = document.getElementById("title");
let Password = document.getElementById("Password");
let emailField= document.getElementById("emailField");


signinBtn.onclick = function(){
	emailField.style.maxHeight = "60px";
	Password.style.maxHeight = "60px";
	title.innerHTML = "EverydayChef";
}
  
  addEventListener('click', function() {
    alert('Successful!');
    window.location.href = 'search.html';
  }
  );