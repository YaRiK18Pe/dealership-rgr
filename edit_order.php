<?php
include "constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['id'];
    $customer_id = $_POST['customer_id'];
    $car_id = $_POST['car_id'];
    $price = $_POST['price'];
    $date_buy = $_POST['date_buy'];
    $address_buy = $_POST['address_buy'];
    $employees_id = $_POST['employees_id'];

    $query = "UPDATE `order` 
              SET customer_check_id = ?, car_id = ?, price = ?, date_buy = ?, address_buy = ?, employees_id = ? 
              WHERE id = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "iissssi", $customer_id, $car_id, $price, $date_buy, $address_buy, $employees_id, $order_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Замовлення успішно оновлено.";
    } else {
        echo "Помилка: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
