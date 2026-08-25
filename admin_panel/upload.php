<?php
// папка для сохранённых пикч
$targetDir = __DIR__ . '/uploads/';
if(!is_dir($targetDir)) mkdir($targetDir, 0777, true);

if(isset($_FILES['image'])){
    $file = $_FILES['image'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $name = uniqid().'.'.$ext; 
    $path = $targetDir.$name;

    if(move_uploaded_file($file['tmp_name'],$path)){
        echo json_encode(['status'=>'ok','url'=>'uploads/'.$name]);
    } else {
        echo json_encode(['status'=>'error']);
    }
}
