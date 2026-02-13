<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Результаты учеников</title>
</head>
<body>

<h2>Результаты учеников</h2>

<pre>
<?php
$file = "results.txt";

if (file_exists($file)) {
    echo file_get_contents($file);
} else {
    echo "Пока нет результатов";
}
?>
</pre>

<a href="index.php">Назад</a>

</body>
</html>
