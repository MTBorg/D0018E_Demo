function shopCartAlterQuantitySubmit(user_id, product_id, increase, product_price){
    xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			if (this.response == true){
				//Set new quantity
				let element = document.getElementById("quantity"+product_id);
				let newQuantity = (parseInt(element.innerText) + (increase == 1 ? 1 : -1)).toString();
				element.innerText = newQuantity;
				
				//Set new sum
				document.getElementById("sum"+product_id).innerText = (parseInt(newQuantity) * product_price).toString();

				//Set the new total sum
				let element_sumtot = document.getElementById("totalSum");
				element_sumtot.innerText = (parseInt(element_sumtot.innerText) + product_price * (increase == 1 ? 1 : -1)).toString();
			}else{
				alert(this.responseText);
			}
		}
    };

	xmlhttp.open("POST", "/php/cart/shopCartAlterQuantity.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("user_id=" + user_id + "&product_id=" + product_id + "&increase=" + increase);
}