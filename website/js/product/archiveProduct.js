function archiveProduct(product_id) {
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if (this.response) {
              alert(this.responseText);
          } else {
              alert("The product has been archived.");
              window.location.reload();
          }
      }
    };

    xmlhttp.open("POST", "/php/product/archiveProduct.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + product_id);
  }