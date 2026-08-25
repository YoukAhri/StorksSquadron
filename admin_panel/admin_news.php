<?php
session_start();

// фиксированные логин и пароль
$valid_login = "dfskfsdk";
$valid_pass  = "fw43jfsd3";

// обработка формы логина
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'], $_POST['password'])) {
    if ($_POST['login'] === $valid_login && $_POST['password'] === $valid_pass) {
        $_SESSION['is_admin'] = true;
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Неверный логин или пароль!";
    }
}

// если не авторизован → форма входа
if (empty($_SESSION['is_admin'])):
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход в админку</title>
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>
    <div class="login-form" style="max-width:300px;margin:100px auto;padding:20px;border:1px solid #ccc;border-radius:8px;">
        <h2>Авторизация</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="login" placeholder="Логин" required style="width:100%;margin-bottom:10px;padding:5px;"><br>
            <input type="password" name="password" placeholder="Пароль" required style="width:100%;margin-bottom:10px;padding:5px;"><br>
            <button type="submit" style="width:100%;padding:8px;">Войти</button>
        </form>
    </div>
</body>
</html>





<!-- ПОСЛЕ АВТОРИЗАЦИИ  -->

<?php
exit;
endif;  
require 'db.php'; // БДшка 
session_start();
include 'plane_php.php'; // Файл в котором вся обработка самолётиков 
$stmt = $pdo->query("SELECT * FROM news ORDER BY created_at DESC");
$newsList = $stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Админ - панель</title>
<link rel="stylesheet" href="css/style_admin.css">
<link rel="stylesheet" href="css/news.css">
<link rel="stylesheet" href="css/admin_panel_style.css">
<link rel="stylesheet" href="../css/fonts.css">

</head>
<body>
    
<div class="admin-navbar">
    <div class="nav-item active" onclick="switchTab('news')">Новости</div>
    <div class="nav-item" onclick="switchTab('pilots')">Самолёты</div>
    <div class="nav-item" onclick="switchTab('users')">Пользователи</div>
</div>


<div id="news" class="tab-content">
    <div class="news-container">
        <div class="add-news" onclick="openModal()">+</div>
        <?php foreach($newsList as $news): ?>
            <div class="news-card" onclick="openModal(<?= $news['id'] ?>)">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="">
                <h3><?= htmlspecialchars($news['title_ru']) ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div id="pilots" class="tab-content" style="display: none;">
<div class="container">
    <h1>Управление самолетами</h1>
    <button class="button" onclick="openPopup('add')">Добавить самолет</button>

    <div class="airplane-list">
        <table>
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($airplanes as $airplane): ?>
                    <tr>
                        <td><?= htmlspecialchars($airplane['name']) ?></td>
                        <td>
                            <!-- Кнопка редактирования, передающая ID -->
                            <button class="button" onclick="openPopup('edit', <?= $airplane['id'] ?>)">Редактировать</button>
                            <!-- Форма для удаления -->
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $airplane['id'] ?>">
                                <button type="submit" class="button" style="background-color: #dc3545;">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="popup" id="popup">
    <div class="popup-content">
        <h2 id="popup-title">Добавить новый самолет</h2>
        <form action="" method="POST">
            <input type="hidden" id="airplane-id" name="id">
            <input type="hidden" name="action" id="action">
            <label for="name">Название</label>
            <input type="text" id="name" name="name" required autocomplete="off">
            <button type="submit">Сохранить</button>
            <button type="button" onclick="closePopup()">Закрыть</button>
        </form>
    </div>
</div>
</div>





<div id="modal">
    <div class="content">
        <input type="hidden" id="news_id">

        <label>Категория (RU) </label>
        <input type="text" id="news_category_ru">
        <label>Категория (EN) </label>
        <input type="text" id="news_category_en">
        
        
        <label>Заголовок (RU)</label>
        <input type="text" id="news_title_ru">
        <label>Заголовок (EN)</label>
        <input type="text" id="news_title_en">

        <label>Текст (RU)</label>
        <textarea id="news_text_ru" class="new_text_1"></textarea>
        <label>Текст (EN)</label>
        <textarea id="news_text_en" class="new_text_1"></textarea>



        <label>Изображение</label>
        <input type="text" id="news_image" placeholder="URL картинки">
        <input type="file" id="news_file">
        <div id="drop_area" style="border:2px dashed #ccc; padding:20px; text-align:center; margin-bottom:10px;">
            Перетащи файл сюда или нажми, чтобы выбрать
        </div>
        <img id="preview" src="" style="max-width:100%; margin-bottom:10px;">

        <div style="text-align:right;">
            <button onclick="saveNews()">Сохранить</button>
            <button onclick="deleteNews()">Удалить</button>
            <button onclick="closeModal()">Закрыть</button>
            <button id="open_site_btn" onclick="openNewsPage()" disabled style="background:#ccc; cursor:not-allowed;">Перейти на сайт</button>
        </div>
    </div>
</div>




<script>

