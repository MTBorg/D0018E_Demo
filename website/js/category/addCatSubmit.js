function addCatSubmit() {
    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response == true) {
                alert("Category added");
                document.getElementById('adminAddCat').reset();
                window.location.reload();
            } else {
                alert(this.responseText);
            }
        }
    };
    
    var catName = document.getElementById("catName").value;
    xmlhttp.open("POST", "/php/category/addCategory.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("catName=" + catName);
}