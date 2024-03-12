<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Учет расходов и доходов</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Учет расходов и доходов</h1>

<h2>Расходы</h2>
<ul class="transactions">
    <?php include 'expenses.php'; ?>
</ul>

<h2>Доходы</h2>
<ul class="transactions">
    <?php include 'incomes.php'; ?>
</ul>
<form action="export_expenses.php" method="post">
    <button type="submit" name="export_expenses">Экспорт расходов</button>
</form>

<h2>Добавить транзакцию</h2>
<form action="add_transaction.php" method="post" class="transaction-form">
    <div class="form-group">
        <label for="category_id">Категория:</label>
        <select name="category_id" id="category_id" class="form-control">
            <?php include 'categories.php'; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="amount">Сумма:</label>
        <input type="text" name="amount" id="amount" class="form-control">
    </div>
    <div class="form-group">
        <label for="type">Тип (расход/доход):</label>
        <select name="type" id="type" class="form-control">
            <option value="expense">Расход</option>
            <option value="income">Доход</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <button type="submit" class="btn">Добавить</button>


</form>
</body>
</html>
