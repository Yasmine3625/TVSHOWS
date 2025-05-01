USE tv_shows;
INSERT INTO `tag` (`id_tag`, `nom`) VALUES(1, 'Comédie')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);

INSERT INTO `tag` (`id_tag`, `nom`) VALUES(2, 'action')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);

INSERT INTO `tag` (`id_tag`, `nom`) VALUES(3, 'horreur')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);

INSERT INTO `tag` (`id_tag`, `nom`) VALUES(4, 'drame')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);

INSERT INTO `tag` (`id_tag`, `nom`) VALUES(5, 'science fiction')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);

INSERT INTO `tag` (`id_tag`, `nom`) VALUES(6, 'romance')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);
INSERT INTO `tag` (`id_tag`, `nom`) VALUES(7, 'policier')
ON DUPLICATE KEY UPDATE `nom`=VALUES(`nom`);

INSERT INTO `serie` ( `titre`, `nb_saison`)  VALUES('the rookies', 2);

INSERT INTO `serie` ( `titre`, `nb_saison`) VALUES
('Pulse',1),
('the order',1),
('My name',1),
('originals', 1),
('Love 101',2),
('Ma vie avec les walter Boys',1)
('The 100', 2)
;

Insert into `acteur` (`cle_act`, `nom`, `image` ) VALUES(1, 'Danielle Rose Russel', 'images/images_series/originals_act06.webp' ),
(2, 'Joseph Morgan', 'images/images_series/originals_act01.jpeg'),
(3, 'Daniel Gillies', 'images/images_series/originals_act02.jpeg'),
(4, 'Phoebe Tonkin', 'images/images_series/originals_act03.jpeg'),
(5, 'Charles Michael Davis', 'images/images_series/originals_act04.jpeg'),
(6, 'Claire Holt', 'images/images_series/originals_act05.jpeg'),

(7, 'Colin Woodell', 'images/images_series/Pulse_act02.jpeg'),
(8, 'Willa Fitzgerald', 'images/images_series/Pulse_act01.jpeg'),
(9, 'Justina Machado', 'images/images_series/Pulse_act03.jpeg'),
(10, 'Jack Bannon', 'images/images_series/Pulse_act04.jpeg'),
(11, 'Daniela Nieves', 'images/images_series/Pulse_act05.jpeg'),

(12, 'Mert Yazicioglu', 'images/images_series/Love101_act01.jpeg'),
(13, 'Ipek Filiz Yazici', 'images/images_series/Love101_act02.jpeg'),
(14, 'Alina Boz', 'images/images_series/Love101_act03.jpeg'),
(15, 'Kubilay Aka', 'images/images_series/Love101_act04.jpeg'),
(16, 'Pinar Deniz', 'images/images_series/Love101_act05.jpeg'),
(17, 'Kaan Urgancioglu', 'images/images_series/Love101_act06.jpeg'),

(18, 'Han So-hee', 'images/images_series/My_name_act01.jpeg'),
(19, 'Ahn Bo-hyun', 'images/images_series/My_name_act02.jpeg'),
(20, 'Park Hee-soon', 'images/images_series/My_name_act03.jpeg'),

(21, 'Nathan Fillion', 'images/images_series/the_rookie_act01.jpeg'),
(22, 'Eric Winter', 'images/images_series/the_rookie_act02.jpeg'),
(23, 'Melissa O`Neil', 'images/images_series/the_rookie_act03.jpeg'),
(24, 'Mekia Cox', 'images/images_series/the_rookie_act04.jpeg'),

(25, 'Nicholas Hoult', 'images/images_series/the_order_act01.jpeg'),
(26, 'Jude law', 'images/images_series/the_order_act02.jpeg'),
(27, 'Tye Sheridan', 'images/images_series/the_order_act03.jpeg'),
(28, 'Odessa Yong', 'images/images_series/the_order_act04.jpeg'),

(29, 'Noah LaLonde', 'images/images_series/Walter_boys_act01.jpeg'),
(30, 'Nikki Rodriguez ', 'images/images_series/Walter_boys_act02.jpeg'),
(31, 'Ashby', 'images/images_series/Walter_boys_act03.jpeg'),
(32, 'Sarah Rafferty', 'images/images_series/Walter_boys_act04.jpeg'),
(33, 'Marc Blucas', 'images/images_series/Walter_boys_act05.jpeg'),

(34, 'Eliza Taylor', 'images/images_series/the_100_act01.jpeg'),
(35, 'Bob Morley', 'images/images_series/the_100_act02.jpeg'),
(36, 'Marie Avgeropoulos','images/images_series/the_100_act03.jpeg' )
;

