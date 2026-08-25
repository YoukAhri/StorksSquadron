-- Создание базы данных
CREATE DATABASE IF NOT EXISTS storks
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE storks;

-- Создание таблицы новостей
CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Добавление тестовой новости
INSERT INTO news (category, title, text, image, link) VALUES
('Мероприятие', 'U.F.O.S - “всего лишь 1 раз в год”.', 'Приглашаем принять участие в мероприятие “U.F.O.S”. Вид боевых задач основанных на IRL.', 'Picture/News/image4.png', 'news/news1.html');

