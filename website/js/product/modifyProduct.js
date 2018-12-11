function modifyProduct(product_id) {
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
      //console.log(this.response);
      if (this.responseText != "0") {

        alert("modified:\n" + this.responseText);
        document.getElementById('adminForm').reset();
        window.location.reload();

      } else {
        alert("Error: The product name already exists.\nChoose a different name or modify the already existing product instead.")
      }
      
    }
  };

  usr_inputs =document.getElementById("adminForm").getElementsByTagName("input");
  var name = usr_inputs[0].value;
  var price = usr_inputs[1].value;
  var stock = usr_inputs[2].value;
  var cat_id = usr_inputs[3].value;

  xmlhttp.open("POST", "/php/product/modifyProduct.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(
    "id=" + 
    product_id + 
    "&name=" +
      name +
      "&price=" +
      price +
      "&stock=" +
      stock +
      "&cat_id=" +
      cat_id
  );
}

