

const contactForm = document.getElementById('contactForm');
const email = document.getElementById('email');
const submit = document.getElementById('submit');

email.addEventListener('keyup', function(event)){
	isValidEmail = email.checkValidity();

	if (isValidEmail)
	{
		submit.disabled = false;
	}
	else{
		submit.disabled = true;
	}
});

submit.addEventListener('click', function(event)){
	contactForm.submit();
});

function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
