function shopCartBtnUpdateQuantitySubmit(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var quantity_sum = parseInt(this.responseText);
            if(isNaN(quantity_sum)){
                alert(this.responseText);
            }else{
                var quantityText = quantity_sum == 0 ? '' : '(' + this.responseText + ')';
                document.getElementById("shoppingCartBtnQuantity").textContent = quantityText;
            }
        }
    };

  // addToCartOnClick, if user is logged in ok
  xmlhttp.open("GET", "/php/cart/shopCartBtnUpdateQuantity.php", true);
  xmlhttp.send();
}