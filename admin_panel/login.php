<?php
session_start();
// логин и пароль
$valid_login = "dfskfsdk";
$valid_pass  = "fw43jfsd3";

// Если отправлена форма — проверяем
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['login'] === $valid_login && $_POST['password'] === $valid_pass) {
        $_SESSION['is_admin'] = true;
        header("Location: admin.php"); // сюда попадёшь после логина
        exit;
    } else {
        $error = "Неверный логин или пароль!";
    }
}

// Если не авторизован — форма входа
if (empty($_SESSION['is_admin'])):
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вход в админ панель</title>
</head>
<body>
    <h2>Авторизация</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="login" placeholder="Логин" required><br><br>
        <input type="password" name="password" placeholder="Пароль" required><br><br>
        <button type="submit">Войти</button>
    </form>
</body>
</html>
<?php
exit;
endif;

echo "<h1>Добро пожаловать в админку!</h1>";
