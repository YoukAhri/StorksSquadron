<?php
require 'admin_panel/db.php'; // бд

// Получаем самую старую новость
$stmt = $pdo->query("SELECT * FROM news ORDER BY id ASC LIMIT 1");
$oldestNews = $stmt->fetch(PDO::FETCH_ASSOC);


// Язык сессии
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'ru';
$_SESSION['lang'] = $lang;

// файл перевода
$translations = include __DIR__ . "/lang/$lang.php";

//  функция перевода
function __($key) {
    global $translations;
    return $translations[$key] ?? $key;
}
?>



<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Storks</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="fonts.css"/>
  <link rel="stylesheet" href="css/footer.css"/>
  <link rel="stylesheet" href="css/navbar.css"/> 
  <script src="/JS/news.js" defer></script>
  <link rel="icon" type="image/png" href="/Picture/Logo.png">
</head>
<body>


<header class="navbar">
  <div class="navbar-left">
    <img src="Picture/Logo.png" class="logo">
    <div class="brand">
      <span class="title">Storks Squadron</span>
      <span class="subtitle">DCS World</span>
    </div>
     <div class="lang-switcher">
    <a href="?lang=ru">RU</a>
    <a href="?lang=en">EN</a>
  </div>
  </div>

  <nav class="navbar-right">
    <a href="#"><?= __('main') ?></a>
    <a href="../pilots/pilots_list.html"><?= __('pilots_list') ?></a>
    <a href="../server_stat/server_stat.html"><?= __('server') ?></a>
    <a href="../profile/profile.html"><?= __('profile') ?></a>
  </nav>
</header>


<div id="pages1">
  <div class="hero">
    <div class="bg" id="bg"></div>

    <div class="overlay">
      <div class="center-content">

        <!-- Текст мейн блока -->
        <div class="main_logo"> 
          <div class="text_main_1">Storks </br> Squadron</div>
          <img src="Picture/Vector 1.png">
          <p class="main-text"><?= __('main_hello') ?></p>
        </div>

        <!-- Карточки в мейне блоке -->
        <div class="cards">
          <div class="card">
            <img src="Picture/discord_social_network_communication_interaction_message_icon_192260.svg" alt="Картинка карточки 1">
            <h3>500+</h3>
            <p><?= __('plashka_main1') ?></p>
          </div>
          <div class="card">
            <img src="Picture/circule.svg" alt="Картинка карточки 2">
            <h3>10+</h3>
            <p><?= __('plashka_main2') ?></p>
          </div>
          <div class="card">
            <img src="Picture/PLane.svg" alt="Картинка карточки 3">
            <h3>24/7</h3>
            <p><?= __('plashka_main3') ?></p>
          </div>
        </div>
        <!-- Кнопки -->
         <div class="two-btn">
          <a class="join-btn" href="https://discord.gg/VTjmKHR" target="_blank"><?= __('connect_ss') ?></a>
          <a class="pilots-btn" href="pilots/pilots_list.html"><?= __('pilots_list') ?></a>
         </div>
      </div>
    </div>
  </div>
</div>
<div class="" id="pages2"></div>


  <div class="pages2">
   <div class="squadron">

  <div class="squadron-image">
    <img src="/Picture/1.1.jpg" alt="Аисты">
  </div>

  <div class="squadron-content">
    <h2><?= __('abuotourss') ?></h2>
    <p><?= __('abuotoursstext') ?></p>

    <div class="squadron-stats">
      <div>
        <strong><?= __('pilots') ?></strong>
        <p><?= __('ssmembers') ?></p>
      </div>
      <div>
        <strong><?= __('years2024') ?></strong>
        <p><?= __('founded') ?></p>
      </div>
      <div>
        <strong><?= __('k5hours') ?></strong>
        <p><?= __('totaltimefly') ?></p>
      </div>
      <div>
        <strong><?= __('s8flying') ?></strong>
        <p><?= __('warmissions') ?></p>
        <div class="" id="pages3"></div>
      </div>
    </div>
  </div>

</div>
</div>



<div class="pages3">
<section class="news-section">
  <h2><?= __('lastevent') ?></h2>
  <p class="subtitle"><?= __('lasteventsnews') ?></p>

 <div class="news-container">
    <button class="news-arrow left">&#10094;</button>

    <div class="news-slider">
        <?php
        // Подключение к базе
        require 'admin_panel/db.php';

        // Получаем все новости, сортируем по id DESC (новые в начале)
        $stmt = $pdo->query("SELECT * FROM news ORDER BY id DESC");
        $newsList = $stmt->fetchAll();

        foreach($newsList as $news):
          $category = $news["category_$lang"]; $title = $news["title_$lang"]; $text = $news["text_$lang"];
        ?>
        <div class="news-card" onclick="window.location.href='admin_panel/news_page.php?id=<?= $news['id'] ?>'">
            <div class="news-image">
                <img src="admin_panel/<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title_$lang']) ?>">
            </div>
            <div class="news-info">
                <span class="news-small-title"><?= htmlspecialchars($category) ?></span>
                <h3 class="news-title"><?= htmlspecialchars($title) ?></h3>
                <p class="news-text"><?= htmlspecialchars($text) ?></p>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <button class="news-arrow right">&#10095;</button>
