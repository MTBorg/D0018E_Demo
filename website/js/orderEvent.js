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
      document
        .getElementById(product_id)
        .getElementsByTagName("p")[2].innerHTML =
        "<b>stock</b>: " + this.responseText;
    }
  };
  xmlhttp.open("GET", "../php/orderProduct.php?id=" + product_id, true);
  xmlhttp.send();
}