INSERT INTO `serie_tag`(`cle_serie`,`cle_tag`) VALUES
(1,5),(1,2),
(2,4),(2,6),(2,3),
(3,3),
(4,1),(4,5),(4,7),
(5,2),(5,4),
(6,1),(6,7),
(7,1),(7,2),
(8,3), (8,4);

INSERT INTO `saison` (`titre`, `cle_saison`, `affichage`, `nb_episode`, `cle_serie`)
VALUES
('Saison 1',101, 'images/imeges_series/the_rookie.jpeg',5,1 ),
('Saison 2',102, 'images/imeges_series/the_rookie.jpeg',4,1),
('Saison 1',201, 'images/imeges_series/originals.webp',5,2),
('Saison 1',301, 'images/imeges_series/My_name.jpeg',5,3),
('Saison 1',401, 'images/imeges_series/the_order.jpeg',4,4),
('Saison 1',501, 'images/imeges_series/Love101.webp',8,5),
('Saison 2',502, 'images/imeges_series/Love101.webp',8,5),
('Saison 1',601, 'images/imeges_series/Pulse.jpeg',8,6),
('Saison 1',701, 'images/imeges_series/Walter_boys.jpeg',10,7),
('Saison 1',801, 'images/images_series/the_100',4,8);

INSERT INTO `saison_acteur` (`cle_saison`, `cle_acteur`) VALUES
(101,21),(101,22),(101,23),(101,24),
(102,21),(102,22),(102,23),(102,24),
(201,1),(201,2),(201,3),(201,4),(201,5),(201,6),
(301,18),(301,19),(301,20),
(401,25),(401,26),(401,27),(401,28),
(501,12),(501,13),(501,14),(501,15),(501,16),(501,17),
(502,12),(502,13),(502,14),(502,15),(502,16),(502,17),
(601,7),(601,8),(601,9),(601,10),(601,11),
(701, 29),(701, 30),(701, 31),(701, 32),(701, 33),
(801,34), (801,35), (801,36)
;

INSERT INTO `realisateur` (`cle_real`,`nom`, `image`) VALUES
(1, 'Liz Friedlander' , 'images/images_series/real01_the_rookie.jpeg'),
(2, 'Adam Davidson' , 'images/images_series/real02_the_rookie.jpeg'),
(3, 'Greg Beeman' , 'images/images_series/real03_the_rookie.jpeg'),
(4, 'Rob Bowman' , 'images/images_series/real04_the_rookie.jpeg'),
(5, 'Chris Grismer' , 'images/images_series/real01_originals.jpeg'),
(6, 'Brad Turner' , 'images/images_series/real02_originals.jpeg');

INSERT INTO `episode`(`cle_episode`, `synopsis`, `duree`, `titre`, `id_saison`) VALUES
(1101, 'John Nolan est un divorcé âgé de 45 ans qui, après avoir assisté à (et fait déjouer) un braquage de banque dans sa petite ville, décide de changer de vie : il déménage à Los Angeles et devient flic.', '00:46:00', 'Premiers pas', 101),
(2101, 'Nolan persuade une femme de ne pas se suicider. Jackson est interrogé sur les raisons pour lesquelles il n a pas tiré avec son arme, mais Lopez le couvre.', '00:47:00', 'Pas de repos pour les braves', 101),
(3101, 'Nolan et Bishop poursuivent un groupe de voleurs et Nolan perd un sac d argent volé lorsqu un artiste de rue s enfuit avec. Le bureau apprend que les voleurs', '00:48:00', 'Plan B', 101),
(4101, 'Le Sergent Gray teste les recrues en interchangeant leur formateurs: il assigne Nolan à Lopez, West à Bradford et Chen à Bishop; et charge les recrues de mieux comprendre leurs nouveaux formateurs.', '00:45:00', 'Changement d equipe', 101),
(5101, 'Nolan a du mal à faire face à sa rupture avec Chen au moment même où les formateurs lancent un concours annuel pour déterminer qui peut obtenir le plus d arrestations en un seul jour de travail.', '00:46:00', 'Le tournoi', 101),

(1102, 'Deux semaines après la fin de la saison 1, Nolan a déménagé dans une nouvelle maison et les recrues apprennent les résultats de leur examen. Ils réussissent tous le test.', '00:48:00', 'Impact', 102),
(2102, 'Nolan essaie de gérer sa relation avec Russo, et crée des liens avec Grace pendant qu il enquête sur un cas criminel avec l agent Lopez.', '00:45:00', 'Le pari', 102),
(3102, 'Le propriétaire de West est arrêté et il se retrouve expulsé de son appartement.', '00:46:00', 'Recherche appartement', 102),
(4102, 'Nolan est assigné à son nouvel agent instructeur, le lieutenant Nyla Harper, dont il trouve les méthodes trop extrêmes.', '00:50:00', 'Le billet en or', 102),

