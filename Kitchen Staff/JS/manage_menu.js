function ajaxUpdate(menuId) {

    let name  = document.getElementById('name' + menuId).value.trim();
    let price = document.getElementById('price' + menuId).value.trim();
    let desc  = document.getElementById('desc' + menuId).value.trim();

    fetch('../Controller/manage_menuController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action: 'update',
            menu_id: menuId,
            name: name,
            price: price,
            description: desc
        })
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            alert("Updated successfully ");
        } else {
            alert(res.message || "Update failed ");
        }
    })
    .catch(() => alert("Server error "));
}

function toggleStatus(menuId, currentStatus) {

    fetch('../Controller/manage_menuController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action: 'toggle',
            menu_id: menuId,
            status: currentStatus ? 0 : 1
        })
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {

            let btn = document.getElementById('toggle' + menuId);

            btn.innerText = res.new_status ? "Available" : "Unavailable";
            btn.className = res.new_status ? "on" : "off";

            btn.setAttribute(
                "onclick",
                `toggleStatus(${menuId}, ${res.new_status})`
            );
        }
    })
    .catch(() => alert("Server error "));
}