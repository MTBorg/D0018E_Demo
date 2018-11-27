function initReview() {
    // Get product_id from url

  // Split at =, into array, pop() gets latest element in array
  var product_id = window.location.search.split("=").pop();
  // console.log(url);

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // console.log(this.responseText);
        if (this.responseText) {
          var reviewData = this.responseText.split("|");
          console.log(reviewData);
          for (var i = 0; i < reviewData.length; i++) {
            document.getElementById(
              "ReviewsTextArea"
            ).appendChild(document.createElement("textarea")) = reviewData[i];
            

            document.getElementById("userBox").appendChild(document.createElement("div")) = reviewData[i + 1];
        }
          }
      }
    };

    // addToCartOnClick, if user is logged in ok
    xmlhttp.open("GET", "../php/getReview.php?id=" + product_id, true);
    xmlhttp.send();

}