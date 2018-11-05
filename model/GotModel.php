<?php

	/**
	*
	*/
	class GotModel	{

		private $host;
		private $root;
		private $root_password;
		private $db;
		private $tableNames;
		private $columns;

		function __construct(){

			$this->host          = "localhost";
			$this->root          = "root";
			$this->root_password = "";
			$this->tableNames    = ['season', 'episode', 'user_info', 'comment'];
			$this->db            = "gameofthrones_db";
			$this->columns 			 = [  'season'     => "id_season     int(11) NOT NULL AUTO_INCREMENT,
																								 cant_episodes int(11) DEFAULT NULL,
																								 season_begin  date    DEFAULT NULL,
																								 season_end    date    DEFAULT NULL,
																								 PRIMARY KEY(id_season)",

																'episode'    => "id_season     int(11)     NOT NULL,
																			    			 id_episode    int(11)     NOT NULL,
																			    			 episode_title varchar(50) DEFAULT NULL,
																			    			 episode_desc  text,
																								 imagen        text,
																			    			 PRIMARY KEY (id_season,id_episode),
																			    			 FOREIGN KEY (id_season) REFERENCES season (id_season)
																			    			 ON DELETE CASCADE ON UPDATE CASCADE",

																'user_info'   => "id_user       int(11)      NOT NULL AUTO_INCREMENT,
																								  user_name     varchar(15)  DEFAULT NULL,
																								  user_password varchar(256) DEFAULT NULL,
																								  user_email    varchar(20)  DEFAULT NULL,
																								  user_rol      varchar(30)  DEFAULT NULL,
																								  PRIMARY KEY(id_user)",

																'comment'     => "id_comment   int(11)      NOT NULL AUTO_INCREMENT,
																                  id_season    int(11)      NOT NULL,
																									id_episode   int(11)      NOT NULL,
																									id_user      int(11)      NOT NULL,
																									comment      varchar(256) DEFAULT NULL,
																									score        int(1)       DEFAULT NULL,
																									PRIMARY KEY (id_comment),
																									FOREIGN KEY (id_season,id_episode) REFERENCES episode (id_season,id_episode)
																									ON DELETE CASCADE ON UPDATE CASCADE,
																									FOREIGN KEY (id_user) REFERENCES user_info (id_user)
																									ON DELETE CASCADE ON UPDATE CASCADE"
															];
	}

		function CreateDB(){

			try {

				$pdo = new PDO('mysql:host='.$this->host.';dbname=INFORMATION_SCHEMA;charset=utf8',
												$this->root,
												$this->root_password);
				$stmt = $pdo->prepare("SELECT COUNT(SCHEMA_NAME) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$this->db'");
				$stmt->execute();

				$resultado = $stmt->fetchColumn();

				if ( $resultado ){
					//echo "<h1 style='color:red;'>La DB " . $this->db . " ya existe</h1>";
				}
				else{
					try {
						$dbh = new PDO("mysql:host=$this->host",
						$this->root,
						$this->root_password);
						$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$sentencia = $dbh->prepare("CREATE DATABASE $this->db");
						$sentencia->execute();

						for ($i=0; $i < count($this->tableNames) ; $i++) {

							$tabName    = $this->tableNames[$i];
							$valColumns = $this->columns[$this->tableNames[$i]];

							$dbCreate = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8',
																	$this->root,
																	$this->root_password);
							$dbCreate->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							$sentencia  = $dbCreate->prepare("CREATE TABLE $tabName ($valColumns)");
							$sentencia->execute();
						}

						$this->InsertSeason($dbCreate, $this->tableNames[0]);
						$this->InsertEpisode($dbCreate, $this->tableNames[1]);
						$this->InsertUser($dbCreate,$this->tableNames[2]);
					}
					catch (PDOException $e) {
						die("DB ERROR: ". $e->getMessage());
					}
				}
			}
			catch (PDOException $e) {
				die("DB ERROR: ". $e->getMessage());
			}

		}

		function InsertSeason($db, $tabNam){

			try{
				$sentencia = $db->prepare("INSERT INTO $tabNam (id_season, cant_episodes, season_begin, season_end)
				VALUES 	(1, 10, '2011-04-17', '2011-06-09'),
								(2, 10, '2012-04-01', '2012-06-03'),
								(3, 10, '2013-03-31', '2013-06-09'),
								(4, 10, '2014-04-06', '2014-06-15'),
								(5, 10, '2015-04-12', '2015-06-14'),
								(6, 10, '2016-04-24', '2016-06-26'),
								(7, 7,  '2017-07-16', '2017-08-27')" );
				$sentencia->execute( );

			}
			catch(PDOException $exception){
				echo $exception->getMessage();
			}

		}

		function InsertEpisode($db, $tabNam){

			$episodios = "(1, 1, 'Se acerca el invierno', 'El rey Robert Baratheon de Poniente viaja al Norte para ofrecerle a su viejo amigo Eddard \"Ned\" Stark, Guardián del Norte y Señor de Invernalia, el puesto de Mano del Rey. La esposa de Ned, Catelyn, recibe una carta de su hermana Lysa que implica a miembros de la familia Lannister, la familia de la reina Cersei, en el asesinato de su marido Jon Arryn, la anterior Mano del Rey. Bran, uno de los hijos de Ned y Catelyn, escala un muro y descubre a la reina Cersei y a su hermano Jaime teniendo relaciones sexuales, Jaime empuja al pequeño Bran esperando que la caída lo mate y así evitar ser delatado por el niño. Mientras tanto, al otro lado del mar Angosto, el príncipe exiliado Viserys Targaryen forja una alianza para recuperar el Trono de Hierro: dará a su hermana Daenerys en matrimonio al salvaje dothraki Khal Drogo a cambio de su ejército. El caballero exiliado Jorah Mormont se unirá a ellos para proteger a Daenerys.'),
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
			(4, 10, 'Los niños', 'Jon Nieve y Mance Rayder exponen términos de paz entre los Siete Reinos y el pueblo libre cuando son sorprendidos por un contingente de caballería. En Desembarco de Rey, Tywin insiste a Cersei con sus planes de matrimonio. En Meereen, Daenerys debe lidiar con los peligrosos instintos de sus dragones. Bran y su grupo llegan hasta su destino, pero son atacados por espectros. Brienne cruza su camino con el Perro y Arya. Jaime libera a Tyrion, quien antes de partir de Desembarco del Rey visita a una persona teniendo una desafortunada sorpresa y arregla su situación.'),
			(5, 1, 'Las guerras venideras', 'En un flashback se muestra a Cersei de niña preguntándole a una adivina por su futuro. En Desembarco del Rey Cersei critica a Jaime por liberar a Tyrion y provocar indirectamente la muerte de su padre. Mientras, en Pentos, Varys lleva a salvo a Tyrion y le revela su trabajo secreto junto con Illyrio Mopatis para llevar a Daenerys al trono de hierro. Varys invita a Tyrion a unirse a su lucha y él acepta. En Meereen, los Hijos de la Arpía, un grupo de resistencia, asesina a uno de los Inmaculados. Danaerys es informada que la misión en Yunkai ha sido exitosa, los amos han entregado el control a un consejo conformado por esclavos, pero a cambio piden la reapertura de las arenas de combate. Más tarde visita a sus dragones Viserion y Rhaegal pero ellos parecen desconocerla y la intentan atacar. En el Valle, Brienne le informa a Podrick que no lo requiere más, dado que su misión de buscar a las hermanas Stark ha fallado, por otro lado, Sansa y Baelish ven como entrena Robyn Arryn antes de marcharse a un lugar en el que Baelish asegura los Lannister no los encontrarán. Stannis le pide a Jon convencer a Mance Rayder de arrodillarse ante el rey y entregar su ejército de salvajes para atacar Invernalia que está ocupada por Roose Bolton y a su vez les daría ciudadanía y tierras para vivir, sin embargo, Mance rechaza la oferta y es mandado a morir en la hoguera. Jon, incapaz de ver como Rayder sufre con las llamas decide darle una muerte rápida clavándole una flecha en el pecho.'),
			(5, 2, 'La Casa de Negro y Blanco', 'En Desembarco del Rey, Cersei recibe una estatua con el collar de su hija Myrcella y Jaime se dispone a ir por ella a Dorne, pidiendo la ayuda de Bronn. En el muro, Stannis le pide a Jon que se arrodille ante él y le jure lealtad; a cambio será reconocido como Jon Stark y se le otorgará Invernalia, sin embargo él rechaza la oferta, mientras tanto los hermanos de la Guardia de la Noche eligen al próximo Lord Comandante. En el Valle, Brienne y Podrick encuentran a Sansa con Petyr; tras la negación de Sansa por obtener la protección de Brienne, ella se dispone a seguir su caravana. En Braavos, Arya llega a la Casa de Negro y Blanco, pero se le niega la entrada y más tarde encuentra a Jaqen Hghar. En Dorne, Ellaria le pide a Doran vengarse de la muerte de su hermano Oberyn torturando a Myrcella, pero él termina negándose a tal solicitud. Tyrion y Varys comienzan su viaje a Volantis. En Meereen, Daario y los Inmaculados encuentran un miembro de los Hijos de la Arpía, sin embargo, Mossador lo asesina antes de recibir su juicio, por tal motivo Daenerys ordena su ejecución pública, lo que genera un motín entre los amos y los esclavos liberados. Por la noche, Daenerys descubre que Drogon regresó a Meereen pero se marcha antes de que ella pueda tocarlo.'),
			(5, 3, 'Hijos de la arpía', 'En Desembarco del Rey, Tommen y Margaery contraen nupcias. Lancel ataca al Septón Supremo, éste en represión pide ejecutar al líder de los Gorriones, el Gorrión Supremo, pero tras una corta reunión personal, Cersei decide no hacerlo. Más tarde, Cersei pide a Qyburn mandarle una carta a Petyr. En el norte, Roose le comenta a Ramsay la necesidad de fortalecer su ejército y le pide que se case. Petyr le comenta a Sansa que consiguió una boda con Ramsay, pero tras su negación por tratarse de la familia que traicionó a los Stark logra convencerla afirmándole que es la oportunidad de vengarse de ellos. Petyr reitera su alianza con Roose, quien tiene dudas al saber que le llega una carta de Cersei. En Braavos, Arya deja atrás todas sus pertenencias, para convertirse en nadie. En Volantis, Jorah secuestra a Tyrion afirmando que lo llevará con la reina.'),
			(5, 4, 'Hijos de la arpía', 'En Desembarco del Rey, Cersei le ofrece al Gorrión Supremo una milicia al servicio de los dioses; tras esto, Loras Tyrell es encarcelado, acción que hace enfurecer a Margaery, quien desesperadamente le pide a su esposo, Tommen Baratheon, la liberación. Pero Tommen es incapaz de lograrlo sin recurrir a la violencia entre la Guardia Real y la Milicia de la Fe. En el Muro, Jon manda varias cartas a Lores del norte para solicitar hombres y suministros para el Muro, incluido Roose Bolton, del cual al principio se niega, pero termina aceptando. Melisandre trata de seducir a Jon para convencerlo de unirse a Stannis en su batalla para recuperar Invernalia de los Bolton. En Invernalia, Petyr le cuenta a Sansa acerca de su tía, Lyanna, y luego le informa que marchará a Desembarco del Rey por órdenes de Cersei. En Dorne, Jaime y Bronn logran llegar a la costa; mientras Ellaria forma una alianza con las Serpientes de Arena (conformada por tres hijas bastardas de Oberyn) para entrar en guerra con los Lannister, teniendo como objetivo Myrcella. Al otro lado del Mar Angosto, Jorah le informa a Tyrion que será llevado ante la reina Daenerys y no a su hermana, Cersei. Varios miembros de los Hijos de la Arpía atacan a civiles en Meereen, tras una batalla, Gusano Gris es levemente herido, mientras que Ser Barristan recibe mortales puñaladas.'),
			(5, 5, 'Matad al chico', 'En el Norte, Brienne le manda un mensaje infiltrado a Sansa. Sansa descubre la presencia de Theon en Invernalia, Roose anuncia el embarazo de su esposa, Walda. Tras esto Ramsay se siente amenazado, pero es tranquilizado por su padre quien le pide ayuda para su próxima batalla con Stannis. En el Muro, Jon decide crear una alianza entre la Guardia de la Noche y los salvajes, aun así tras la negativa de sus hermanos, Jon decide continuar. Tormund le pide a Jon acompañarlo a Casa Austera, lugar donde están los salvajes para que sea él mismo quien les hable de la alianza. Al otro lado del Mar Angosto, tras el velorio de Ser Barristan, Daenerys ordena la detención de todos los líderes de las grandes familias, sin embargo, tras las palabras de Missandei, Daenerys decide reabrir la arenas de combates y asimismo, para mantener la paz en Meereen, casarse con Hizdahr Zo Loraq. En el mar, al atravesar las ruinas de Valyria, Tyrion ve por primera vez a Drogon, tras esto, son atacados por hombres de piedra, Jorah descubre después que fue infectado por estos de psoriagrís.'),
			(5, 6, 'Nunca doblegado, nunca roto', 'En Desembarco del Rey, Petyr se ofrece para estar al mando del ejército para arrebatarle Invernalia a Stannis y los Bolton. Loras y Margaery son detenidos por los gorriones por haber mentido bajo juramento sobre las acciones homosexuales de Loras. En Invernalia, Sansa acepta casarse con Ramsay, y durante la consumación del matrimonio, Ramsay obliga a Theon a ver como viola a Sansa. Al otro lado del Mar Angosto, Jorah y Tyrion son capturados por esclavistas. En Dorne, Jaime y Bronn se infiltran en los Jardines de Agua, pero antes de poder marcharse son emboscados por las Serpientes de Arena y tras una breve batalla son detenidos por los guardianes de Dorne. En Braavos, Jaqen le muestra una habitación llena de caras a Arya, donde le deja en claro que ella no está lista para convertirse en nadie, pero sí en alguien más.'),
			(5, 7, 'El regalo', 'En Desembarco del Rey, Lady Olenna trata de convencer al Gorrión Supremo de liberar a sus nietos, pero no logra convencerlo, más tarde el Gorrión Supremo ordena la detención de Cersei tras las confesiones de Lancel acerca de sus relaciones incestuosas. En el Muro, Jon parte a Casa Austera, mientras Sam y Gilly acompañan a el Maester Aemon hasta la hora de su muerte. Cerca del lugar, Davos le sugiere a Stannis regresar al Castillo Negro, sin embargo, Stannis continúa con sus planes de invadir Invernalia. En Invernalia, Sansa pide la ayuda de Theon para poner una vela en la torre más alta, no obstante, él le cuenta todo lo ocurrido a Ramsay, quien manda a matar a la anciana que le prometió ayuda. Al otro lado del Mar Angosto, Malko vende a Jorah y a Tyrion a un amo, quien los lleva a pelear a las arenas de combates, donde se reencuentran con Daenerys Targaryen. En Dorne, Jaime le sugiere a Myrcella regresar, pero ella niega marcharse por su futuro matrimonio con Trystan.'),
			(5, 8, 'Casa Austera', 'En Desembarco del Rey se le pide a Cersei que confiese sus crímenes, pero ella se niega, Qyburn le revela los cambios que se están haciendo en la realeza tras su encarcelamiento. En Invernalia, Theon le confiesa a Sansa que sus hermanos no fueron asesinados por él, mientras Lord Bolton se prepara para la batalla ante Stannis. En el Muro, Sam le revela a Olly que Jon traerá a los salvajes para luchar juntos contra los caminantes blancos. Al otro lado del Mar Angosto, Daenerys destierra a Jorah de Meereen y coloca a Tyrion como su consejero. En Braavos, Arya adopta una nueva identidad y Jaqen le pide que aprenda todo lo que pueda de su primera víctima antes de envenenarla. En Casa Austera, Jon logra convecer a gran parte de los salvajes para unirse a la Guardia de la Noche a cambio de tierras, pero durante el traslado a los barcos son atacados por un grupo de caminantes blancos. Tras la batalla las personas que lograron escapar ven como las personas muertas se convierten en caminantes blancos.'),
			(5, 9, 'Danza de dragones', 'En el Muro, la entrada de los salvajes es permitida al Castillo Negro. En el norte, tras una emboscada que debilita su campamento, Stannis decide hacer un doloroso sacrificio para tener la ayuda del Dios Rojo. En Braavos, Arya se encuentra con una persona de su pasado motivo por el cual se desvía de su misión original. En Meereen, un vasto número de Hijos de la Arpía masacra al pueblo de Meereen durante la reapertura de las arenas de combate exponiendo a Daenerys a un gran peligro, ya que estos son acorralados, pero cuando todo se creía perdido aparece su gran salvador. En Dorne, Jaime negocia tratos con Doran para poder llevar a Myrcella de regreso a Desembarco del Rey.'),
			(5, 10, 'Misericordia', 'En Desembarco del Rey, Cersei confiesa sus pecados y es liberada tras hacer una penitencia. En el Norte, cerca de Invernalia, Ramsey Bolton y su ejército masacran al diminuto ejército de Stannis. Mientras tanto, allí en Invernalia, Sansa trata de escapar junto con Theon. En el Muro, la Guardia de la Noche guarda una sorpresa a Jon Nieve. En Meereen, Jorah y Daario emprenden una búsqueda para localizar a Daenerys, quien se encuentra en un valle donde es encontrada por un campamento Dothraki. En Dorne, Ellaria Arena declara la guerra a los Lannisters. En Braavos, Arya lleva a cabo el juego de las caras para una misión personal, lo que tendrá consecuencias.'),
			(6, 1, 'La mujer roja', 'El futuro de Jon nieve pende de un hilo en el Muro tras el violento ataque de los amotinados; Melissandre tiene que tomar una decisión complicada. Daenerys continúa su huida después de abandonar las tierras de Meereen donde le llevan ante el nuevo Khal. En Braavos, Arya hace frente a su difícil situación e intenta sobrevivir. Tyrion se las arregla como puede en Meereen tras la marcha de sus compañeros que van en busca de Daenerys. Mientras tanto, Jaime consigue traer de vuelta a Myrcella a Desembarco del Rey.'),
			(6, 2, 'A casa', 'Más allá del Muro, Bran comienza su entrenamiento con el Cuervo de Tres Ojos, mientras que un joven Tommen es aconsejado por Jaime en Desembarco del Rey. Ramsay sigue con su peculiar modus operandi en el Norte y propone un plan tras la huida de Sansa y Theon. Éste último vuelve con su hermana Yara, en quien recae ahora el destino de los Greyjoy en Pyke.'),
			(6, 3, 'Perjuro', 'En Vaes Dothrak, Daenerys decide reunirse con las mujeres del Khal. Por su parte, Varys se ve inmerso en la busqueda de información acerca de los Hijos de la Arpía. Mientras tanto, en Braavos, Arya continúa su entrenamiento con la Niña Abandonada para convertirse en \"nadie\". En Desembarco del Rey, el rey Tommen se enfrenta al Gorrión Supremo acerca de su madre Cersei. Durante el transcurso de estos acontecimientos, un revivido Jon Snow intenta adaptarse a su vuelta en el Castillo Negro.'),
			(6, 4, 'Libro del desconocido', 'Naharis y Jorah descubren el paradero actual de Daenerys y emprenden su marcha hasta el poblado dothraki, a la vez que Tyrion intenta hacer frente a las vicisitudes que se le plantean en Meereen por medio de un acuerdo. Los hermanos Lannister, Jaime y Cersei, hacen todo lo posible por reconducir su situación actual. Mientras, un esperanzado Theon regresa a su hogar junto a una fuerte Asha. En la muralla Jon Snow toma una importante decision de la mano de su hermana Sansa Stark. En Vaes Dothrak Daenerys es llevada con los khals, y es allí donde ésta les da una pequeña \"Sorpresa\".'),
			(6, 5, 'La Puerta', 'Bran descubre una importante revelación gracias a sus visiones con el Cuervo de tres ojos. En el Muro, Jon y Sansa planean conjuntamente sus opciones para retomar Invernalia de nuevo. Mientras tanto, Arya recibe una misión por parte de la Niña Abandonada que demostrará las dotes que ha aprendido a lo largo de su entrenamiento. En Meereen, Tyrion intenta por todos los medios afianzar el apoyo público hacia Daenerys pero, para ello, tendrá que recurrir a la ayuda de un personaje poco fiable.'),
			(6, 6, 'Sangre de mi sangre', 'Sam y Gilly tendrán un duro encuentro con la familia de él cuando acudan a Colina Cuerno para que ésta los conozca. Más allá del Muro, Bran continúa con muchas más revelaciones del Cuervo de tres ojos acerca del pasado de algunos personajes. Arya tiene que llevar a cabo una importante misión pero tendrá que tomar una decisión que marcará su futuro en Braavos. Jaime y el ejército de Tyrell se presentan en Desembarco del Rey, donde éste planta cara al Gorrión Supremo. Éste último está dispuesto a ofrecer a Margaery hacia el particular camino de expiación pero ésta acepta sus pecados. Por otra parte Daenerys Targaryen junto a Drogon empoderan a los Dothraki.'),
			(6, 7, 'El hombre destrozado', 'En el norte, Jon y Sansa empiezan a urdir sus planes para volver a tomar Invernalia de nuevo, empezando por el fichaje de nuevos apoyos que se alíen con ellos en su lucha. En Desembarco del Rey, las cosas no lucen bien para Cersei y los suyos, a los que el Gorrión Supremo aún tiene bajo su yugo. Éste intentará, por todos los medios, sumar un potente aliado a la Fe. El ejército de Jaime, junto con Bronn y éste, acuden a Aguasdulces con el objetivo de llegar a un acuerdo con Pez Negro. En Braavos, Arya está decidida a escapar de allí para poner rumbo a Poniente pero se encontrará con un obstáculo en su camino.'),
			(6, 8, 'Nadie', 'Jaime Lannister continúa en Aguasdulces donde un tenaz Pez Negro se resiste a entregar su castillo, aunque la visita inesperada de alguien cercano al Matarreyes intentará disuadirlo de su cabezonería. En Desembarco del Rey, una impertérrita Cersei se niega a hablar con el Gorrión Supremo. En Meereen, Tyrion tiene que poner en marcha sus planes tan deseados ante un contratiempo que asola la ciudad más extensa de Bahía de los Esclavos. Mientras tanto, Arya se recupera de sus heridas en Braavos, aunque la suerte no está de su lado y tendrá que hacer frente a los obstáculos que se interponen en su camino.'),
			(6, 9, 'La batalla de los bastardos', 'Sansa y Jon aguardan en el Norte a que dé comienzo una de las batallas con mayor envergadura para los Stark y que será decisiva en su lucha contra los Bolton por recuperar Invernalia. Mientras tanto, Daenerys se dispone a trazar junto a Tyrion un plan que ponga fin al enfrentamiento con los esclavistas. Ésta y su acertado consejero intentarán por todos los medios hacerse con una potente flota de navíos.'),
			(6, 10, 'Vientos de invierno', 'Mientras se llevaba a cabo el juicio de Loras Tyrell y Cersei en Desembarco del Rey, el Gran Septo de Baelor queda reducido a cenizas por el fuego valyrio, con Margaery, Loras, Mace Tyrell, el Gorrión Supremo, Lancel Lannister y Kevan Lannister dentro, mientras Cersei observaba todo desde la Fortaleza Roja. Tommen comete suicidio y Cersei es proclamada la nueva Reina de los Siete Reinos. Jon Nieve y Sansa Stark reúnen las fuerzas del norte y se preparan para el invierno. Arya Stark finalmente logra acabar con la vida de Walder Frey. Daenerys Targaryen emprende su camino hacia Desembarco del Rey en una inmensa flota de barcos, junto a su ejército, sus dragones y Tyrion Lannister como \"Mano de la Reina\".'),
			(7, 1, 'Rocadragón', 'En Los Gemelos, Arya Stark envenena a los Frey restantes implicados en la \"Boda Roja\". En Desembarco del Rey, Cersei Lannister y Jaime Lannister tratan con Euron Greyjoy intentando hacer una alianza. En Invernalia, Jon Nieve perdona a los Karstark y a los Umber haciendo que le juren lealtad, y Sansa Stark advierte a Jon de la inminente ira de Cersei. En Antigua, Samwell Tarly comienza su entrenamiento, y un enfermo Jorah Mormont le pregunta por la llegada de Daenerys. Bran Stark llega al Muro y es recibido por Edd el Penas. Sandor Clegane con la Hermandad sin Estandartes se refugia en la casa de un granjero. En Rocadragón, Daenerys Targaryen y Tyrion Lannister junto con su ejército llegan a Rocadragón y exploran el castillo abandonado que fue antes habitado por Stannis Baratheon.'),
			(7, 2, 'Nacido de la tormenta', 'Daenerys comienza a pensar estrategias junto a sus aliados. Melisandre llega a Rocadragón y pide a Daenerys que convoque a el Rey del Norte Jon Nieve. Sam intenta curar de psoriagrís a Jorah. Cersei entabla alianzas con los Tarly. Jon Nieve decide acudir a la llamada de Daenerys dejando Invernalia en manos de Sansa. Arya decide cambiar su rumbo hacia Invernalia, reencontrándose con su viejo amigo Pastel Caliente y su loba huargo Nymeria. Euron ataca la flota de su sobrina Yara.'),
			(7, 3, 'La justicia de la reina', 'Jon Nieve conoce a Daenerys en Rocadragón. Euron entra triunfal en Desembarco del Rey y entrega a las rehenes Ellaria y Tyene Arena ante Cersei. Jorah es curado de psoriagrís. Cersei se cobra su venganza por la muerte de Myrcella. Los Inmaculados atacan Roca Casterly, aunque las fuerzas de los Lannister han abandonado en su mayoría el castillo para capturar Altojardín, que lleva a la muerte de Olenna Tyrell, no sin antes confesar ante Jaime que mató a Joffrey.'),
			(7, 4, 'Botines de guerra', 'Jon muestra a Daenerys una cueva llena de vidriagón y unas pinturas rupestres de los Niños del Bosque sobre los Caminantes Blancos. Cersei negocia con el Banco de Hierro. Arya regresa a Invernalia y se reencuentra con sus hermanos. Después de perder la flota de Yara Greyjoy y el ejército y el apoyo económico de Dorne y Altojardín, Daenerys sale a atacar desde el lomo de Drogon a las huestes de los Lannister junto con una horda de salvajes dothrakis dispuestos a matar.'),
			(7, 5, 'Guardaoriente', 'Daenerys consigue una victoria y acaba con la familia Tarly. Jorah vuelve al servicio de Daenerys. Tyrion se reúne en secreto con Jaime para que convenza a Cersei para luchar contra los Caminantes Blancos. Cersei desvela a Jaime que está embarazada. Jon Nieve y compañía cruzan de nuevo el Muro en busca de un no-muerto para que el resto del continente les crea y luchen. Sam abandona Antigua cansado de ser ignorado.'),
			(7, 6, 'Más allá del Muro', 'En Invernalia, Sansa y Arya comienzan una disputa debido a las artimañas de Meñique. Sansa descubre las caras de Arya. Jon y compañía se adentran más allá del Muro hasta dar con una horda de Caminantes Blancos, consiguen capturar a un no-muerto pero se ven atrapados por el ejército. Gendry consigue escapar hasta el Muro y manda un aviso de socorro a Daenerys. Thoros de Myr muere congelado tras sufrir una herida. Daenerys acude en su ayuda a pesar de los consejos de Tyrion. El Rey de la Noche arroja una lanza helada que acaba con la vida del dragón Viserion. Daenerys en shock, consigue escapar con todos menos Jon, que es salvado por su tío Benjen que termina sacrificandose por él. Jon herido llega al Muro y jura lealtad a Daenerys. El Rey de la Noche saca el cadáver de Viserion del lago helado y lo resucita como un dragón caminante blanco.'),";

			$episodios .= "(7, 7, 'El dragón y el lobo', 'En Desembarco del Rey, Daenerys, Jon, Cersei y sus consejeros se reúnen en Pozo Dragón para el encuentro donde un espectro se va a presentar como prueba. Cersei demanda como condición que Jon permanezca neutral mientras continúe la guerra con Daenerys. Él rechaza la petición por su promesa de servir a Daenerys provocando la retirada de Cersei. Tyrion habla con Cersei y aparentemente la convence de que se comprometa con la alianza. Posteriormente, Cersei le revela a Jaime que ella no tiene intención de enviar sus soldados para ayudar a la lucha de Daenerys y Jon contra los muertos. Su plan, en cambio, es derrotar al bando ganador, contratando a 20 000 mercenarios de la Compañía Dorada. Jaime, dispuesto a cumplir su palabra, la deja para cabalgar al Norte. Theon se gana el respeto de sus hombres para rescatar a su hermana Yara. En Invernalia, Meñique habla con Sansa sobre el amenazador comportamiento de Arya. Sansa convoca un juicio delante de los señores del Norte y del Valle señalando a Meñique en lugar de Arya. Arya lo ejecuta por sus crímenes contra la casa Stark y la casa Arryn. Mientras tanto, Daenerys y Jon tienen relaciones sexuales en el barco hacia Invernalia. En Guardiaoriente, el Rey de la Noche realiza su aparición a lomos de Viserion, el cual es ahora un dragón Caminante Blanco, destruyendo una porción del Muro y permitiendo al Ejército de los Muertos avanzar hacia el sur.')";

			try{
				$sentencia = $db->prepare( "INSERT INTO $tabNam (id_season, id_episode, episode_title, episode_desc)
				VALUES 	$episodios" );
				$sentencia->execute( );

				$trigger = "CREATE TRIGGER updateSeasonIns AFTER INSERT ON episode
				 								FOR EACH ROW BEGIN
													UPDATE season SET cant_episodes = cant_episodes+1	WHERE id_season = NEW.id_season;
												END;
											CREATE TRIGGER updateSeasonDel AFTER DELETE ON episode
					 							FOR EACH ROW BEGIN
													UPDATE season SET cant_episodes = cant_episodes-1 WHERE id_season = OLD.id_season;
												END;";

				$sentencia = $db->prepare( $trigger );
				$sentencia->execute( );

			}
			catch(PDOException $exception){
				echo $exception->getMessage();
			}

		}

		function InsertUser($db, $tabNam){
			try{
				$sentencia = $db->prepare( "INSERT INTO $tabNam (id_user, user_name, user_password, user_email, user_rol)
																			VALUES (?,?,?,?,?)" );
				$sentencia->execute( array(1, 'jmga', '$2y$10$3Hj1Dqrg9BgHot88WQZcLu43bBYAvuwuQ1U.kcmfEiDWBHJnlC392',
																		'jmgametal@gmail.com', 'Administrador') );

			}
			catch(PDOException $exception){
				echo $exception->getMessage();
			}
		}

	}

?>
