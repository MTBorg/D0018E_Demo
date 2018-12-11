function shopCartAlterQuantitySubmit(user_id, product_id, increase, product_price){
    xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.response == true){
				//Set new quantity
				let element = document.getElementById("quantity"+product_id);
				let newQuantity = parseInt(element.innerText) + (increase == 1 ? 1 : -1);
				if(newQuantity <= 0){
					removeShoppingCartItemSubmit(user_id, product_id);
					return; //To prevent the user from seeing the quantity turn to 0
				}
				element.innerText = newQuantity.toString();
				
				//Set new sum
				document.getElementById("sum"+product_id).innerText = (parseInt(newQuantity) * product_price).toString();

				//Set the new total sum
				let element_sumtot = document.getElementById("totalSum");
				element_sumtot.innerText = (parseInt(element_sumtot.innerText) + product_price * (increase == 1 ? 1 : -1)).toString();

				//Set the shopping cart button
				let element_cartquantity = document.getElementById("shoppingCartBtnQuantity");
				let cartquantity = element_cartquantity.innerText.substr(1, element_cartquantity.innerText.length); //Remove the parenthesis around the number
				let cartquantity_new = parseInt(cartquantity) + (increase == 1 ? 1 : -1);
				element_cartquantity.innerText = "(" + cartquantity_new.toString() + ")";
			}else{
				alert(this.responseText);
			}
		}
    };

	xmlhttp.open("POST", "/php/cart/shopCartAlterQuantity.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("user_id=" + user_id + "&product_id=" + product_id + "&increase=" + increase);
}