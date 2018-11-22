/*Some security still needs to be added, remove whitespaces, password hidden etc
  Also need to add a field which assigns role_id to indicate admin etc          */

function getUserInput(idFirst_name, idLast_name, idEmail, idPassword) {
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("submit-info").innerHTML = this.responseText;
      alert(this.responseText);

      if (this.responseText == "Success!") {
        window.location.replace("..");
      }
    }
  };

  user_inputs = document.getElementsByTagName("input");
  var first_name = user_inputs[0].value;
  var last_name = user_inputs[1].value;
  var email = user_inputs[2].value;
  var password = user_inputs[3].value;

  xmlhttp.open("POST", "../php/createUser.php", true);
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
// }