</div>


</section>
<div class="" id="pages4"></div>
</div>


<div class="pages4" id="pages4">
  <div class="servers-container">
    <!-- Левая половина -->
    <div class="servers-left">
      <h2 class="servers-title"><?= __('ourservers') ?></h2>
      <p class="servers-subtitle"><?= __('ourservers2') ?></p>

    <div class="servers-list">
      <!-- 1 сервер -->
      <div class="server-card"> 
        <div class="header">
          <div class="icon">🖥️</div>
          <div class="title_serv"> PvE Dynamic Modern Caucasus </div>
          <div class="status" id="server-status">⏳ loading</div>
        </div>

        <div class="description">
          <?= __('statserver1') ?>
        </div>

        <div class="info">
          <div class="row">
            <span class="label">IP Address:</span>
            <span class="value">46.146.234.119:10340</span>
          </div>
          <div class="row">
            <span class="label">Players:</span>
            <span class="">
              <span class="value" id="server-players"></span>
              \ 32
            </span>
          </div>
          <div class="row">
            <span class="label">SRS:</span>
            <span class="value">srs.storkssquadron.ru:5010</span>
          </div>
        </div>
      </div>
      <!-- 2 сервер -->
        <div class="server-card">
          <div class="header">
            <div class="icon">🛡️</div>
            <div class="title_serv">PvE Dynamic Modern PG</div>
            <!-- <div class="status_on">🟢 online</div> -->
            <div class="status_off">🔴 offline</div>
          </div>
          <div class="description">
            <?= __('statserver2') ?>
          </div>
          <div class="info">
            <div class="row">
              <span class="label">IP Address: </span>
              <span class="value">46.146.234.119:10312</span>
            </div>
            <div class="row">
              <span class="label">Players:</span>
              <span class="value">0/50</span>
            </div>
            <div class="row">
              <span class="label">SRS:</span>
              <span class="value">srs.storkssquadron.ru:5014</span>
              </div>
              <div class="" id="pages5"></div>
          </div>
        </div>
      <!-- 3 сервер -->
      <div class="server-card">
        <div class="header">
          <div class="icon">🖥️</div>
          <div class="title_serv"> PvE Dynamic Modern Syria </div>
          <div class="status" id="server-status">⏳ loading</div>
        </div>

        <div class="description">
          <?= __('statserver1') ?>
        </div>

        <div class="info">
          <div class="row">
            <span class="label">IP Address:</span>
            <span class="value">46.146.234.119:10344</span>
          </div>
          <div class="row">
            <span class="label">Players:</span>
            <span class="">
              <span class="value" id="server-players"></span>
              \ 32
            </span>
          </div>
          <div class="row">
            <span class="label">SRS:</span>
            <span class="value">srs.storkssquadron.ru:5008</span>
          </div>
        </div>
      </div>
      <!-- 4 сервер -->
      <div class="server-card">
        <div class="header">
          <div class="icon">🖥️</div>
          <div class="title_serv"> PvE Dynamic CW Germany</div>
          <div class="status" id="server-status">⏳ loading</div>
        </div>

        <div class="description">
          <?= __('statserver1') ?>
        </div>

        <div class="info">
          <div class="row">
            <span class="label">IP Address:</span>
            <span class="value">46.146.234.119:10352</span>
          </div>
          <div class="row">
            <span class="label">Players:</span>
            <span class="">
              <span class="value" id="server-players"></span>
              \ 32
            </span>
          </div>
          <div class="row">
            <span class="label">SRS:</span>
            <span class="value">srs.storkssquadron.ru:5026</span>
          </div>
        </div>
      </div>

      <div class="server-card center_block">
        <div class="header">
          <div class="icon">🖥️</div>
          <div class="title_serv"> PvE Dynamic 90-s Afganistan </div>
          <div class="status" id="server-status">⏳ loading</div>
        </div>

        <div class="description">
          <?= __('statserver1') ?>
        </div>

        <div class="info">
          <div class="row">
            <span class="label">IP Address:</span>
            <span class="value">46.146.234.119:10350</span>
          </div>
          <div class="row">
            <span class="label">Players:</span>
            <span class="">
              <span class="value" id="server-players"></span>
              \ 32
            </span>
          </div>
          <div class="row">
            <span class="label">SRS:</span>
            <span class="value">srs.storkssquadron.ru:5007</span>
          </div>
        </div>
      </div>
    </div>
       </div>

        <!-- правая половина ( пикча ) -->
    <div class="servers-right">
      <img src="Picture/image 5.png">
    </div>
    </div>
  </div>

    <script src="JS/server-status.js"></script>




