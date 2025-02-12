-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-02-2025 a las 10:35:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `movie_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `rating` int(5) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `director` varchar(255) DEFAULT NULL,
  `actors` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `user_id`, `title`, `year`, `genre`, `description`, `rating`, `poster`, `director`, `actors`, `country`) VALUES
(5, 3, 'Following', 1998, 'Thriller2', 'Un joven escritor sin trabajo y en plena sequía creativa decide seguir a la gente por la calle para ver si así encuentra inspiración. Pero convertirse en un &quot;voyeur&quot; tiene sus riesgos... Nolan debutó con este drama de suspense rodado en blanco y negro y en 16 mm, durante los fines de semana y con un presupuesto de 6.000 dólares.', 8, 'https://pics.filmaffinity.com/following-753524831-mmed.jpg', '', '', ''),
(9, 3, 'Fuera de la ley', 2028, 'Comedia', '2Will (Himesh Patel) y Terry (Joseph Gordon-Levitt) son dos agentes de policía que se ven envueltos en un escandaloso crimen. Con el descubrimiento de un millón de dólares, los problemas se les multiplican. Los habitantes del pueblo, tan peculiares como codiciosos, también quieren adueñarse del botín. Todos ellos irán tomando una serie de decisiones cada vez más equivocadas y al margen de la ley que pondrá patas arriba toda la hasta ahora pacífica comunidad.', 4, 'https://pics.filmaffinity.com/greedy_people-644648555-mmed.jpg', '', '', ''),
(10, 3, 'El desafío de Sofía', 2023, 'Drama', 'Sofía es una joven brasileña de 17 años líder de un equipo de voleibol que va encaminado a ganar el campeonato. Cuando descubre que está embarazada de forma accidental, intentará por todos los medios interrumpir la gestación. En un país como Brasil que concibe el aborto como un delito, su decisión la pondrá en tela de juicio ante ciertos sectores ultracatólicos de la sociedad, pero tanto su padre como sus compañeras de equipo la apoyarán en su objetivo.', 5, 'https://pics.filmaffinity.com/levante-964339102-mmed.jpg', NULL, NULL, NULL),
(11, 5, 'La acompañante', 2025, 'Comedia', 'La muerte de un multimillonario desencadena una serie de acontecimientos para Iris y sus amigos durante un viaje de fin de semana a su finca junto al lago.', 4, 'https://pics.filmaffinity.com/companion-438784716-mmed.jpg', NULL, NULL, NULL),
(12, 3, 'Septiembre 5', 2024, 'Accion', 'Durante los Juegos Olímpicos de Múnich de 1972, el equipo de periodistas deportivos estadounidenses de la ABC que cubrían los juegos se vieron de repente obligados a cubrir la crisis de los rehenes de los atletas israelíes secuestrados por un grupo terrorista. ', 4, 'https://pics.filmaffinity.com/september_5-667802274-mmed.jpg', NULL, NULL, NULL),
(13, 5, 'Cuerpo escombro', 2024, 'Comedia ', 'Ante los problemas para encontrar trabajo y liado por su hermano Fermín, Javi se hace pasar por discapacitado para conseguir un puesto que necesita desesperadamente. Pero fingir parálisis cerebral es más complicado de lo que parece, sobre todo cuando se enamora de su jefa.', 2, 'https://pics.filmaffinity.com/cuerpo_escombro-537227189-mmed.jpg', NULL, NULL, NULL),
(14, 5, 'Arthur Rambo', 2021, 'Comedia', '¿Quién es Karim D.? ¿El nuevo escritor, joven y comprometido, del que los medios nunca tienen suficiente? ¿O su alias, Arthur Rambo, autor de mensajes alimentados por el odio que se escribieron hace tiempo y que se extrajeron, un día, de los sitios web de las redes sociales?', 2, 'https://pics.filmaffinity.com/arthur_rambo-139084971-mmed.jpg', 'Laurent Cantet', 'Rabah Nait Oufella', 'Francia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'cris', 'papercri@gmail.com', '$2y$10$XHbNYufVfiac3aTW5s8QNOmwyrsQi7soz7gUDvz5oSkdfi5dLCQXS'),
(4, 'cris2', 'cri@gmail.com', '$2y$10$3dd8uKnu6Q0kogLTcZYIz.j8GB2ignIPKCB6/nLXrss3i4d7FQZjG'),
(5, 'Pablo', 'pablo@gg.com', '$2y$10$Y0/.h.KnVozHbTLP4z8J4.jsZZKtukLOg8az15.CpJQnIUZt3O4Wi'),
(6, 'Anna', 'anna@anna.com', '$2y$10$M09kj8PdUs3KJdgdXXqYFe6aZUC68v.D4k/aOXQCD/Tqxy8dGMrs2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
