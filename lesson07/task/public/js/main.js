function add() {
    location.href = "index.php?action=add";
}

function edit(id) {
    location.href = "index.php?action=edit&good_id=" + id;
}

function del(id) {
    location.href = "index.php?action=del&good_id=" + id;
}

function add2cart(id) {
    location.href = "engine/cart.php?action=add&good_id=" + id;
}

function add2cartbig(id) {
    location.href = "cart.php?action=add&good_id=" + id;
}

function del2cart(id) {
    location.href = "cart.php?action=delcart&user_id=" + id;
}

function del2good(id) {
    location.href = "cart.php?action=delgood&good_id=" + id;
}