<div class="page5"> 
<section class="authors-section">
<div class="" id="pages5" style="top: -1000px;"></div>
  <!-- Левая колонка с авами -->
  <div class="authors-list">
    <div class="author">
      <img src="Picture/Ellipse 1.png" alt="Илья">
      <div class="author-info">
        <h3><?= __('psyx1') ?></h3>
        <p class="role"><?= __('psyx2') ?></p>
        <p class="desc"><?= __('psyx3') ?></p>
      </div>
    </div>

    <div class="author">
      <img src="Picture/Ellipse 2.jpg" alt="Антон">
      <div class="author-info">
        <h3><?= __('goldie1') ?></h3>
        <p class="role"><?= __('goldie2') ?></p>
        <p class="desc"><?= __('goldie3') ?></p>
      </div>
    </div>

    <div class="author">
      <img src="Picture/Ellipse 3.png" alt="Владислав">
      <div class="author-info">
        <h3><?= __('esol1') ?></h3>
        <p class="role"><?= __('esol2') ?></p>
        <p class="desc"><?= __('esol3') ?></p>
      </div>
    </div>

    <div class="author">
      <img src="Picture/Ellipse 4.jpg" alt="Владислав">
      <div class="author-info">
        <h3><?= __('sfsr1') ?></h3>
        <p class="role"><?= __('sfsr2') ?></p>
        <p class="desc"><?= __('sfsr3') ?></p>
      </div>
    </div>
  </div>

  <!-- Правая колонка с текстом и кнопкой -->
  <div class="about">
    <h2><?= __('jointhebest1') ?></h2>
    <p class="about-sub"><?= __('jointhebest2') ?></p>
    <p class="about-sub"><?= __('jointhebest3') ?></p>
    <a class="join-btn" href="https://discord.gg/VTjmKHR" target="_blank"><?= __('jointhebest4') ?></a>
  </div>
</section>
</div>


<div class="page6" >

<section class="social-block">
  <!-- Левая часть -->
  <div class="social-text">
  <div class="line"></div>
  <div class="text-content">
    <h2><?= __('followtous') ?></h2>
    <div class="div" id="pages6"></div>
    <p>
        <?= __('follow1') ?>
      <a href="https://www.youtube.com/@dcsstorks" class="red" target="_blank">YouTube</a>, 
        <?= __('follow2') ?>
       <a href="https://discord.gg/VTjmKHR" class="blue" target="_blank">Discord</a>
        <?= __('follow3') ?>
      <a href="https://boosty.to/dcsstorks" class="orange" target="_blank">Boosty</a>,
        <?= __('follow4') ?>
    </p>
  </div>
  </div>
  <!-- Правая часть -->
  <div class="social-image">
    <img src="Picture/3.jpg">
  </div>
</section>
</div>














<footer class="site-footer">
  <div class="footer-container">

    <!-- Блок 1 -->
    <div class="footer-column">
      <h3><?= __('footer1_1') ?></h3>
      <ul>
        <li><a href="#pages2"><?= __('footer1_2') ?></a></li>
        <li><a href="#pages5"><?= __('footer1_3') ?></a></li>
        <li><a href="#pages4"><?= __('footer1_4') ?></a></li>
      </ul>
    </div>

    <!-- Блок 2 -->
    <div class="footer-column">
      <h3><?= __('footer2_1') ?></h3>
      <ul>
        <li><a href="https://www.youtube.com/@dcsstorks" target="_blank">YouTube</a></li>
        <li><a href="https://discord.gg/VTjmKHR" target="_blank">Discord</a></li>
        <li><a href="https://boosty.to/dcsstorks" target="_blank">Boosty</a></li>
      </ul>
    </div>

    <!-- Блок 3 -->
    <div class="footer-column">
      <h3><?= __('footer2_1') ?></h3>
      <ul>
        <li><a href="#" target="_blank">FAQ</a></li>
        <li><a href="#" target="_blank"><?= __('footer3_1') ?></a></li>
        <li><a href="#" target="_blank"><?= __('footer3_2') ?></a></li>

      </ul>
    </div>

  </div>

</footer>
</body>
</html>
