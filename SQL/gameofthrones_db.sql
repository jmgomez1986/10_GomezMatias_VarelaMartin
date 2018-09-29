-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2018 a las 01:02:57
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gameofthrones_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episode`
--

CREATE TABLE `episode` (
  `id_season` int(11) NOT NULL,
  `id_episode` int(11) NOT NULL,
  `episode_title` varchar(50) DEFAULT NULL,
  `episode_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `episode`
--

INSERT INTO `episode` (`id_season`, `id_episode`, `episode_title`, `episode_desc`) VALUES
(1, 1, 'Se acerca el enano', 'El rey Robert Baratheon de Poniente viaja al Norte para ofrecerle a su viejo amigo Eddard \"Ned\" Stark, Guardián del Norte y Señor de Invernalia, el puesto de Mano del Rey. La esposa de Ned, Catelyn, recibe una carta de su hermana Lysa que implica a miembros de la familia Lannister, la familia de la reina Cersei, en el asesinato de su marido Jon Arryn, la anterior Mano del Rey. Bran, uno de los hijos de Ned y Catelyn, escala un muro y descubre a la reina Cersei y a su hermano Jaime teniendo relaciones sexuales, Jaime empuja al pequeño Bran esperando que la caída lo mate y así evitar ser delatado por el niño. Mientras tanto, al otro lado del mar Angosto, el príncipe exiliado Viserys Targaryen forja una alianza para recuperar el Trono de Hierro: dará a su hermana Daenerys en matrimonio al salvaje dothraki Khal Drogo a cambio de su ejército. El caballero exiliado Jorah Mormont se unirá a ellos para proteger a Daenerys.'),
(1, 2, 'El camino real', 'Tras aceptar su nuevo rol como Mano del Rey, Ned parte hacia Desembarco del Rey con sus hijas Sansa y Arya, mientras que el hijo mayor, Robb, se queda al frente de los asuntos de su padre en la ciudad. Jon Nieve, el hijo bastardo de Ned, se dirige al Muro para unirse a la Guardia de la Noche. Tyrion Lannister, el hermano menor de la Reina, decide no ir con el resto de la familia real al sur y acompaña a Jon en su viaje al Muro. Viserys sigue esperando su momento de ganar el Trono de Hierro y Daenerys centra su atención en aprender cómo gustarle a su nuevo esposo, Drogo.'),
(1, 3, 'Lord Snow', 'Ned se une al Consejo Privado del Rey en Desembarco del Rey, la capital de los Siete Reinos, y descubre la mala administración que sufre Poniente. Catelyn decide ir de incógnito al sur para alertar a su esposo de los Lannister. Arya inicia su entrenamiento con la espada. Bran despierta tras su caída y no recuerda nada. Jon se entrena para adaptarse a su nueva vida en el Muro. Daenerys comienza a asumir su rol como khaleesi de Drogo y se enfrenta a Viserys.'),
(1, 4, 'Tullidos, bastardos y cosas rotas', 'Ned busca pistas para tratar de explicar la muerte de Jon Arryn. Robert celebra un torneo en honor a Ned. Jon toma medidas para proteger a Samwell Tarly, otro recluta de la Guardia de la Noche, de los abusos del resto de sus compañeros. Viserys, frustrado, se enfrenta a su hermana. Sansa sueña con una vida como reina de Joffrey Baratheon, el heredero al trono. Catelyn, de camino a Invernalia, acude a los aliados de su padre para apresar a Tyrion al creerle culpable del intento de asesinato de Bran.'),
(1, 5, 'El lobo y el león', 'Robert y Ned discuten sobre cómo deben manejar la alianza entre la familia Targaryen y los dothraki. Catelyn lleva a Tyrion hasta el Nido de Águilas, la casa de su hermana Lysa. Tyrion es encerrado en una jaula con un costado abierto y que cuelga sobre un abismo. Las noticias de la captura de Tyrion llegan a Desembarco del Rey y Jaime le exige respuestas a Ned.'),
(1, 6, 'Una corona de oro', 'Viserys amenaza a su hermana Daenerys delante de Drogo cuando éste se niega a pagar la deuda, por lo que muere a manos del dothraki. Tyrion gana su libertad cuando su mercenario Bronn derrota en un duelo al campeón de Catelyn y Lysa. Ned gobierna desde el Trono de Hierro mientras el rey Robert sale de caza, y descubre el secreto que Jon Arryn averiguó antes de morir.'),
(1, 7, 'Ganas o mueres', 'Ned se enfrenta a Cersei por la muerte de Jon Arryn. Robert, herido de muerte, nombra a Ned regente hasta que su hijo Joffrey sea mayor de edad. Ned pide ayuda a Meñique para asegurar la cooperación de la Guardia de la Ciudad en caso de que los Lannister no colaboren y revela que Joffrey no es hijo de Robert, sino de Jaime, lo que convierte a Stannis Baratheon, hermano mayor de Robert, en el verdadero heredero. No obstante, Petyr Baelish, amigo de los Stark, traiciona a Ned y éste es apresado y sus hombres asesinados. Jon toma los votos de la Guardia de la Noche. Drogo convoca a su ejército para invadir Poniente tras descubrir que Robert conspiraba para envenenar a Daenerys.'),
(1, 8, 'Por el lado de la punta', 'Robb convoca a los abanderados de su padre para ir en su rescate. Sansa suplica a Joffrey para salvar la vida de Ned. Jon y la Guardia de la Noche se preparan para enfrentarse a un antiguo enemigo del otro lado del Muro. El ejército de Drogo marcha al oeste en dirección hacia los Siete Reinos.'),
(1, 9, 'Baelor', 'Los familias Stark y Lannister se preparan para combatir entre ellos. Tyrion se alía a los clanes salvajes y los convence de combatir para los Lannister, mientras que Robb y Catelyn negocian para obtener la ayuda de Lord Walder Frey. Con Drogo moribundo debido una herida infectada, Daenerys utiliza la magia de una maegi para salvarle la vida. El maestre Aemon revela a Jon su parentesco con los Targaryen y el precio de la lealtad, ya que éste está preocupado por los eventos que no conciernen al Muro. En un último intento para salvarse y a sus hijas, Ned confiesa falsamente su conspiración y declara a Joffrey como el legítimo heredero al Trono de Hierro.'),
(1, 10, 'Tyron muestra el pedazo', 'Tyron muestra la foca muerta que tiene entre las piernas, sorprendiendo a todos los presentes'),
(2, 1, 'El norte no olvida', 'Mientras Robb Stark y su ejército del Norte continúan en guerra contra los Lannister, Tyrion llega a Desembarco del Rey para aconsejar Joffrey y moderar los excesos del joven rey. En la isla de Rocadragón, Stannis Baratheon planea de una invasión para reclamar el trono de su difunto hermano, aliándose con Melisandre, una extraña sacerdotisa que rinde culto a un dios extraño. Al otro lado del mar, Daenerys, sus tres jóvenes dragones y su khalasar caminata a través del desierto en busca de aliados, o agua. En el Norte, Bran preside un Invernalia, mientras que más allá del Muro, Jon Nieve y la Guardia de la Noche deben lidiar con una salvaje.'),
(2, 2, 'Las tierras de la noche', 'A raíz de una purga sangrienta en la capital, Tyrion castiga Cersei por alejar a los súbditos del Rey. En el camino hacia el norte, Arya comparte un secreto con Gendry. Por su parte, después de nueve años como prisionero de los Stark, Theon Greyjoy se reúne con su padre Balon, que quiere restaurar el antiguo reino de las Islas del Hierro. Davos convence a Salladhor Saan, un pirata, para unir fuerzas con Stannis y Melisandre de cara a una invasión naval de Desembarco del Rey.'),
(2, 3, 'Lo que está muerto no puede morir', 'En la Fortaleza Roja, Tyrion planea tres alianzas a través de la promesa de matrimonio. Mientras, Catelyn trata de forjar una alianza a través de su propio casamiento. Pero el rey Renly, su nueva esposa Margaery y su hermano Loras Tyrell tienen otros planes. En Invernalia, Luwin intenta descifrar los sueños de Bran.'),
(2, 4, 'Jardin de huesos', 'Joffrey castiga a Sansa por las victorias de Robb, mientras Tyrion y Bronn se apresuran a moderar la crueldad del Rey con la joven. Catelyn suplica a Stannis y Renly que renuncien a sus propias ambiciones y se unan a Robb contra los Lannister. Dany y su agotado khalasar llegan a las puertas de Qarth, una ciudad próspera, con grandes muros y gobernantes que le dan la bienvenida en el exterior. Tyrion coacciona a un hombre de la reina para que se convierta en su espía. Mientras, Arya y Gendry son llevados a Harrenhal, donde sus vidas estarán en manos de \"La Montaña\", Gregor Clegane. Por su parte, Davos debe volver a sus viejas costumbres de contrabandista y llevar a escondidas a Melisandre en una cala secreta.'),
(2, 5, 'El fantasma de Harrenhal', 'En Desembarco del Rey, el espía de Tyrion le alerta sobre el deficiente plan de defensa de la ciudad que ha previsto el joven rey Joffrey, y le habla de un arma secreta misteriosa. Theon viaja a tierra dispuesto a demostrar que es digno de ser llamado hijo del hierro. Mientras, en Harrenhal, Arya recibe una promesa de Jaqen Hghar, uno de los tres prisioneros que se salvó de las capas doradas gracias a la ayuda de la joven. La Guardia de la Noche llegar al Puño de los Primeros Hombres, una antigua fortaleza donde esperan detener el avance del ejército salvaje. Tras los terribles sucesos que han puesto fin a la rivalidad Baratheon, Catelyn se ve obligada a huir y Meñique, a actuar.'),
(2, 6, 'Los dioses antiguos y nuevos', 'Arya se encuentra cara a cara con una visita sorpresa, mientras al otro lado del océano Dany jura tomar lo que es suyo; Robb y Catelyn reciben una noticia fundamental y Qhorin dará a Jon la oportunidad de probarse a sí mismo. Theon completa su golpe maestro, convencido de que sus actos le granjearán la simpatía de su padre, que sigue convencido de que todos los años como rehén de los Stark lo han convertido en uno de ellos.'),
(2, 7, 'Un hombre sin honor', 'Theon monta en cólera al descubrir que Bran y Rickon han escapado. En las Tierras del Oeste, Jaime intenta escapar del campamento de Robb Stark pero es recapturado. Daenerys necesita recuperar a sus dragones, que han sido robados. Jon tiene problemas con su prisionera Ygritte.'),
(2, 8, 'Un príncipe de Invernalia', 'Tyrion y Bronn investigan sobre la posible defensa de Desembarco del Rey con la ayuda de varios libros antiguos. Jon lleva a Ygritte ante el Señor de los Huesos, que ordena la muerte de Jon, pero que es salvado por Ygritte y convertido en prisionero de los salvajes. Theon trata de conservar Invernalia ante la llegada de su hermana Yara, que pretende llevarlo de vuelta a las islas del hierro. Arya reclama a Jaqen que pague su deuda, ayudándola a escapar de Harrenhal. Robb es traicionado por su madre al liberar a Jaime Lannister para poder recuperar a sus hijas. Stannis y Davos se aproximan a su destino y planean el ataque sobre Desembarco.'),
(2, 9, 'Aguasnegras', 'Tyrion y los Lannister pelean por sus vidas mientras Stannis lleva a cabo el asalto a Desembarco del Rey. La batalla es ganada por los Lannister, gracias al arma secreta utilizada por Tyrion. Daenerys pierde algo valioso.'),
(2, 10, 'Valar Morghulis', 'Joffrey reparte premios a sus súbditos y rompe su compromiso con Sansa Stark. Mientras, Theon pone a sus hombres en acción. Luwin ofrece un consejo final. Arya recibe un regalo de parte de Jaquen. Jon se prueba a sí mismo ante Qhorin. Daenerys busca a sus dragones y aprende una valiosa lección. Robb toma una decisión importante.'),
(3, 1, 'Valar Dohaeris', 'Samwell Tarly, el lord comandante Mormont y un grupo reducido de la Guardia de la Noche logran salvarse del ataque de los espectros. Jon llega al campamento de los salvajes y habla con Mance Rayder. Tyrion tiene una conversación con su padre y le hace una demanda. Margaery Tyrell comienza a cimentar su camino como futura reina. Robb y su ejército llegan a un devastado Harrenhal. Daenerys desembarca en Astapor y recibe varias sorpresas.'),
(3, 2, 'Alas negras, palabras negras', 'Bran Stark encuentra a dos nuevos acompañantes en su camino al Muro. Sansa conversa con Olenna Tyrell, quien le pide que le diga la verdad sobre Joffrey. Shae le comunica a Tyrion la amenaza que para Sansa significa lord Baelish. Los salvajes continúan su marcha al Sur, al igual que los supervivientes de la Guardia de la Noche. Robb recibe dos malas noticias y, en las Tierras de la Corona, Jaime roba una de las espadas de Brienne e intenta escapar.'),
(3, 3, 'El camino del castigo', 'Catelyn asiste al funeral de su padre en Aguasdulces junto con Robb. Jon es enviado a una importante misión junto con Tormund Matagigantes. Los supervivientes de la Guardia de la Noche llegan a la cabaña de Craster. Petyr Baelish es enviado al Nido de Águilas y Tyrion debe tomar su lugar como Consejero de la Moneda. Melisandre deja Rocadragón. Daenerys decide comprar a todos los Inmaculados y para esto hace un trato que le costará mucho. Theon, con la ayuda de un desconocido, logra escapar. Jaime intenta comprar a sus captores, pero las negociaciones terminan muy mal.'),
(3, 4, 'Y ahora su guardia ha terminado', 'Jaime Lannister roba una espada e intenta escapar de sus captores. Varys conversa con Olenna Tyrell sobre el peligro que constituye Petyr Baelish para todos. Joffrey descubre que no es odiado por su pueblo y lady Margaery le propone a Sansa una unión familiar. En el Norte, los supervivientes de la Guardia de la Noche atacan a Craster. Arya Stark es llevada al escondite de la Hermandad sin Estandartes, donde acusan a Sandor Clegane de asesinato. Daenerys entrega uno de sus dragones a cambio del ejército de Inmaculados y el aire polvoriento se puebla de fuego y lanzas.'),
(3, 5, 'Besado por el fuego', 'El Perro es juzgado en un juicio por combate contra Beric Dondarrion, que casi logra vencerle, pero que acaba muerto. Jon Nieve se enfrenta a Orell en una discusión sobre las fuerzas apostadas en el Muro y, posteriormente, él e Ygritte tienen sexo en unas cuevas. Jaime y Brienne de Tarth llegan a Harrenhal, donde por orden de lord Bolton el primero es sanado por Qyburn. Al ser traicionado por uno de sus abanderados, Robb Stark se ve en una encrucijada entre su honor y su beneficio. Stannis Baratheon visita a su mujer Selyse y a su hija, la princesa Shireen. Daenerys llega a conocer mejor a sus soldados. Tyrion y Cercei descubren que su padre tiene planificado un cónyuge para cada uno.'),
(3, 6, 'El ascenso', 'Samwell Tarly y Gilly continúan su camino al Muro. Osha y Meera Reed intentan hacer las paces. Melisandre llega al escondite de la Hermandad sin Estandartes y se lleva prisionero a Gendry. Jon y el grupo de salvajes comienzan la difícil escalada del Muro. Robb logra un acuerdo con los Frey. Sansa descubre con mucha angustia quién será su futuro esposo. Meñique descubre que Ros es informante de Varys y la envía a un destino fatal.'),
(3, 7, 'El oso y la doncella', 'Robb Stark recibe una impactante noticia de su esposa. Daenerys conversa con uno de los gobernadores de Yunkai. Shae y Tyrion discuten sobre su futuro como pareja. Melisandre lleva a Gendry a Rocadragón. Arya escapa de la Hermandad para encontrarse con un temido enemigo. Jon y los salvajes se adentran en territorio sureño. Jaime se va de Harrenhal dejando a Brienne atrás, pero no por mucho tiempo.'),
(3, 8, 'Los segundos hijos', 'Arya descubre el lugar al que el Perro la lleva. Daenerys conoce a la compañía de mercenarios, Segundos Hijos. Sus líderes en secreto formulan un plan para asesinarla. Stannis libera a Davos y le cuenta sus planes sobre sacrificar a Gendry. Tyrion y Sansa se unen en matrimonio. En el Norte, Samwell se enfrenta a un enemigo poderoso.'),
(3, 9, 'Las lluvias de Castamere', 'Durante la boda de Edmure Tully y Roslin Frey, los Stark planean cambiar la marcha de la guerra con los Lannister. En el Muro, la lealtad de Jon Nieve será puesta a prueba y al otro lado del mundo, Daenerys planea su invasión de la ciudad de Yunkai.'),
(3, 10, 'Mhysa', 'Tywin Lannister hace anuncio del suceso ocurrido en la boda de Edmure Tully a la corte del Rey. Roose Bolton es proclamado guardián del Norte. Jaime y Brienne llegan a Desembarco del Rey, Arya y el Perro se topan con un grupo de bandidos, Bran y su grupo se cruzan con Samwell Tarly, Davos anuncia a Stannis sobre los problemas en el Muro y Daenerys aguarda por la liberación de Yunkai y sus esclavos.'),
(4, 1, 'Dos espadas', 'Tywin Lannister regala a su hijo Jaime, nuevo comandante de la Guardia Real, una espada de acero valyrio. Tyrion y Bronn reciben al díscolo príncipe Oberyn Martell, que busca venganza por las afrentas pasadas a su casa. Sansa, mientras tanto, recibe un regalo inesperado de Dontos Hollard. En el norte, Ygritte y Tormund se reúnen con nuevos refuerzos. En el Castillo Negro, Jon Nieve es sometido a juicio por su tiempo entre los salvajes. En su camino a Meereen, Daenerys descubre que no será bien recibida. En las Tierras de los Ríos, el Perro y Arya Stark tienen un encontronazo con soldados Lannister en una taberna.'),
(4, 2, 'El león y la rosa', 'Ramsay Nieve recibe a su padre lord Roose Bolton en Fuerte Terror. Al norte del Muro, Bran emplea sus habilidades como cambiapieles. En Rocadragón, Melisandre ordena quemar vivos en una hoguera a varios hombres de Stannis Baratheon. Desembarco del Rey celebra la boda del rey Joffrey Baratheon con Margaery Tyrell, pero Joffrey es envenenado durante esta y muere.'),
(4, 3, 'Rompedora de cadenas', 'Tras los acontecimientos de la boda del Rey, Sansa encuentra un aliado para escapar de Desembarco del Rey. Mientras tanto, Tywin Lannister y su hija Cersei pretenden condenar a Tyrion. En el Norte, Samwell Tarly hace a Gilly mudarse a Villa Topo para mantenerla a salvo, mientras los salvajes liderados por Tormund y Styr siguen atacando aldeas. En Rocadragón, Davos Seaworth da con una idea para procurar un ejército a la causa de Stannis. En las Tierras de los Ríos, el Perro y Arya Stark continúan su viaje hacia el Valle de Arryn. A las puertas de Meereen, Daenerys y su ejército son recibidos por su campeón.'),
(4, 4, 'Guardajuramentos', 'Jaime Lannister encomienda a Brienne una misión. En el Muro, Jon Nieve reúne a un grupo de hermanos de la Guardia de la Noche para atacar a los amotinados del torreón de Craster, quienes han retenido a Bran y sus acompañantes. En Meereen, Daenerys inicia su ofensiva. Más allá del muro, Karl Tanner que lidera a los amotinados del torreón, ordena a Rast que abandone a un bebé varón en el bosque por sugerencia de las esposas de Craster, donde luego un caminante blanco se lo lleva a un altar y el Rey de la Noche lo transforma.'),
(4, 5, 'El primero de su nombre', 'Cersei planea influir en los jueces del proceso contra Tyrion. Lord Petyr Baelish y Sansa Stark llegan al Valle de Arryn, donde son recibidos por lady Lysa Arryn. Al otro lado del Mar Angosto, Daenerys decide quedarse un tiempo a gobernar en Meereen. Más allá del Muro, Jon Nieve y su grupo atacan el torreón de Craster.'),
(4, 6, 'Leyes de dioses y hombres', 'Stannis y Davos negocian un préstamo con el Banco de Hierro de Braavos. En Fuerte Terror, Yara Greyjoy pone en marcha un plan para liberar a su hermano Theon de los Bolton. En Desembarco del Rey da comienzo el juicio de Tyrion Lannister.'),
(4, 7, 'Sinsonte', 'En Desembarco del Rey, Tyrion recibe ayuda de un inesperado aliado. En el Muro, Jon Nieve solicita a la Guardia bloquear el paso a través del Muro para evitar que el ejército de Mance Rayder lo atraviese. En el Camino Real, Brienne y Pod reciben noticias del paradero de Arya Stark, que continua su viaje con el Perro. En el Valle, Petyr Baelish da a conocer sus verdaderos motivos respecto a Sansa.'),
(4, 8, 'La Montaña y la Víbora', 'Sansa es interrogada por el asesinato de su tía Lysa Arryn. Ramsay Nieve pone en marcha un plan para recuperar Foso Cailin. La noticia sobre el pasado de Jorah Mormont llega a Danaerys, que toma medidas drásticas. En Desembarco del Rey, acontece la resolución del juicio de Tyrion Lannister mediante un combate singular.'),
(4, 9, 'Los vigilantes del Muro', 'La Guardia de la Noche defiende el Muro, en dos frentes, del ataque de los salvajes liderados por Mance Rayder, cuyo objetivo es pasar a través de este.'),
(4, 10, 'Los niños', 'Jon Nieve y Mance Rayder exponen términos de paz entre los Siete Reinos y el pueblo libre cuando son sorprendidos por un contingente de caballería. En Desembarco de Rey, Tywin insiste a Cersei con sus planes de matrimonio. En Meereen, Daenerys debe lidiar con los peligrosos instintos de sus dragones. Bran y su grupo llegan hasta su destino, pero son atacados por espectros. Brienne cruza su camino con el Perro y Arya. Jaime libera a Tyrion, quien antes de partir de Desembarco del Rey visita a una persona teniendo una desafortunada sorpresa y arregla su situación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `season`
--

CREATE TABLE `season` (
  `id_season` int(11) NOT NULL,
  `cant_episodes` int(11) DEFAULT NULL,
  `season_begin` date DEFAULT NULL,
  `season_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `season`
--

INSERT INTO `season` (`id_season`, `cant_episodes`, `season_begin`, `season_end`) VALUES
(1, 10, '2011-04-17', '2011-06-09'),
(2, 10, '2012-04-01', '2012-06-03'),
(3, 10, '2013-03-31', '2013-06-09'),
(4, 10, '2014-04-06', '2014-06-15'),
(5, 10, '2015-04-12', '2015-06-14'),
(6, 10, '2016-04-24', '2016-06-26'),
(7, 7, '2017-07-16', '2017-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_admin`
--

CREATE TABLE `user_admin` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(15) DEFAULT NULL,
  `user_password` varchar(256) DEFAULT NULL,
  `user_email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_admin`
--

INSERT INTO `user_admin` (`id_user`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'jmga', '$2y$10$3Hj1Dqrg9BgHot88WQZcLu43bBYAvuwuQ1U.kcmfEiDWBHJnlC392', 'jmga@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id_season`,`id_episode`);

--
-- Indices de la tabla `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id_season`);

--
-- Indices de la tabla `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `season`
--
ALTER TABLE `season`
  MODIFY `id_season` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`id_season`) REFERENCES `season` (`id_season`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
