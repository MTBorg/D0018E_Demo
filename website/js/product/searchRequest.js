function searchRequest() {
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText) {
                console.log(this.responseText);
                //window.location.replace("../php/searchPage.php");
                //return this.responseText;
                document.getElementById("search").innerHTML = this.responseText;
                
			}else{
				console.log("xxx");
			}
		}
    };

    input = document.getElementsByTagName("input");
    var search = input[0].value;

    console.log(search);

	xmlhttp.open("POST", "../php/searchProduct.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("search=" + search);
}