function shopCartAlterQuantitySubmit($user_id, $product_id, $increase){
    xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.response == true){
                window.location.reload();
			}else{
				alert(this.responseText);
			}
		}
    };

	xmlhttp.open("POST", "/php/cart/shopCartAlterQuantity.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("user_id=" + $user_id + "&product_id=" + $product_id + "&increase=" + $increase);
}