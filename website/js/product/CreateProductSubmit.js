/*Some security still needs to be added, remove whitespaces, password hidden etc
  Also need to add a field which assigns role_id to indicate admin etc          */
function CreateProductSubmit() {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.response == true) {
        alert("Product added");
        document.getElementById('adminCreateProd').reset();
        window.location.reload();
      } else {
        alert(this.responseText);
      }
    }
  };

  user_inputs = document.getElementById("adminCreateProd").getElementsByTagName("input");
  var prod_name = user_inputs[0].value;
  var prod_price = user_inputs[1].value;
  var prod_stock = user_inputs[2].value;
  var prod_img_url = user_inputs[3].value;
  var prod_cat_name = user_inputs[4].value;

  xmlhttp.open("POST", "/php/product/createProduct.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("name=" + prod_name + "&price=" + prod_price + "&stock=" + prod_stock + "&img_url=" + prod_img_url + "&cat_name=" + prod_cat_name);
}