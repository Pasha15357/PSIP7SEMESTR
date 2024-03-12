<?php
include 'db.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM expenses WHERE id_расхода=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Запись успешно удалена";
    } else {
        echo "Ошибка при удалении записи: " . $conn->error;
    }
} else {
    echo "Некорректный запрос";
}

$conn->close();