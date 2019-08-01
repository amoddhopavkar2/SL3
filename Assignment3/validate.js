function validateForm(){
	var name1 = document.getElementById("fname").value;
	var name2 = document.getElementById("lname").value;
	var pswd1 = document.getElementById("pswd1").value;
	var pswd2 = document.getElementById("pswd2").value;
	var gen = document.getElementById("gender").value;
	var terms = document.getElementById("terms").value;
	var phno = document.getElementById("phno").value;

	var alpha = /^[A-Za-z]/;
	var num = /^\d{10}$/;

	if(name1.match(alpha))
		return true;
	
	else{
		alert("First name must contain only letters");
	}

	if(name2.match(alpha))
		return true;
	
	else{
		alert("Last name must contain only letters");
	}

	if(phno.match(num))
		return true;
	else{
		alert("Enter a valid phone number");
	}

	if(terms.checked)
		return true;
	else{
		alert("Accept the terms & conditions");
	}

	for(var i=0;i<3;i++){
		if(gen[i].checked)
			return true;
		else{
			alert("Select any one gender");
			return false;
		}
	}

	if(pswd1 == pswd2)
		return true;

	else{
		alert("Passwords do not match");
		return false;
	}
}