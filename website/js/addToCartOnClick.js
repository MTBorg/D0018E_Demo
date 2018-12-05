function addToCartOnClick(product_id) {



  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == -1) { // If user not logged in. 
        window.location.replace("/php/pages/loginPage.php");
      }else if(this.responseText.replace(/\s/g,"") != ""){ //This is necessary to check for empty whitespaces
        alert(this.responseText);
      }else{
        shopCartBtnUpdateQuantitySubmit();
      } 
    }

  };

  // addToCartOnClick, if user is logged in ok
  xmlhttp.open("GET", "/php/cart/addToCart.php?id=" + product_id, true); 
  xmlhttp.send();
}
