<?php
include "constants.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $role_id = $_POST['role_id'];
    $name_surname = $_POST['name_surname'];
    $birth_date = $_POST['вirth_date'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $work_time = $_POST['work_time'];

    $query = "UPDATE employees SET role_id=?, name_surname=?, birth_date=?, phone_number=?, email=?, salary=?, work_time=? WHERE id=?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssssssi", $role_id, $name_surname, $birth_date, $phone_number, $email, $salary, $work_time, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Зміни успішно збережено.";
    } else {
        echo "Помилка: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
