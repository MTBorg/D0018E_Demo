function LogInSubmit(){
	xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			alert(this.responseText);
		}	
	};

	var inputs = document.getElementsByTagName("input");
	var password;
	var email;
	var i;

	for(i = 0; i < inputs.length; i++){
		if(inputs[i].name == "email"){
			email = inputs[i].value;
		}else if(inputs[i].name == "password"){
			password = inputs[i].value;
		}
	}	
	
	xmlhttp.open("POST", "../php/login.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email=" + email + "&password=" + password);
	
}	
