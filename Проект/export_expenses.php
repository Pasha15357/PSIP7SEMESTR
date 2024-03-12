<?php
include 'db.php';

// Открываем файл для записи данных
$filename = 'expenses.txt';
$file = fopen($filename, 'w');

// Получаем данные из базы данных
$sql = "SELECT * FROM expenses";
$result = $conn->query($sql);

// Записываем данные в файл
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $line = $row['id_расхода'] . ',' . $row['id_категории'] . ',' . $row['Название'] . ',' . $row['Сумма'] . "\n";
        fwrite($file, $line);
    }
}

// Закрываем файл
fclose($file);

// Выводим сообщение об успешном экспорте
echo "Данные успешно экспортированы в файл '$filename'";

// Перенаправляем пользователя на главную страницу или куда-либо еще
// header("Location: index.php");
?>