(1201, 'L histoire est raconté du point de vue d Elijah. Déterminé à aider son frère à trouver la rédemption.', '01:02:00', 'Retour a la Nouvelle-Orleans', 201),
(2201, 'Rebekah arrive à la Nouvelle-Orléans à la recherche d Elijah, mais rencontre Hayley dans le manoir de Klaus où elle se confie à Rebekah sur son état inattendu.', '00:59:45', 'À la reconquête du royaume', 201),
(3201, 'Rebekah et Klaus se sont alliés afin de récupérer Elijah, détenu par l arme secrète anti-sorcières de Marcel.', '00:58:49', 'Les amants maudits', 201),
(4201, 'Avec le festival annuel de musique de la rue Dauphine en vue, Davina, souhaitant profiter d une soirée.', '01:01:02', 'Nouvelles alliances', 201),
(5201, 'Irrité par les récents événements impliquant la sécurité de son bébé à naître, Klaus exige des réponses de Sophie.', '00:56:45', 'Le rituel de moisson', 201),

(1301, 'Le jour de son anniversaire, Jiwoo Yoon assiste à la mort atroce de son père. Prête à tout pour se venger.', '00:45:00', 'Episode 01', 301),
(2301, 'Mujin Choi inflige une punition à Gangjae Do. Jiwoo intègre les forces de police sous couverture.', '00:46:00', 'Episode 02', 301),
(3301, 'Durant la traque d une cible imprévue avec son équipe, Jiwoo doit faire preuve de sang-froid.', '00:47:00', 'Episode 03', 301),
(4301, 'Pour Giho Cha, la déclaration de guerre de Gangjae contre Mujin vient à point nommé.', '00:50:00', 'Episode 04', 301),
(5301, 'Jiwoo et Pildo échappent au pire de justesse, reportant l attention de la police sur Gangjae.', '00:46:00', 'Episode 05', 301),

(1401, 'Arrivé à l Université de Belgrave, Jack intègre une société secrète imprégnée de mystère et de magie.', '00:45:00', 'Semaine infernale (partie 01)', 401),
(2401, 'Grand-père expose sa théorie au sujet des attaques.', '00:47:00', 'Semaine Infernale (partie 02)', 401),
(3401, 'Une société secrète rivale cherche à recruter Jack. Plus tard, une leçon de magie lui ouvre les yeux sur le prix à payer pour chaque sort lancé.', '00:45:00', 'Introduction a l etique(partie 01)', 401),
(4401, 'Jack suggère de faire alliance avec les Chevaliers, et Randall lui enseigne comment maîtriser ses pouvoirs. De son côté, Edward prend Alyssa sous son aile.', '00:48:00', 'Introduction a l etique(partie 02)', 401),

