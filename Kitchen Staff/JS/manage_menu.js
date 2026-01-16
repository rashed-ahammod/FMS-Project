function ajaxUpdate(menuId) {

    let name  = document.getElementById('name' + menuId).value.trim();
    let price = document.getElementById('price' + menuId).value.trim();
    let category  = document.getElementById('category' + menuId).value.trim();
    let desc  = document.getElementById('desc' + menuId).value.trim();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Controller/manage_menuController.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let res = JSON.parse(xhr.responseText);

                if (res.status === "success") {
                    alert("Updated successfully");
                } else {
                    alert(res.message || "Update failed");
                }
            } else {
                alert("Server error");
            }
        }
    };

    let data = {
        action: "update",
        menu_id: menuId,
        name: name,
        price: price,
        category: category,
        description: desc
    };

    xhr.send(JSON.stringify(data));
}


function toggleStatus(menuId, currentStatus) {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Controller/manage_menuController.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            let res = JSON.parse(xhr.responseText);

            if (res.status === "success") {

                let btn = document.getElementById('toggle' + menuId);

                btn.innerText = res.new_status ? "Available" : "Unavailable";
                btn.className = res.new_status ? "on" : "off";
                btn.setAttribute(
                    "onclick",
                    "toggleStatus(" + menuId + "," + res.new_status + ")"
                );
            }
        }
    };

    let data = {
        action: "toggle",
        menu_id: menuId,
        status: currentStatus ? 0 : 1
    };

    xhr.send(JSON.stringify(data));
}
