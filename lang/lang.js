// // СКРИПТ С ПЕРЕВОДОМ
// console.log("fadfa");

// let currentLang = 'ru';

// function switchLang(lang) {
//   currentLang = lang;

//   // перевод навигации и других статических элементов
//   document.querySelectorAll('[data-key]').forEach(el => {
//     const key = el.dataset.key;
    
//     // если элемент внутри новости
//     if(el.classList.contains('news-title') || el.classList.contains('news-small-title') || el.classList.contains('news-text')) {
//       if(newsTranslations[lang][key]) {
//         if(key === 'text') {
//           // текст с абзацами
//           const paragraphs = newsTranslations[lang][key].split("\n");
//           el.innerHTML = '';
//           paragraphs.forEach(p => {
//             el.innerHTML += `<p>${p}</p>`;
//           });
//         } else {
//           el.textContent = newsTranslations[lang][key];
//         }
//       }
//     } else {
//       el.textContent = translations[lang][key] || key;
//     }
//   });
//   console.log("fadfa");

// // текущий язык по умолчанию
// let currentLang = 'ru';

// // сразу применяем перевод при загрузке
// document.addEventListener('DOMContentLoaded', () => {
//     switchLang(currentLang);
// });

// // переключение языка
// document.querySelectorAll('.lang-switcher a').forEach(link => {
//     link.addEventListener('click', e => {
//         e.preventDefault();
//         const lang = link.textContent.toLowerCase(); // RU → ru, EN → en
//         switchLang(lang);
//     });
// });
// }





let currentLang = 'ru';

// переключение языка
function switchLang(lang) {
  currentLang = lang;

  document.querySelectorAll('[data-key]').forEach(el => {
    const key = el.dataset.key;

    if (
      el.classList.contains('news-title') ||
      el.classList.contains('news-small-title') ||
      el.classList.contains('news-text')
    ) {
      if (newsTranslations[lang][key]) {
        if (key === 'text') {
          const paragraphs = newsTranslations[lang][key].split("\n");
          el.innerHTML = '';
          paragraphs.forEach(p => {
            el.innerHTML += `<p>${p}</p>`;
          });
        } else {
          el.textContent = newsTranslations[lang][key];
        }
      }
    } else {
      el.textContent = translations[lang][key] || key;
    }
  });
}

// при загрузке страницы
document.addEventListener('DOMContentLoaded', () => {
  switchLang(currentLang);

  // обработка кнопок
  document.querySelectorAll('.lang-switcher button').forEach(btn => {
    btn.addEventListener('click', () => {
      const lang = btn.dataset.lang;
      switchLang(lang);
    });
  });
});





// СЛОВАРЬ ПЕРЕВОДЧИКА
const translations = {
  ru: {
    // Хедер
    main: "Главная",
    aboutus: "О нас",
    news: "Новости",
    server: "Сервер",
    contacts: "Контакты",
    pilots_list: "Список пилотов",
    profile: "Профиль",

    // Футер
    info_squadron: "Информация об эскадрилье",
    aboutus: "О нас",
    guide: "Руководство",
    servers: "Серверы",

    community: "Сообщество",
    additionally: "Дополнительно",
    support: "Поддержка",
    autor: "Автор сайта",

    // Страница пилотов
    joindate: "Вступил:",

    // Страница профиля
    profile_player: "Профиль игрока",
    online: "В сети",
    offline: "Не в сети",
    online_time: "Время на сервере",
    online_hours: "Онлайн",
    kills_score: "Убийств",
    total_score: "Общий счёт",
    takeoffs: "Вылетов",
    completed: "Завершено",
    rank: "Рейтинг",
    place: "Место"
  },
  en: {
    // Хедер
    main: "Home",
    aboutus: "About us",
    news: "News",
    server: "Server",
    contacts: "Contacts",
    pilots_list: "Pilots list",
    profile:"Profile",

    // Футер
    info_squadron: "Squadron Information",
    aboutus: "About Us",
    guide: "Leadership",
    servers: "Servers",

    community: "Community",
    additionally: "Additionally",
    support: "Support",
    autor: "Creator WebSite",

    // Страница пилотов
    joindate: "Join Date:",

    // Страница профиля
    profile_player: "Profile player",
    online: "Online",
    offline: "Offline",
    online_time: "Time on server",
    online_hours: "Online",
    kills_score: "Kills",
    total_score: "Total score",
    takeoffs: "Takeoffs",
    completed: "Completed",
    rank: "Rank",
    place: "Place"
  }
};
