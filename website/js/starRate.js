

function starRate(rating) {
    // Get product_id from url, can be done with PHP $_GET but not really good.
    var product_id = window.location.search.split("=").pop();

    xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
        if (this.response == true) {
            alert("thank you!");
  
        } else {
            alert("Only logged in user and users who have bought the product can rate!");
        }
        
      }
    };

  

    xmlhttp.open("POST", "../php/addStars.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(
        "product_id=" +
        product_id +
      "&rating=" + 
        rating

    );
    

}