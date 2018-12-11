function checkoutSubmit(){
    xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == true) {
                alert("Order is on the way!");
				window.location.reload();
			}else{
				alert(this.responseText);
				window.location.reload();
			}
		}
    };

	xmlhttp.open("POST", "/php/cart/checkout.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();
}