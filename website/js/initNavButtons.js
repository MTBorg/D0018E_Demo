function initNavButtons(){
	xmlhttp = new XMLHttpRequest();	
	
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
            if(this.responseText == true){ //If logged in
                console.log(this.responseText);
                document.getElementById("signUpMain").style.display = "none";
                document.getElementById("logInMain").style.display = "none";
			}else if(this.responseText == false){ //If logged out
				document.getElementById("logOutMain").style.display = "none";
			}
		}	
	};

	
	xmlhttp.open("POST", "../php/initNavButtons.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}	