alert("JS LOADED");

function UpdateStatus(menuId) {

    var name     = document.getElementById('name' + menuId).value.trim();
    var price    = document.getElementById('price' + menuId).value.trim();
    var category = document.getElementById('category' + menuId).value.trim();
    var desc     = document.getElementById('desc' + menuId).value.trim();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Controller/manage_menuController.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            var data = JSON.parse(xhr.responseText);

            if (data.success) {
                alert("Menu updated successfully");
            } else {
                alert(data.message || "Update failed");
            }
        }
    };

    var change = {
        action: "update",
        menu_id: menuId,
        name: name,
        price: price,
        category: category,
        description: desc
    };

    xhr.send(JSON.stringify(change));
}

function toggleStatus(menuId, currentStatus) {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Controller/manage_menuController.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    var change = {
        action: "toggle",
        menu_id: menuId,
        status: currentStatus == 1 ? 0 : 1
    };

    xhr.send(JSON.stringify(change));


    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            var data = JSON.parse(xhr.responseText);

            if (data.success) {

                var btn = document.getElementById('toggle' + menuId);

                btn.innerText = data.new_status == 1 ? "Available" : "Unavailable";
                btn.className = data.new_status == 1 ? "on" : "off";

                btn.setAttribute(
                    "onclick",
                    "toggleStatus(" + menuId + "," + data.new_status + ")"
                );

            } else {
                alert(data.message || "Status update failed");
            }
        }
    };

  
}
