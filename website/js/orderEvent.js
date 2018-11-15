function orderEvent(product_id) {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document
        .getElementById(product_id)
        .getElementsByTagName("p")[0].innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "orderProduct.php?id=" + product_id, true);
  xmlhttp.send();
}
