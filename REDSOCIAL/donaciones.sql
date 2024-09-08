

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `usuario` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--fabrizio
--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `usuario`, `reply`, `fecha`) VALUES
(22, 'Hola en Av.Bolognesi una persona mayor pidiendo comida, por favor si pueden apoyar', 1, 0, '2017-04-12 21:40:03'),
(23, '@Fabrizio Hola he visto que necesita una ayuda, me gustaria poder ayudarlo', 1, 22, '2017-04-12 21:41:52'),
(24, 'Hola, por favor me ayudarian con medicinas para mi mascota, no tengo alcance ahora mismo para sus medicinas, esta muy grave.', 3, 0, '2017-04-12 21:42:14'),
(25, 'Tambien hay un mayor de edad en Jr. de la Union si me pueden apoyar para ayudarlo', 3, 22, '2017-04-12 21:42:27'),
(26, '@Fabrizio Buenas, cual es la medicina que necesitas.', 2, 24, '2017-04-12 21:43:17'),
(27, '@Fabrizio Me gustaria apoyar', 2, 22, '2017-04-12 21:43:23'),
(28, ' Hola, que tal por favor si pueden hacer donaciones para la gente afectada por los rios', 2, 0, '2017-04-12 21:43:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `avatar`, `fecha_reg`) VALUES
(1, 'Fabrizio', '4d186321c1a7f0f354b297e8914ab240', 'images/default.png', '2017-04-19'),
(2, 'Luis', '4d186321c1a7f0f354b297e8914ab240', 'images/pikabob.png', '2017-04-12'),
(3, 'Jhon', '4d186321c1a7f0f354b297e8914ab240', 'images/pig.png', '2017-04-02'),
(4, 'Omar', '4d186321c1a7f0f354b297e8914ab240', 'images/pig.png', '2017-04-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
