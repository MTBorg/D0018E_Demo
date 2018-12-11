/*Some security still needs to be added, remove whitespaces, password hidden etc
  Also need to add a field which assigns role_id to indicate admin etc          */
function userSignUp() {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("submit-info").innerHTML = this.responseText;
      alert(this.responseText);

      if (this.responseText == "Success!") {
        window.location.replace("/index.php");
      }
    }
  };

  var first_name = document.getElementById("fname").value;
  var last_name= document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  xmlhttp.open("POST", "/php/account/createUser.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(
    "first_name=" +
      first_name +
      "&last_name=" +
      last_name +
      "&email=" +
      email +
      "&password=" +
      password
  );
}