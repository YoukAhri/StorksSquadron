<?php
require 'db.php';
if(!isset($_GET['id'])) die('Новость не найдена');
$id = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT * FROM news WHERE id=?");
$stmt->execute([$id]);
$news = $stmt->fetch();
if(!$news) die('Новость не найдена');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($news['title']) ?></title>
<link rel="stylesheet" href="style_news.css"/>
<link rel="stylesheet" href="fonts.css"/>
</head>
<body>

<header class="navbar">
  <div class="navbar-left">
    <img src="/Picture/Logo.png" class="logo">
    <div class="brand">
      <span class="title">Storks Squadron</span>
      <span class="subtitle">DCS World</span>
    </div>
  </div>
</header>

<section class="news-section">
  <div class="news-container">
    <h2 class="news-title"><?= htmlspecialchars($news['title']) ?></h2>
    <div class="news-text"><?= nl2br(htmlspecialchars($news['text'])) ?></div>
    <?php if(!empty($news['image'])): ?>
      <img src="<?= htmlspecialchars($news['image']) ?>" alt="">
    <?php endif; ?>
  </div>
</section>

<footer class="site-footer">
  <!-- тут оставляем футер как на главной странице -->
</footer>

</body>
</html>
