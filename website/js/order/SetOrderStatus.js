function SetOrderStatus(order_id){
    new_status = document.getElementById("newStatus"+order_id).value;

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 1){ //If succesful
                document.getElementById("orderStatus"+order_id).innerHTML = new_status;
            }else{ //Not successful
                alert("Failed to update order: " + this.responseText);
            }
        }
    };
    
    xmlhttp.open("POST", "/php/order/setOrderStatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("order_id=" + order_id + "&status=" + new_status);
}