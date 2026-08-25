<?php
require 'db.php';

$id = intval($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM news WHERE id=?");
$stmt->execute([$id]);
$news = $stmt->fetch();

$title = $news["title_$lang"];
$text  = $news["text_$lang"];
$category = $news["category_$lang"];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title><?= htmlspecialchars($news['title_ru']) ?> — Storks</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="/css/navbar.css"/> 
  <link rel="icon" type="image/png" href="/Picture/Logo.png">
  <script src="/JS/script.js" defer></script>
</head>

<style> 
* { box-sizing:border-box; margin:0; padding:0; }
    body { font-family: system-ui,-apple-system,BlinkMacSystemFont,sans-serif; background:#f5f5f5; }
    .hero {
      position: relative;
      height: 100vh;
      overflow: hidden;
    }

html {
  scroll-behavior: smooth;
}

.hero {
  position: relative;
  height: 800px;
  overflow: hidden;
}

.bg {
  position: absolute;
  inset: 0;
  background-image: url('/Picture/12121.png');  background-size: cover;
  background-position: center;
  transform: scale(1);
  will-change: transform;
}

.bg::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.4);
}

.overlay {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.center-content {
  text-align: center;
  color: #fff;
  max-width: 900px;
  padding: 20px;
  border-radius: 12px;
}

/* Текст мейн блока NEWS STORKS SQUADRON */
.main_logo {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 15px;
  margin-bottom: 20px;
}

.text_main_1 { 
  font-family: "Adamina";
  font-size: 7cqw;
  max-height: 80vh;
  white-space: nowrap;
}

@media (max-width: 1000px) {
  .text_main_1 { 
  font-size: 10cqw;
  }
}

.main_logo img {
  display: flex;
  justify-content: center;
  max-width: 850px;
  border-radius: 8px;
  width: 30vw;
}

@media (max-width: 1000px) {
  .main_logo img { 
    width: 60vw;
  }
}

.news-section {
  width: 100%;
  padding: 50px 0;
  background-color: #1a1a1a; 
  color: #fff;
  box-sizing: border-box;
}

.news-container {
  display: flex;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  align-items: stretch; /* растягиваем дочерние блоки по высоте */
}
.news-left, .news-right {
  flex: 1 1 50%;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  max-width: 50%;
}

.news-left { 
  gap: 20px;
  display: flex; 
  align-items:center;
}

.news-right img {
  width: 100%;
  height: 100%; /* растягиваем по всей высоте родителя */
  border-radius: 20px;
  object-fit: cover; /* сохраняем пропорции и заполняем блок */
}

@media (max-width: 1024px) {
  .news-left { 
    max-width: 100%;
  }

  .news-right { 
    display: none;
  }
}

.news-title {
  font-size: 2rem;
  font-weight: bold;
  text-align: center;
}

.news-small-title { 
  font-size: 1rem;
  font-weight: bold;
  text-align: center;
}

.news-text {
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 20px;
  padding: 30px;
  line-height: 1.6;
  color: #fff;
  max-height: 700px;
  overflow-y: auto;
  
  max-width: 100%;

  /* блокирует скрол вне блока */
  overscroll-behavior: contain; 
}

@media (max-width: 1024px) {
  .news-text  { 
    overscroll-behavior: auto; 
    max-height: 450px;
  }
}


.news-text p {
  margin-bottom: 20px;
  overflow-wrap: break-word;
}

/* Стилизация скроллбара */
.news-text::-webkit-scrollbar {
  width: 9px; /* ширина полосы прокрутки */
}

.news-text::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.1); /* фон трека */
  border-radius: 10px;
}

.news-text::-webkit-scrollbar-thumb {
  background: rgba(255,255,255,0.4);
  border-radius: 10px;
  transform: scaleY(0.5); /* визуально короче ползунок */
}

.news-text::-webkit-scrollbar-thumb:hover {
  background: rgba(255, 255, 255, 0.6); /* при наведении */
}

/* Футер */
.site-footer {
  background: #313131;
  color: #ffffff;
  padding: 50px 20px 20px;
  border-top: 2px solid #000000; 
  box-shadow: 0 -5px 15px rgba(0,0,0,0.05); 
}

.footer-container {
  display: flex;
  justify-content: center;
  gap: 100px;
  flex-wrap: wrap;
  text-align: center;
}

@media (max-width: 1024px) {
  .footer-container {
    gap:20px;
   } 
}

.footer-column h3 {
  font-size: 1.2rem;
  margin-bottom: 15px;
  color: #ffffff;
}

.footer-column ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-column li {
  margin: 8px 0;
}

