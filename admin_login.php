<?php
session_start();

if ($_POST) {

    if ($_POST['login'] === "admin" && $_POST['password'] === "1234") {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Неверный логин или пароль";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Вход администратора</title>
</head>
<body>

<h2>Вход администратора</h2>

<?php if(isset($error)) echo "<p>$error</p>"; ?>

<form method="post">

Логин:<br>
<input type="text" name="login"><br><br>

Пароль:<br>
<input type="password" name="password"><br><br>

<button type="submit">Войти</button>

</form>

</body>
</html>
