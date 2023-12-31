<?php
include "constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM customers WHERE id=?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Покупця успішно вилучено з бази даних.";
    } else {
        echo "Помилка: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
