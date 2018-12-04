
function setColor(stars) {

    for (var i = 1; i <= stars; i++) {
        document.getElementById(i).style.display = "none";
        document.getElementById(i).nextElementSibling.style.display = "inline";
        
    }
    

}

function resetReview() {
    document.getElementById("comment").value = "";
    window.location.reload();

}






