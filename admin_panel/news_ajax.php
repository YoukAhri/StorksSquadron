<?php
require 'db.php';
$data = json_decode(file_get_contents('php://input'),true);
$action = $_GET['action'] ?? '';

if($action=='get' && isset($_GET['id'])){
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id=?");
    $stmt->execute([$_GET['id']]);
    echo json_encode($stmt->fetch());
}

if($action=='save'){
    if($data['id']==0){

        $stmt = $pdo->prepare(
            "INSERT INTO news (category_ru,category_en,title_ru,title_en,text_ru,text_en,image)
             VALUES (?,?,?,?,?,?,?)"
        );
        $stmt->execute([
            $data['category_ru'],
            $data['category_en'],
            $data['title_ru'],
            $data['title_en'],
            $data['text_ru'],
            $data['text_en'],
            $data['image']
        ]);

    } else {

        $stmt = $pdo->prepare(
            "UPDATE news
             SET category_ru=?, category_en=?, title_ru=?, title_en=?, text_ru=?, text_en=?, image=?
             WHERE id=?"
        );
        $stmt->execute([
            $data['category_ru'],
            $data['category_en'],
            $data['title_ru'],
            $data['title_en'],
            $data['text_ru'],
            $data['text_en'],
            $data['image'],
            $data['id']
        ]);
    }

    echo json_encode(['status'=>'ok']);
}



if($action=='delete' && isset($_GET['id'])){
    $stmt = $pdo->prepare("SELECT image FROM news WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();
    if($row && file_exists($row['image'])) unlink($row['image']); // удаляем файл
    $stmt = $pdo->prepare("DELETE FROM news WHERE id=?");
    $stmt->execute([$_GET['id']]);
    echo json_encode(['status'=>'ok']);
}
