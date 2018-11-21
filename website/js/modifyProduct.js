function orderEvent(product_id) {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      /** Selects product id which is unique
       * Selects the 3rd <p> tag which is stock
       *  [0] = name
       *  [1] = price
       *  [2] = stock
       *  [3] = rating
       * That said this script can be reused!
       */
      // If user not logged in.
      console.log(this.response);
      if (this.responseText) {
        window.location.reload();
      }
    }
  };

  // OrderEvent, if user is logged in ok
  xmlhttp.open("GET", "../php/deleteProduct.php?id=" + product_id, true);
  xmlhttp.send();
}
