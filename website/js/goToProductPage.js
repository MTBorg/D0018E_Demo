

function getProduct(product_id, callback) {

    xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "../php/getProduct.php?id=" + product_id, true); 
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {       

        console.log(this.responseText);
        document.write(this.responseText);
        callback(this.responseText);
        
          
      }

  };  


}

function goToProductPage(product_id) {
  getProduct(product_id, function (text) {
    // document.getElementsByClassName("product-background").innerHTML = text;
    // document.getElementsByClassName("product-background").innerHTML = this.responseText;
  });
}









