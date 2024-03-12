<?php
include 'db.php';

$sql = "SELECT e.id_расхода, e.сумма, e.название AS expense_name, c.название AS category_name 
        FROM expenses e 
        INNER JOIN categories c ON e.id_категории = c.id_категории";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["expense_name"] . ": " . $row["сумма"] . " (" . $row["category_name"] . ") <a href='delete_transaction.php?id=" . $row["id_расхода"] . "'>Удалить</a></li>";
    }
} else {
    echo "0 результатов";
}
$conn->close();
?>
