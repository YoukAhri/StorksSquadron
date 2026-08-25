<?php
session_start();
require 'db.php';
        // конектимся и постом заходим в бд
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
        // добавление самолёта
    if ($action === 'add' && $name) {
        $stmt = $pdo->prepare("INSERT INTO airplanes (name) VALUES (?)");
        $stmt->execute([$name]);
        // редактирование названия самолёта
    } elseif ($action === 'edit' && $id && $name) {
        $stmt = $pdo->prepare("UPDATE airplanes SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);
        // Удаление самолёта из бд
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM airplanes WHERE id = ?");
        $stmt->execute([$id]);
    } // хуй знает че это, но надо
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
// выбор раздела самолётов в бд 
$stmt = $pdo->query("SELECT * FROM airplanes");
$airplanes = $stmt->fetchAll();
?>