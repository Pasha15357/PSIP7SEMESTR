<?php
include 'db.php';

$sql = "SELECT i.сумма, i.название, c.название AS category_name FROM incomes i INNER JOIN categories c ON i.id_категории = c.id_категории";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["название"] . ": " . $row["сумма"] . " (" . $row["category_name"] . ")</li>";
    }
} else {
    echo "0 результатов";
}
$conn->close();
?>