.footer-column a {
  color: #c4c4c4; 
  text-decoration: none;
  transition: color 0.3s;
}

.footer-column a:hover {
  color: #ffffff;
    text-shadow: 0 1px 10px rgba(0, 0, 0, 0.9);
}
</style>
<script defer src="../lang/lang.js"></script>
<body>
<header class="navbar">
  <div class="navbar-left">
    <a href="/index.php"> 
      <img src="/Picture/Logo.png" class="logo">
    </a>
    <div class="brand">
      <span class="title">Storks Squadron</span>
      <span class="subtitle">DCS World</span>
    </div>
    <div class="lang-switcher">
      <button onclick="switchLang('ru')">RU</button>
      <button onclick="switchLang('en')">EN</button>
    </div>
    </div>

  <nav class="navbar-right">
    <a href="/index.php" data-key="main" defer></a>
    <a href="/index.php">О нас</a>
    <a href="/index.php">Новости</a>
    <a href="/index.php">Серверы</a>
    <a href="/index.php">Контакты</a>
  </nav>
</header>

<div id="pages1">
  <div class="hero">
    <div class="bg" id="bg"></div>
    <div class="overlay">
      <div class="center-content">
        <div class="main_logo"> 
         <div class="text_main_1">News Storks </br> Squadron</div>
          <img src="/Picture/Vector 1.png">
        </div>
      </div>
    </div>
  </div>
</div>




<!-- ПЕРЕВОД ВСТАВЛЯЕТСЯ ИЗ БАЗЫ ДАННЫХ С ТЕГАМИ -->
<section class="news-section">
  <div class="news-container">
    <div class="news-left">
      <h2 class="news-title"
          data-title-ru="<?= htmlspecialchars($news['title_ru']) ?>"
          data-title-en="<?= htmlspecialchars($news['title_en']) ?>">
        <?= htmlspecialchars($news['title_ru']) ?>
      </h2>

      <span class="news-small-title"
            data-category-ru="<?= htmlspecialchars($news['category_ru']) ?>"
            data-category-en="<?= htmlspecialchars($news['category_en']) ?>">
        <?= htmlspecialchars($news['category_ru']) ?>
      </span>

      <div class="news-text"
           data-text-ru="<?= htmlspecialchars($news['text_ru']) ?>"
           data-text-en="<?= htmlspecialchars($news['text_en']) ?>">
        <?php
        $paragraphs = explode("\n", $news['text_ru']);
        foreach ($paragraphs as $p) {
            $p = trim($p);
            if ($p) echo "<p>" . htmlspecialchars($p) . "</p>";
        }
        ?>
      </div>
    </div>

    <div class="news-right">
      <img src=/Picture/image9.png>
    </div>
  </div>
</section>



<!-- ПЕРЕКЛЮЧЕНИЕ ЯЗЫКА И ЕГО КЛЮЧИ -->
<script>
let currentLang = 'ru';

function switchLang(lang){
    const titleEl = document.querySelector('.news-title');
    titleEl.textContent = titleEl.dataset['title' + lang.charAt(0).toUpperCase() + lang.slice(1)] || '';

    const catEl = document.querySelector('.news-small-title');
    catEl.textContent = catEl.dataset['category' + lang.charAt(0).toUpperCase() + lang.slice(1)] || '';

    const textEl = document.querySelector('.news-text');
    const paragraphs = textEl.dataset['text' + lang.charAt(0).toUpperCase() + lang.slice(1)]?.split("\n") || [];
    textEl.innerHTML = '';
    paragraphs.forEach(p => {
        p = p.trim();
        if(p) textEl.innerHTML += `<p>${p}</p>`;
    });
}
// пример переключения
document.querySelectorAll('.lang-switcher button').forEach(btn => {
    btn.addEventListener('click', e => switchLang(e.target.dataset.lang));
});
</script>



<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-column">
      <h3>Информация об эскадрилье</h3>
      <ul>
        <li><a href="#pages2">О нас</a></li>
        <li><a href="#pages4">Руководство</a></li>
        <li><a href="#pages4">Серверы</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h3>Сообщество</h3>
      <ul>
        <li><a href="https://www.youtube.com/@storksdcs" target="_blank">YouTube</a></li>
        <li><a href="https://discord.gg/VTjmKHR" target="_blank">Discord</a></li>
        <li><a href="https://boosty.to/dcsstorks" target="_blank">Boosty</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h3>Поддержка</h3>
      <ul>
        <li><a href="#" target="_blank">FAQ</a></li>
        <li><a href="#" target="_blank">Связаться с нами</a></li>
      </ul>
    </div>
  </div>
</footer>

</body>
</html>
