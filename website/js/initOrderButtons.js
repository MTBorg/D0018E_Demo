function initOrderButtons() {
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // None user
            if (this.responseText == false) {
                console.log(this.responseText);
                items = document.getElementByClass("item");
                for (var i = 0; i < items.length; i++) {
                    document.getElementsByTagName("button").onclick = window.location.replace("../php/loginpage.php");
                }

            }

            w

        }
    };


    xmlhttp.open("POST", "../php/initOrderButtons.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

