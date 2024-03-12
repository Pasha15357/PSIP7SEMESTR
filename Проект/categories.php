<?php
include 'db.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id_категории"] . "'>" . $row["Название"] . "</option>";
    }
} else {
    echo "0 результатов";
}
$conn->close();
