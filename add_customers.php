<?php
include "constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_surname = isset($_POST['name_surname']) ? mysqli_real_escape_string($link, $_POST['name_surname']) : '';
    $birth_date = isset($_POST['вirth_date']) ? mysqli_real_escape_string($link, $_POST['вirth_date']) : '';
    $phone_number = isset($_POST['phone_number']) ? mysqli_real_escape_string($link, $_POST['phone_number']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($link, $_POST['email']) : '';

    if (!empty($name_surname) && !empty($birth_date) && !empty($phone_number) && !empty($email)) {
        $query = "INSERT INTO customers (name_surname, вirth_date, phone_number, email) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name_surname, $birth_date, $phone_number, $email);

        if (mysqli_stmt_execute($stmt)) {
            echo "Покупця успішно додано до бази даних.";
        } else {
            echo "Помилка: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Будь ласка, заповніть всі поля форми.";
    }
}
?>
