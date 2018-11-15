function LogInSubmit(){
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			alert(this.responseText);
		}	
	};

	xmlhttp.open("GET", "../php/login.php", true);
	xmlhttp.send();
	
}	