function openModal(id=0){
    document.getElementById('modal').style.display='flex';

    if(id===0){

        document.getElementById('news_id').value = 0;
        document.getElementById('news_category_ru').value = '';
        document.getElementById('news_category_en').value = '';


        // RU
        document.getElementById('news_title_ru').value = '';
        document.getElementById('news_text_ru').value = '';

        // EN
        document.getElementById('news_title_en').value = '';
        document.getElementById('news_text_en').value = '';

        document.getElementById('news_image').value = '';
        document.getElementById('preview').src = '';

        document.getElementById('open_site_btn').disabled = true;
        document.getElementById('open_site_btn').style.background = '#ccc';
        document.getElementById('open_site_btn').style.cursor = 'not-allowed';

    } else {

        fetch('news_ajax.php?action=get&id='+id)
        .then(r=>r.json())
        .then(data=>{

            document.getElementById('news_id').value = data.id;
            document.getElementById('news_category_ru').value = data.category_ru;
            document.getElementById('news_category_en').value = data.category_en;


            // RU
            document.getElementById('news_title_ru').value = data.title_ru;
            document.getElementById('news_text_ru').value = data.text_ru;

            // EN
            document.getElementById('news_title_en').value = data.title_en;
            document.getElementById('news_text_en').value = data.text_en;

            document.getElementById('news_image').value = data.image;
            document.getElementById('preview').src = data.image;

            document.getElementById('open_site_btn').disabled = false;
            document.getElementById('open_site_btn').style.background = '';
            document.getElementById('open_site_btn').style.cursor = 'pointer';
        });
    }
}


function openNewsPage(){
    const id = document.getElementById('news_id').value;
    if(id && id != 0){
        window.open('news_page.php?id='+id, '_blank');
    }
}


function closeModal(){
    document.getElementById('modal').style.display='none';
}


function saveNews(){ // сохранить изменение новости
    let id = document.getElementById('news_id').value;

    let data = {
        id:id,
        category_ru: document.getElementById('news_category_ru').value,
        category_en: document.getElementById('news_category_en').value,


        // RU
        title_ru: document.getElementById('news_title_ru').value,
        text_ru: document.getElementById('news_text_ru').value,

        // EN
        title_en: document.getElementById('news_title_en').value,
        text_en: document.getElementById('news_text_en').value,

        image: document.getElementById('news_image').value
    };

    fetch('news_ajax.php?action=save',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify(data)
    }).then(r=>r.json())
    .then(res=>{
        if(res.status=='ok') location.reload();
        else alert('Ошибка');
    });
}


function deleteNews(){ // удаление новости
    let id = document.getElementById('news_id').value;
    if(!id || !confirm('Удалить новость?')) return;

    fetch('news_ajax.php?action=delete&id='+id)
    .then(r=>r.json())
    .then(res=>{
        if(res.status=='ok') location.reload();
        else alert('Ошибка');
    });
}


// ================= Загрузка пикч =================
const dropArea = document.getElementById('drop_area');
const fileInput = document.getElementById('news_file');
const preview = document.getElementById('preview');

dropArea.addEventListener('click', ()=>fileInput.click());

dropArea.addEventListener('dragover', e=>{
    e.preventDefault();
    dropArea.style.background = '#eee';
});
dropArea.addEventListener('dragleave', e=>{
    dropArea.style.background = '';
});
dropArea.addEventListener('drop', e=>{
    e.preventDefault();
    dropArea.style.background = '';
    if(e.dataTransfer.files.length){
        handleFile(e.dataTransfer.files[0]);
    }
});

fileInput.addEventListener('change', ()=> {
    if(fileInput.files.length) handleFile(fileInput.files[0]);
});

function handleFile(file){
    const formData = new FormData();
    formData.append('image', file);

    fetch('upload.php', { method:'POST', body: formData })
    .then(r => r.json())
    .then(res => {
        if(res.status=='ok'){
            document.getElementById('news_image').value = res.url;
            preview.src = res.url;
        } else {
            alert('Ошибка загрузки файла');
        }
    });
}


// ================= Переключение вкладок =================
function switchTab(tab) {
    document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
    document.querySelector(`.nav-item[onclick="switchTab('${tab}')"]`).classList.add('active');

    document.querySelectorAll('.tab-content').forEach(c => c.style.display = 'none');
    document.getElementById(tab).style.display = 'block';
}

// ================= Вторая вкладка ( пилоты ) =================

function openPopup(action, id = 0) {
    document.getElementById('popup').style.display = 'flex';
    document.getElementById('action').value = action;

    if (action === 'edit') {
        document.getElementById('popup-title').innerText = 'Редактировать самолет';
        const airplane = <?= json_encode($airplanes) ?>;
        const selectedAirplane = airplane.find(a => a.id == id);

        if (selectedAirplane) {
            document.getElementById('airplane-id').value = selectedAirplane.id;
            document.getElementById('name').value = selectedAirplane.name;
        }
    } else {
        document.getElementById('popup-title').innerText = 'Добавить новый самолет';
        document.getElementById('airplane-id').value = '';
        document.getElementById('name').value = '';
    }
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}








</script>

</body>
</html>
