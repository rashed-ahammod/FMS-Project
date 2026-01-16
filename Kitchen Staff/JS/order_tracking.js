function updateOrder(order_id, status) {
     var xhr = new XMLHttpRequest();
     xhr.open("POST", "order_trackingController.php", true);
     xhr.setRequestHeader("Content-Type", "application/json");

    var change = {
        order_id: order_id,
        status: status
    };

    xhr.send(JSON.stringify(change));

        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            var data = JSON.parse(xhr.responseText);

            if (data.success) {
                document.getElementById("status" + order_id).innerText = status;
                alert("Order updated successfully");
            } else {
                alert("Failed: " + (data.message || ""));
            }
        }
    };
}