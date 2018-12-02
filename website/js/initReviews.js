function initReviews() {
  // Get product_id from url
  var product_id = window.location.search.split("=").pop();

  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText) {
        var reviewData = this.responseText.split("|");
        console.log(reviewData);
        for (var i = 0; i < reviewData.length - 1; i += 3) {
          // Random colors for user box
          //Ref: https://css-tricks.com/snippets/javascript/random-hex-color/
          var randomNr =
            "#" + Math.floor(Math.random() * 16777215).toString(16);

          var userBox = document.getElementById("userBox");
          var nameAndRatingBox = document.createElement("div");
          
          var commentBox = document.createElement("textarea");
          
          // Install div where name and rating shows
          userBox.appendChild(nameAndRatingBox);
          // array ["comment", "rating", "user"]
          nameAndRatingBox.innerHTML = reviewData[i + 2];
          nameAndRatingBox.style.backgroundColor = randomNr;

          // Install stars dependent on user rating 1-5
          for(var a = 0; a < reviewData[i + 1]; a++) {
            var starSpan = document.createElement("span");
            starSpan.className = "fa fa-star";
            userBox.appendChild(starSpan);

        }

          // Install textarea where comment shows
          userBox.appendChild(commentBox);

          commentBox.innerHTML = reviewData[i];
          commentBox.disabled = true;
        }
      }
    }
  };

  xmlhttp.open("GET", "../php/getReview.php?id=" + product_id, true);
  xmlhttp.send();
}
