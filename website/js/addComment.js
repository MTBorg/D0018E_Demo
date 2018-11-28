

function addComment() {
    // Get product_id from url, can be done with PHP $_GET but not really good.
    var product_id = window.location.search.split("=").pop();

    xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        if (this.response == true) {
            alert("thank you for commenting!");
  
        } else {
            alert("Only logged in user and users who have bought the product can comment!");
        }
        
      }
    };

  var comment = document.getElementById("comment").value;

    xmlhttp.open("POST", "../php/addComment.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(
        "product_id=" +
        product_id +
      "&comment=" + 
        comment

    );
    

}