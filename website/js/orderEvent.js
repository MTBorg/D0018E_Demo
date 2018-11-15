function orderEvent(product_id) {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementByClass().getElementById("stockPos");
    }
  };
  xmlhttp.open("GET", "orderProduct.php?q=" + product_id, true);
  xmlhttp.send();
}
