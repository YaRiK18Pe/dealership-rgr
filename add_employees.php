<?php
include "constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role_id = $_POST['role_id'];
    $name_surname = $_POST['name_surname'];
    $birth_date = $_POST['вirth_date'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $work_time = $_POST['work_time'];
    $dealership_id = $_POST['dealership_id'];  

    // Verify that the provided dealership_id exists in the dealership table
    $check_dealership_query = "SELECT id FROM dealership WHERE id = ?";
    $check_dealership_stmt = mysqli_prepare($link, $check_dealership_query);
    mysqli_stmt_bind_param($check_dealership_stmt, "i", $dealership_id);
    mysqli_stmt_execute($check_dealership_stmt);
    mysqli_stmt_store_result($check_dealership_stmt);

    if (mysqli_stmt_num_rows($check_dealership_stmt) > 0) {
        // The provided dealership_id is valid, proceed with the insertion
        $insert_query = "INSERT INTO employees (role_id, name_surname, birth_date, phone_number, email, salary, work_time, dealership_id) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $insert_stmt = mysqli_prepare($link, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "sssssssi", $role_id, $name_surname, $birth_date, $phone_number, $email, $salary, $work_time, $dealership_id);

        if (mysqli_stmt_execute($insert_stmt)) {
            echo "Працівника успішно додано до бази даних.";
        } else {
            echo "Помилка: " . mysqli_stmt_error($insert_stmt);
        }

        mysqli_stmt_close($insert_stmt);
    } else {
        echo "Помилка: Неправильний ідентифікатор дилерського центру.";
    }

    mysqli_stmt_close($check_dealership_stmt);
}
?>
