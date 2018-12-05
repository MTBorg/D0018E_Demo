function removeShoppingCartItemSubmit(user_id, product_id) {
	xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == true) {
				window.location.reload();
			}else{
				alert(this.responseText);
			}
		}
    };

	xmlhttp.open("POST", "/php/cart/removeShoppingCartItem.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("user_id=" + user_id + "&product_id=" + product_id);
}	

