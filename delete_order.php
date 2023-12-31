<?php
include "constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $query = "DELETE FROM `order` WHERE id = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $order_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Замовлення успішно видалено.";
    } else {
        echo "Помилка: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
