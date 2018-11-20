/*Some security still needs to be added, remove whitespaces, password hidden etc
  Also need to add a field which assigns role_id to indicate admin etc          */

function CreateProductSubmit() {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("submit-info").innerHTML = this.responseText;
      alert(this.responseText);

      if (this.responseText == "Ok! Product added") {
        window.location.replace("..");
      }
    }
  };

  user_inputs = document.getElementsByTagName("input");
  var prod_name = user_inputs[0].value;
  var prod_price = user_inputs[1].value;
  var prod_stock = user_inputs[2].value;
  var prod_img_url = user_inputs[3].value;

  xmlhttp.open("POST", "../php/createProduct.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(
    "name=" +
      prod_name +
      "&price=" +
      prod_price +
      "&stock=" +
      prod_stock +
      "&img_url=" +
      prod_img_url
  );
}
// }
