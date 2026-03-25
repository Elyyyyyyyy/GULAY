<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $p_id = $_POST['p_id'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT p_price, p_stocks FROM products WHERE p_id = '$p_id'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        die("Product not found");
    }

    $price = $product['p_price'];
    $current_stock = $product['p_stocks'];
    $total_price = $price * $quantity;

    if ($quantity > $current_stock) {
        die("Not enough stock");
    }

    $new_stock = $current_stock - $quantity;
    $sql_update = "
        UPDATE products
        SET p_stocks = '$new_stock'
        WHERE p_id = '$p_id'
    ";
    mysqli_query($conn, $sql_update);

    echo "Order placed successfully!";
}
