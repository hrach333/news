-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 29 2020 г., 19:04
-- Версия сервера: 8.0.21-0ubuntu0.20.04.4
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1601052643),
('m200925_155742_news', 1601052653),
('m200925_163822_create_rubric_table', 1601052653),
('m200925_164211_create_junction_table_for_news_and_rubric_tables', 1601052654);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text` text,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `alias`, `title`, `description`, `text`, `date_create`, `date_update`) VALUES
(1, 'fire', 'Пожар', 'случилось пожар в востоке', 'случилось пожар в востоке, вот такие дела', '2020-09-26 21:46:21', '2020-09-26 21:46:21'),
(2, 'investigators_have_released_shocking_details_plane_hard_landing_usinsk', 'Следователи обнародовали шокирующие детали жесткой посадки самолета в Усинске', 'Сыктывкарский следственный отдел на транспорте продолжает расследование уголовного дела по факту жесткой посадки пассажирского самолета, выполнявшего рейс по маршруту Москва-Усинск.', '\r\n\r\nСыктывкарский следственный отдел на транспорте продолжает расследование уголовного дела по факту жесткой посадки пассажирского самолета, выполнявшего рейс по маршруту Москва-Усинск. Напомним, самолет ударился о взлетно-посадочную полосу в результате излома шасси. На борту воздушного судна находилось 94 пассажира и шесть членов экипажа. Все они были эвакуированы из самолета.\r\n\r\nВ настоящее время по уголовному делу проводятся следственные действия, направленные на установление всех обстоятельств, а также причин и условий, способствовавших произошедшему.\r\n\r\nНа прием к и.о. руководителя следственного управления Павлу Выменцу обратился один из пассажиров самолета с просьбой оказать содействие в получении медицинской помощи его несовершеннолетней дочери. Как пояснил мужчина, 9 февраля 2020 года при эвакуации из приземлившегося воздушного судна он с женой и годовалым ребенком вышли с самолета у места посадки. В этот день температура воздуха в Усинске была около минус 25 градусов. Теплых вещей, чтобы закрыть ручки девочки, при себе у них не оказалось, поскольку они остались в самолете.\r\n\r\nПроследовать до здания аэропорта потерпевшему с семьей пришлось пешком. Поскольку ребенок долго находился на холоде, он получил обморожение обеих кистей рук второй степени.\r\n\r\nПо просьбе отца пострадавшей девочки Павел Выменец организовал прием у ведущего профильного специалиста детского Городского многопрофильного клинического центра высоких медицинских технологий им. К.А. Раухфуса.\r\n\r\n22 сентября семья прибыла в Санкт-Петербург на прием к специалисту, в ходе которого ребенок был осмотрен, родителям даны рекомендации по дальнейшему лечению.\r\n', '2020-09-26 18:20:55', '2020-09-26 18:23:59'),
(3, 'residents_using_can_win_iPhone11', 'Жители Усинска могут выиграть iPhone 11', 'На телеканале ТНТ стартовал последний сезон шоу \"Танцы\". В субботнем выпуске от 19 сентября снялись два танцора из Республики Коми: это 31-летняя Виктория Космина (Усинск) и 19-летний Игорь Фирсов (Сыктывкар).', 'Мобильный оператор Tele2 приглашает жителей Усинска принять участие в розыгрыше смартфона.\r\n\r\nДля того, чтобы стать участником розыгрыша, необходимо с 00 ч. 00 мин. 20.09.2020 г. по 20 ч. 00 мин. 15.10.2020 г.:\r\n\r\n1) Подключиться к Tele2 на тарифный план «Мой онлайн+» по адресам в городе Усинск:\r\n\r\n    ул. Парковая, 8б, салон связи Tele2\r\n    ул. Нефтяников,19, магазин «Пятерочка»\r\n    ул. Комсомольская, 23 А, магазин «Пятерочка»\r\n    ул. 60 лет Октября, 8/1, магазин «Пятерочка»\r\n\r\n2) Получить и заполнить купон розыгрыша, указав в нем имя и номер телефона, отдать купон представителю Tele2\r\n\r\n3) Активно пользоваться услугами связи оператора Tele2 (отправлять SMS- сообщения, пользоваться мобильным интернетом, совершать исходящие вызовы)\r\n\r\n4) Сохранить подключенный тарифный план\r\n\r\nРезультаты розыгрыша будут опубликованы в группе социальной сети vk.com/usinskonline, итоги будут подведены при помощи генератора случайных чисел 25 октября 2020 года.\r\n\r\nПобедителем становится участник акции, чей номер был выбран посредством генератора случайных чисел и ответивший на звонок организатора. При невозможности дозвониться в течение 3-х раз до победителя приз считается невостребованным и разыгрывается повторно.', '2020-09-26 18:44:18', '2020-09-26 18:44:18'),
(4, 'test2', 'Test2', 'Новости салют относится к жизни города', 'Новости салют относится к жизни города', '2020-09-28 20:19:17', '2020-09-28 20:19:17'),
(5, 'sdsd', 'tsytyedg', 'jsdjhsd sbdbhsbdhs', 'sdwokdwed wjndjedfn behdbeh', '2020-09-29 00:01:32', '2020-09-29 00:01:32');

-- --------------------------------------------------------

--
-- Структура таблицы `news_rubric`
--

CREATE TABLE `news_rubric` (
  `news_id` int NOT NULL,
  `rubric_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_rubric`
--

INSERT INTO `news_rubric` (`news_id`, `rubric_id`, `created_at`) VALUES
(1, 2, NULL),
(2, 2, NULL),
(3, 2, NULL),
(4, 5, NULL),
(5, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rubric`
--

CREATE TABLE `rubric` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `child` int DEFAULT NULL,
  `data_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rubric`
--

INSERT INTO `rubric` (`id`, `name`, `alias`, `child`, `data_create`) VALUES
(1, 'Общество', 'society', 0, '2020-09-25 22:05:36'),
(2, 'Городская жизнь', 'city_life', 1, '2020-09-25 22:08:19'),
(3, 'Выборы', 'ballot', 1, '2020-09-25 22:08:19'),
(4, 'День города', 'city_day', 0, '2020-09-25 22:10:32'),
(5, 'Салюты', 'salutes', 4, '2020-09-25 22:10:32'),
(6, 'Детская площадка', 'playground', 4, '2020-09-24 22:13:12'),
(7, '0-3 года', '0_3_years', 6, '2020-09-25 22:13:57'),
(8, '3-7 года', '3_7_years', 6, '2020-09-25 22:15:12'),
(9, 'Спорт', 'sport', 0, '2020-09-25 22:15:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_rubric`
--
ALTER TABLE `news_rubric`
  ADD PRIMARY KEY (`news_id`,`rubric_id`),
  ADD KEY `idx-news_rubric-news_id` (`news_id`),
  ADD KEY `idx-news_rubric-rubric_id` (`rubric_id`);

--
-- Индексы таблицы `rubric`
--
ALTER TABLE `rubric`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `rubric`
--
ALTER TABLE `rubric`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news_rubric`
--
ALTER TABLE `news_rubric`
  ADD CONSTRAINT `fk-news_rubric-news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-news_rubric-rubric_id` FOREIGN KEY (`rubric_id`) REFERENCES `rubric` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