(1501, 'Après avoir mis leur lycée à feu et à sang, Eda, Osman, Sinan et Kerem réalisent que seule Burcu, une jeune prof à l écoute, pourrait encore les sauver de l expulsion.', '01:02:00', 'Le premier regard', 501),
(2501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Uneadmiration mutuelle', 501),
(3501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'L envol du desir', 501),
(4501, 'Işık encourage Eda à poursuivre ses rêves. Après avoir soumis Tuncay à un test impitoyable, les amis rendent un jugement sans indulgence.', '01:02:00', 'Abscence et manque', 501),
(5501, 'Osman embringue Tuncay dans une magouille... dont il n avait pas anticipé les conséquences. Işık invente une excuse afin que Burcu et Kemal travaillent ensemble.', '01:02:00', 'Le profondeur des sentiments ', 501),
(6501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Jeux et enjeux ', 501),
(7501, 'Tuncay annonce une mauvaise nouvelle à Burcu. Un incident dans le labo neuf pousse Necdet à bout, et l expulsion de la petite bande n est plus qu une question d heures', '01:02:00', 'Changement de cap ', 501),
(8501, 'Après un conseil disciplinaire houleux, les cinq amis saisiront-ils leur dernière chance de faire ce qui semble être amende honorable ? Kemal et Burcu tombent des nues.', '01:02:00', 'Un moment unique ', 501),

(1502, 'La tension monte entre Burcu et Kemal. Furieuse, Işık passe à l action après avoir entendu parler du pacte honteux entre Necdet et ses amis.', '01:02:00', 'Episode 01 ', 502),
(2502, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Episode 02 ', 502),
(3502, 'Tombée sous le charme d Osman, Elif est anéantie par un malentendu. Kerem encourage Eda à persévérer dans son art. Kemal prend Sinan sous son aile.', '01:02:00', 'Episode 03 ', 502),
(4502, 'Lorsque tout espoir semble perdu, Işık se détache du groupe, mais Elif l incite à reconsidérer sa décision. Kerem envisage un choix déchirant.', '01:02:00', 'Episode 04 ', 502),
(5502, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Episode 05 ', 502),
(6502, 'Kerem et Eda se retrouvent dans une impasse. Necdet tombe dans le piège d Osman. Refusant de se soumettre à la pression parentale, Elif prend son courage à deux mains.', '01:02:00', 'Episode 06 ', 502),
(7502, 'Les amis se préparent pour les examens. Elif se ravise pendant son récital. Necdet tente de se dérober à une enquête en manipulant Yıldira.', '01:02:00', 'Episode 07 ', 502),
(8502, 'Le jour du jugement approche pour Necdet. Elif fait ses valises. Osman imagine une solution pour inciter Kerem à étudier.', '01:02:00', 'Episode 08 ', 502),

(1601, 'Alors qu un ouragan s abat sur Miami, la situation est tout aussi houleuse aux urgences de Maguire, où une grave accusation provoque des dissensions entre internes.', '00:50:00', 'Episode 01', 601),
(2601, 'La tempête redouble d intensité. Les urgences sont débordées et Danny doit faire des choix difficiles. Tom doit se montrer à la hauteur quand le sort frappe quelqu un de proche.', '00:50:00', 'Episode 02', 601),
(3601, 'Alors que les générateurs de secours de l hôpital faiblissent, la Dre Cruz s inquiète pour la sécurité de Vero. Sophie et Camila risquent tout pour sauver une patiente en péril.', '00:50:00', 'Episode 03', 601),
(4601, 'Les urgences sont saturées après la tempête. Danny jongle pour concilier l afflux de patients et l arrivée d une nouvelle titulaire qui connaît bien Xander.', '00:50:00', 'Episode 04', 601),
(5601, 'Un shérif adjoint charmeur a des vues sur Danny. Harper subit les parents désobligeants d une jeune patiente. Sophie fait face à un dilemme moral.', '00:50:00', 'Episode 05', 601),
(6601, 'Une visite à leur père acariâtre dans leur ville natale ravive des tensions entre Danny et Harper. Le jour de repos de Tom et du Dr Soriano prend une tournure inattendue.', '00:50:00', 'Episode 06', 601),
(7601, 'Pour choisir le prochain chef des internes, la Dre Cruz observe minutieusement Danny et Sam sur le terrain. Camila cherche à comprendre l étrange maladie d une fille de neuf ans.', '00:50:00', 'Episode 07', 601),
(8601, 'En attendant de passer un entretien avec les RH, Danny et Xander se penchent sur leur douloureux passé. Une crise met en évidence les conflits de loyauté qui hantent Tom.', '00:50:00', 'Episode 08', 601);


INSERT into `episode_realisateur` (`cle_episode`, `cle_real`) VALUES
(1101,1),(1101,2),
(2101,3),(2101,1),
(3101,1),
(4101,4),(4101,2),
(5101,5),

(1102,1),(1102,3),
(2102,3),(2102,5),
(3102,1),
(4102,4),(4102,2),

(1201,1),(1101,2),
(2201,3),(2101,1),
(3201,3),
(4201,4),(4101,5),
(5201,6),

(1301,4),
(2301,5),(2301,1),
(3301,3),(3301,4),
(4301,4),(4301,5),
(5301,6),

(1401,4),
(2401,5),(2401,1),
(3401,3),(3401,4),(3401,6),
(4401,4),(4401,5),

(1501,4),
(2501,5),
(3501,3),
(4501,4),
(5501,6),
(6501,4),
(7501,5),(7501,1),
(8501,3),(8501,4),(8501,6),

(1502,4),
(2502,5),(2501,3),
(3502,3),
(4502,4),
(5502,6),
(6502,4),(6501,1),(6501,2),
(7502,5),(7502,1),
(8502,3),(8502,4),(8502,6),

(1601,4),
(2601,5),
(3601,3),
(4601,4),
(5601,6),
(6601,4),
(7601,5),(7501,1),
(8601,3),(8601,4),(8601,6);