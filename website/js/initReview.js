function initReview() {
  // Get product_id from url
  var product_id = window.location.search.split("=").pop();

  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText) {
        var reviewData = this.responseText.split("|");
        console.log(reviewData);
        for (var i = 0; i < reviewData.length - 1; i += 2) {
          document
            .getElementById("userBox")
            .appendChild(document.createElement("div")).innerHTML =
            reviewData[i + 1];
          document
            .getElementById("userBox")
            .appendChild(document.createElement("textarea")).innerHTML =
            reviewData[i];
        }

        // Random colors for user box
        for (var i = 0; i < reviewData.length / 2 - 1; i++) {
          //Ref: https://css-tricks.com/snippets/javascript/random-hex-color/
          var randomNr =
            "#" + Math.floor(Math.random() * 16777215).toString(16);
          document.getElementById("userBox").getElementsByTagName("div")[
            i
          ].style.backgroundColor = randomNr;
        }
      }
    }
  };

  xmlhttp.open("GET", "../php/getReview.php?id=" + product_id, true);
  xmlhttp.send();
}
