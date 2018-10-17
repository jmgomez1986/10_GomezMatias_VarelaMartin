<?php

	/**
	*
	*/
	class CasasModel	{

		private $casas;

		function __construct(){

			$this->casas 			 = [  'casa_arryn'     => ['titulo'      => "CASA ARRYN",
																									 'subtitulo'   => "TAN ALTO COMO EL HONOR",
																									 'descripcion' => "Ubicada en el Valle, la Casa Arryn sirve como Guardián del Oriente desde su bastión en la montaña, The Eyrie,
																									       						una defensa clave contra los violentos clanes que rodean a su hogar. La vuida de Jon Arryn, Lysa, se ha retirado
																									       						aquí, manteniendose al margen de la refriega a sus pies.
																									       						Contrajo segundas nupcias con Petyr \"Meñique\" Baelish, quién la asesinó al poco tiempo de su boda. Con la guía de
																									       						Meñique, el joven Robin Arryn es ahora el jefe de la casa.",
																									 'miembros'    => ["Jon Arryn", "Robert Arryn", "Harrold Hardyng", "Lysa Arryn", "Robin Arryn",
																									                   "Yohn Royce", "Anya Waynwood", "Artys I el Halcón", "Hugh I el Gordo", "Hugo I el Confiado",
																																		 "Alester II", "Matthos II", "Alyssa", "Osgood el Viejo", "Oswin la Garra", "Oswell I",
																																		 "Sharra", "Ronnel", "Jonos", "Hubert", "Rodrik", "Aemma", "Jeyne la Doncella", "Donnel"
														                                        ]
																									],
															'casa_baratheon' =>	['titulo'      => "CASA BARATHEON",
																									 'subtitulo'   => "NUESTRA ES LA FURIA",
																									 'descripcion' => "Fundada después de la conquista de Aegon Targaryen, la casa Baratheon ha regido a los Siete Reinos desde que Robert le arrebató el Trono de Hierro al Rey Loco Aerys Targaryen. Tras la muerte de Robert, Joffrey Baratheon gobernó el reino, firmemente
																							       								convencido de su propia legitimidad. Cuando Joffrey murió, Tommen, su hermano menor, se convirtió en rey. Tras la explosión del Septo y la muerte de Tommen, Cersei tomó posesión del trono.",
																									 'miembros'    => ["Robert Baratheon", "Joffrey Baratheon", "Renly Baratheon", "Myrcella Baratheon", "Stannis Baratheon",
																									                   "Selyse Baratheon", "Tommen Baratheon", "Shireen Baratheon", "Davos Seaworth", "Melisandre", "Brienne de Tarth",
																																		 "Salladhor Saan", "Matthos Seaworth", "Gendry (Bastardo)", "Cressen (Maester)", "Robar", "Jocelyn", "Boremund", "Borros",
																																		 "Lyonel Tormentalegre", "Ormund", "Steffon", "Argilac el Arrogante"
																			                              ]
																								 ],
															'casa_greyjoy'   => ['titulo'      => "CASA GREYJOY",
																									 'subtitulo'   => "NOSOTROS NO SEMBRAMOS",
																									 'descripcion' => "El poder de la casa Greyjoy se remonta al reinado del gran rey Gris durante la Edad de los Héroes. Cuenta la leyenda que el Rey Gris gobernaba el mar y tomó a una sirena por esposa. La familia gobernante de las Islas de Hierro, los Greyjoy, siempre
																							       								 han tenido planes más grandes, como quedó en claro durante el gobierno del torpe y ambicioso Balon Greyjoy. Tras el asesinato de Balon, Euron Greyjoy fue elegido como rey, al mismo tiempo que Yara negoció trato con Daenerys Targaryen para apoyar
																							       				 				su propia petición.",
																									 'miembros'    => ["Balon Greyjoy", "Theon Greyjoy", "Yara Greyjoy", "Euron Greyjoy", "Alannys Greyjoy", "Rodrick Greyjoy", "Maron Greyjoy",
																									 									 "Asha Greyjoy", "Aeron Greyjoy", "Dagmer", "Lorren", "Victaryon Greyjoy", "Rey gris", "Sylas el Chato", "Harrag Hoare",
																																		 "Qhored Hoare", "Aubrey Crakehall", "Hagon Hoare el Despiadado", "Qhorwyn Hoare el Astuto", "Harren Hoare el Negro",
																																		 "Wulfgar Hoare", "Urragon IV Greyiron", "Horgan Hoare el Matasantos", "Fergon Hoare el Feroz"
																																	  ]
																									],
															'casa_lannister' => ['titulo'      => "CASA LANNISTER",
																									 'subtitulo'   => "¡Oye mi Rugido!",
																									 'descripcion' => "Los Lannister descienden en parte de un grupo de ándalos que invadieron a Westeros hace más de 6,000 años y se establecieron en Casterly Rock. La familia gobernó como reyes en sus dominios hasta que los Targaryen trajeron a sus dragones para conquistar
																							       								 al continente, sometiendo a todos los lores de Westeros al control del Trono de Hierro.",
																									 'miembros'    => ["Tywin Lannister", "Jaime Lannister", "Cersei Lannister", "Tyrion Lannister", "Kevan Lannister", "Lancel Lannister",
																									                   "Dorna Lannister", "Joanna Lannister", "Podrick Payne", "Gregor Clegane", "Polliver", "Karl Davies", "Amory Lorch",
																																		 "Harry Strickland", "Bronn", "Genna Lannister", "Stafford Lannister", "Daven Lannister", "Tyrek Lannister", "Lann el Astuto",
																																		 "Loreon I el Leon", "Tybolt I el Relámpago", "Cerion I", "Loreon III el Flojo"
																			                              ]
																									],
															'casa_stark'     => ['titulo'      => "CASA STARK",
																									 'subtitulo'   => "SE ACERCA EL INVIERNO",
																									 'descripcion' => "La casa principal del Norte pertenece a los Stark, quienes fueron los reyes del Norte hasta
																													           la conquista de Targaryen después de la cual se desempeñaron como guardianes de la región durante casi 300 años-
																													           Después de la ejecución de su padre, Robb Stark cortó lazos con King's Landing y se autodeclaró Rey en el Norte. Esa
																													           apuesta por la independencia tuvo un final violento cuando Walder Fray y Roose Bolton asesinaron a Robb y Catelyn
																													           Stark en una masacre conocida como la Boda Roja. En una alianza organizada por Lord Petyr Baelish, Sansa Stark regresó
																													           a Winterfell y se casó con Ramsay Bolton, quién la aterrorizaba. Sansa se escapó y se reunió con su medio hermano
																													           Jon Snow. Juntos, con la ayuda de Meñique, lograron recuperar Winterfell y Jon fué proclamado Rey del Norte.",
																									 'miembros'    => ["Eddard Stark", "Catelyn Stark", "Robb Stark", "Jon Snow", "Sansa Stark", "Arya Stark", "Bran Stark", "Rickon Stark",
																									                   "Lyanna Stark", "«Hodor»", "Osha", "Talisa Maegyr", "Jojen Reed", "Meera Reed", "Rickard Karstark", "Luwin",
																																		 "Donald Sumpter", "Rodrik Cassel", "Jory Cassel", "«Gran» Jon Umber", "«La Vieja Tata»", "Mordane", "Lyanna Mormont", "Robett Glover"
																			                              ]
																								 ],
															'casa_targaryen' =>['titulo'      => "CASA TARGARYEN",
																									'subtitulo'   => "LA REINA AL OTRO LADO DEL MAR",
																									'descripcion' => "Los Targaryen son originarios de la antigua civilización de Valyria y trajeron consigo dragones
																												            del continente oriental, estableciéndose en la isla de Dragonstone. Después de que un misterioso cataclismo conocido
																												            como la Maldición de Valyria aniquilara su tierra natal y acabara con la mayoria de los dragones del mundo, los Targaryen
																												            invadieron Westeros, convirtiéndose en la familia gobernante. La rebelión de Robert Baratheon eliminó a la mayoria de los
																												            Targaryen y les costó el reino. Daenerys Targaryen, quien esta plenamente consciente de sus derechos de nacimiento, regresó
																												            a Westeros tras años de exilio en Essos. Ahora tiene planes para reclamar el trono.",
																									'miembros'    => ["Aerys II Targaryen", "Rhaella Targaryen", "Aemon Maester", "Elia Martel", "Rhaegar Targaryen", "Viserys Targaryen",
																																		"Daenerys Targaryen", "Rhaenys Targaryen", "Aegon Targaryen", "Drogon (dragon)", "Rhaegal (dragon)", "Viserion (dragon)",
																																		"Aenys I", "Maegor I el Cruel", "Jaehaerys I", "Rhaenyra I", "Daeron I el Joven", "Baelor I el Santo", "Maekar I", "Viserys II",
																																		"Aegon II", "Aegon III Veneno de Dragon", "Jaehaerys II"
																																	 ]
																								 ]
														];
	}

		function getCasa($casaNombre){

			return $this->casas[$casaNombre];

		}

	} // END CLASS

?>
