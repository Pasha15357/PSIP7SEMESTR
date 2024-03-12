<?php
include 'db.php';
// Путь к файлу PHPMailerAutoload.php (настройте путь в соответствии с вашей структурой каталогов)
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$id_категории = $_POST["category_id"];
$name = $_POST["name"]; // Новое поле
$amount = intval($_POST["amount"]);
$type = $_POST["type"];

if ($type == 'expense') {
    $table = 'expenses';
} else {
    $table = 'incomes';
}

$sql = "INSERT INTO $table (id_категории, название, сумма) VALUES ('$id_категории', '$name', '$amount')"; // Добавляем поле "name" в запрос

if ($conn->query($sql) === TRUE) {
    echo "Новая запись успешно добавлена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}
// Получаем данные из формы
$mail = new PHPMailer(true);
$email = $_POST['email'];

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Укажите адрес вашего SMTP-сервера
    $mail->SMTPAuth = true;
    $mail->Username = 'gavrilovpasha27@gmail.com'; // Укажите ваш адрес электронной почты
    $mail->Password = 'jyjn tegv kevb fawj'; // Укажите ваш пароль
    $mail->SMTPSecure = 'tls'; // Используйте 'tls' для защищенного соединения
    $mail->Port = 587; // Используйте порт 587 для TLS

    $mail->setFrom('gavrilovpasha54@gmail.com', 'Павел');
    $mail->addAddress($email);

    $mail->Subject = 'Subject';
    $mail->Body = 'body';

    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$conn->close();
