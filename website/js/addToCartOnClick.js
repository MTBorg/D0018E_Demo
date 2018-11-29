function addToCartOnClick(product_id) {



  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == -1) { // If user not logged in. 
        window.location.replace("../php/loginpage.php");
      }else if(this.responseText.replace(/\s/g,"") != ""){ //This is necessary to check for empty whitespaces
        alert(this.responseText);
      } 
    }

  };

  // addToCartOnClick, if user is logged in ok
  xmlhttp.open("GET", "../php/addToCart.php?id=" + product_id, true);
  xmlhttp.send();






}
