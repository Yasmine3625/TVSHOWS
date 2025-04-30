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
;
-- ajouter des acteurs a la base de donnees
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
(33, 'Marc Blucas', 'images/images_series/Walter_boys_act05.jpeg');

--remplir la table serie_tag
INSERT INTO `serie_tag`(`cle_serie`,`cle_tag`) VALUES
(1,5),(1,2),
(2,4),(2,6),(2,3),
(3,3),
(4,1),(4,5),(4,7),
(5,2),(5,4),
(6,1),(6,7),
(7,1),(7,2);

--remplir la table saison
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
('Saison 1',701, 'images/imeges_series/Walter_boys.jpeg',10,7);

--remplir la table saison_acteur
INSERT INTO `saison_acteur` (`cle_saison`, `cle_acteur`) VALUES
(101,21),(101,22),(101,23),(101,24),
(102,21),(102,22),(102,23),(102,24),
(201,1),(201,2),(201,3),(201,4),(201,5),(201,6),
(301,18),(301,19),(301,20),
(401,25),(401,26),(401,27),(401,28),
(501,12),(501,13),(501,14),(501,15),(501,16),(501,17),
(502,12),(502,13),(502,14),(502,15),(502,16),(502,17),
(601,7),(601,8),(601,9),(601,10),(601,11),
(701, 29),(701, 30),(701, 31),(701, 32),(701, 33)
;

--remplir la table realisateur
INSERT INTO `realisateur` (`cle_real`,`nom`, `image`) VALUES
(1, 'Liz Friedlander' , 'images/images_series/real01_the_rookie.jpeg'),
(2, 'Adam Davidson' , 'images/images_series/real02_the_rookie.jpeg'),
(3, 'Greg Beeman' , 'images/images_series/real03_the_rookie.jpeg'),
(4, 'Rob Bowman' , 'images/images_series/real04_the_rookie.jpeg'),
(5, 'Chris Grismer' , 'images/images_series/real01_originals.jpeg'),
(6, 'Brad Turner' , 'images/images_series/real02_originals.jpeg');

--remplir la table realisateur
INSERT INTO `episode`(`cle_episode`, `synopsis`, `duree`, `titre`,`id_saison`) VALUES
(1101,'John Nolan est un divorcé âgé de 45 ans qui, après avoir assisté à (et fait déjouer) un braquage de banque dans sa petite ville, décide de changer de vie : il déménage à Los Angeles et devient flic. Son affectation au sein de la police suscite le scepticisme de ses collègues officiers, en particulier de son commandant de quart, le sergent Wade Gray, et de son agent instructeur, Talia Bishop. Les premiers jours de travail de Nolan sont marqués par un conflit familial qui dégénère rapidement (au cours duquel Nolan est témoin de sa première mort), un père déséquilibré qui laisse son enfant dans une voiture verrouillée par une chaude journée et un criminel échappé qui teste rapidement Nolan comme jamais auparavant. Jackson West, fils d un officier haut gradé de la police de Los Angeles et désireux de respecter l héritage familial, rejoint également Nolan en tant qu officier recrue, ainsi que Lucy Chen, qui est devenue flic contre la volonté de ses parents thérapeutes et entretient une liaison secrète avec Nolan malgré le risque que cela pose pour sa carrière. Gray informe Nolan qu il fera tout ce qui est en son pouvoir pour le décourager de continuer à servir, craignant que le manque d expérience et l âge de Nolan mettent en danger la vie de ses officiers. Nolan dit à Gray qu il croit qu être un flic pourrait être sa vocation. Gray répond que si cela est vrai, rien de ce que Gray fera subir à Nolan ne le dissuadera.'
,'00:46:00','Premiers pas',101),
(2101,'Nolan persuade une femme de ne pas se suicider. Jackson est interrogé sur les raisons pour lesquelles il n a pas tiré avec son arme, mais Lopez le couvre. Elle le force alors à gérer l arrestation d un homme sous PCP, qu il maîtrise. Nolan et Bishop arrêtent une toxicomane pour possession de drogue, mais apprennent ensuite qu elle a poignardé à mort un adolescent au cours d une dispute. Chen est coincé avec un nouvel agent instructeur paresseux pendant que Tim se remet, et finit par arrêter un homme pour vol à l étalage. Nolan continue de faire face à des difficultés pour naviguer entre ses instincts civils et leur influence sur ses actions en tant que policier. Jackson est capable de maîtriser un suspect sans assistance. Nolan se voit attribuer une vieille voiture rouillée en guise de punition pour avoir endommagé son véhicule. Une victime d enlèvement est sauvée et Nolan et Bishop obtiennent une piste sur le ravisseur. Tout en l appréhendant, Bishop empêche Nolan de frapper avec colère le suspect. Le capitaine Anderson le remercie pour son succès, mais lui rappelle que ce n est pas à lui de punir les criminels. Chen découvre que Tim la intentionnellement assignée à un officier paresseux pour tester son engagement. Bishop parvient à obtenir un nouveau véhicule pour Nolan, qu il accidente presque lors de son premier trajet.',
'00:47:00','Pas de repos pour les braves',101),
(3101,'Nolan et Bishop poursuivent un groupe de voleurs et Nolan perd un sac d argent volé lorsqu un artiste de rue s enfuit avec. Le bureau apprend que les voleurs font partie d un gang qui a enchaîné des vols et ils commencent à chercher les membres restants du gang. Pendant ce temps, Chen aide Bradford à reprendre ses fonctions, tout en essayant d aider sa femme toxicomane. Celui-ci révèle à Chen qu elle était autrefois une policière spécialisée dans la drogue. Ailleurs, une arrestation d un ancien athlète d université oblige West et Lopez à parler de carrières alternatives au travail de policier car Lopez doute encore de la capacité de West à gérer le travail.',
'00:48:00','Plan B',101),
(4101,'Le Sergent Gray teste les recrues en interchangeant leur formateurs: il assigne Nolan à Lopez, West à Bradford et Chen à Bishop; et charge les recrues de mieux comprendre leurs nouveaux formateurs. Lopez accompagne Nolan au tribunal et Nolan finit par poursuivre un prisonnier évadé, menant à un développement potentiellement décisif pour la paire. Bradford, cependant, en apprend plus sur les difficultés de West lorsqu il panique pendant une fusillade et accompagne sa recrue à la rencontre d un agoraphobe qui donne des conseils à West pour faire face à ses peurs. Pendant ce temps, Chen défend sa relation avec Nolan auprès de Bishop lors de leur patrouille, ce qui a incité Nolan et Chen à parler de leur relation.',
'00:45:00','Changement d equipe',101)
(5101,'Nolan a du mal à faire face à sa rupture avec Chen au moment même où les formateurs lancent un concours annuel pour déterminer qui peut obtenir le plus d arrestations en un seul jour de travail. Bradford joue pour gagner, allant même jusqu à corrompre un répartiteur pour obtenir les meilleurs appels, ce qui inquiète Chen. Pendant ce temps, West plonge tête la première dans la compétition pour faire ses preuves alors que Nolan reste avec Bishop qui refuse de jouer.',
'00:46:00', 'Le tournoi', 101),

(1102,'Deux semaines après la fin de la saison 1, Nolan a déménagé dans une nouvelle maison et les recrues apprennent les résultats de leur examen. Ils réussissent tous le test, mais West nest pas satisfait par ses notes. L équipe entend parler de délits impliquant de faux uniformes de police après que Nolan et Grey sont intervenus sur un cambriolage dans un magasin d uniformes. Ils retrouvent plus tard le corps d un des voleurs, son complice l ayant assassiné. Chen surprend un faux officier de police voler une radio, mais elle n arrive pas à l arrêter. Plus tard, un employé de bureau de la cour de justice est enlevé et Nolan arrive à lui sauver la vie après avoir maîtrisé un faux officier de police. Toute l équipe arrêtent les autres faux officiers, qui tentaient de détourner un convoi contenant des preuves (drogue, armes, argent sale) devant être détruites pour les voler. West est rétrogradé par le Sergent Grey après avoir donné un très mauvais discours auprès de jeunes recrues un peu plus tôt. En conséquence, West ne peut pas porter l uniforme aux manches courtes comme ses coéquipiers.',
'00:48:00','Impact', 102),
(2102,'Nolan essaie de gérer sa relation avec Russo, et crée des liens avec Grace pendant qu il enquête sur un cas criminel avec l agent Lopez. West est assigné à l officier Smitty pour la journée, mais il a du mal avec son côté très nonchalant. Plus tard, West est en train de fouiller un criminel lorsque ce dernier s enfuit, laissant tomber son arme dans un jardin. Un jeune garçon le trouve et tue accidentellement sa mère avec.
Ils arrivent plus tard à capturer le criminel, après avoir découvert que l arme a déjà servi, mais West est bouleversé. Chen arrange un rendez-vous à Bradford avec Rachel Hall, une travailleuse sociale qui est son amie depuis la faculté, afin de gagner un pari. Chen découvre plus tard qu ils sortent ensemble : elle a remporté son pari et peut donc porter les manches courtes.',
'00:45:00', 'Le pari', 102),
(3102, 'Le propriétaire de West est arrêté et il se retrouve expulsé de son appartement. Nolan a un nouveau partenaire, le détective Nick Armstrong, avec qui il suit une enquête de meurtre. Chen est en colère contre Bradford, qui refuse qu elle porte l uniforme à manches courtes bien qu elle ait réussi ses examens. Pendant ce temps, le père de la victime assassine un des hommes qui ont tué son fils, avant de se suicider malgré les efforts de Nolan pour l en empêcher. West se prépare à demander à Smitty d habiter avec lui dans sa caravane, mais Chen lui propose d emménager avec elle.',
'00:46:00', 'Recherche appartement', 102),
(4102,'Nolan est assigné à son nouvel agent instructeur, le lieutenant Nyla Harper, dont il trouve les méthodes trop extrêmes. Bradford a du mal à trouver un cadeau d anniversaire pour Rachel et l officier Lopez est sur un cas qui lui rappelle des souvenirs personnels. L équipe aide à démanteler un cartel de drogue lors d un raid et Harper confronte un dealer qu elle a côtoyé dans son ancienne vie d agent infiltré.',
'00:50:00', 'Le billet en or', 102),

(1201,'L histoire est raconté du point de vue d Elijah. Déterminé à aider son frère à trouver la rédemption, Elijah suit Klaus dans le quartier français de La Nouvelle-Orléans et apprend bientôt qu Hayley Marshall a également rejoint le quartier français à la recherche d indices sur l histoire de sa famille mais est tombé entre les mains l une puissante sorcière nommée Sophie Deveraux.
Les tensions entre chaque partie surnaturelle de la ville sont à leur comble puisque Marcel a un pouvoir absolu et des disciples dévoués. Elijah révèle à Klaus les nouvelles au sujet de la grossesse de Hayley. Il convainc son frère d aider les sorcières à protéger Hayley ainsi que défier Marcel pour récupérer le trône de la ville. Klaus accepte de rester mais après s être installé dans ses nouveaux quartiers, il poignarde Elijah qui le plonge dans un sommeil profond et s engage à lutter contre Marcel et protéger Hayley.',
'01:02:00',' Retour a la Nouvelle-Orleans', 201),
(2201,'Rebekah arrive à la Nouvelle-Orléans à la recherche d Elijah, mais rencontre Hayley dans le manoir de Klaus où elle se confie à Rebekah sur son état inattendu. Rebekah, ne trouvant pas Elijah, cherche de l aide vers une Sophie réticente à savoir ce qui se passe et comment y faire face. Pendant ce temps, Hayley prend les choses en mains pour faire face à sa condition, mais les choses prennent rapidement une tournure dangereuse. Déterminé à découvrir l arme secrète de Marcel contre les sorcières, Klaus garde une longueur d avance sur lui, puisqu il continue à essayer de gagner sa confiance en travaillant à la discothèque de Marcel. Après que Rebekah ait eu une altercation avec Marcel, elle a des flashbacks de toute la colère et la déception que Klaus lui a causé tout au long des années. Ailleurs, Marcel enrôle l aide de Davina dans son propre plan dangereux.',
'00:59:45','À la reconquête du royaume', 201),
(3201,'Rebekah et Klaus se sont alliés afin de récupérer Elijah, détenu par l arme secrète anti-sorcières de Marcel qui, ironiquement, n est autre qu une sorcière elle-même. Davina, cette sorcière, est plus puissante que la normale puisqu elle a réussi à effacer la mémoire de Rebekah. Lorsque Klaus demande la restitution de son frère à Marcel, ce dernier refuse déclenchant alors le plan B de Rebekah et Klaus - à savoir la guerre. À la suite d un plan élaboré avec sa sœur, Klaus pousse Marcel à condamner son bras droit et tue la sorcière que ce dernier aimait. Klaus hypnotise Cami pour qu elle donne une autre chance à Marcel. Accordant un peu plus de confiance à Klaus, Marcel accepte de lui rendre Elijah. Cependant Davina refuse et dit qu ils le rendront une fois qu elle aura trouvé comment tuer les Originaux. Hayley annonce à Klaus qu elle pense être enceinte d une fille. L épisode se termine avec Hailey essayant de traduire ce que la sorcière qui lui a révélé le sexe de son bébé a dit lors de sa transe.',
'00:58:49','Les amants maudits', 201),
(4201,'Avec le festival annuel de musique de la rue Dauphine en vue, Davina, souhaitant profiter d une soirée, convainc Marcel de la laisser participer. Marcel accepte avec prudence mais demande à Camille de garder un œil vigilant sur Davina. Agnès convainc Hayley de consulter un médecin mystérieux dans le bayou où elle fait une découverte choquante. Pendant ce temps, Klaus prend un intérêt particulier en Camille, qui révèle des informations alarmantes sur son passé, et une Rebekah déterminée se lance dans une mission pour approfondir une rencontre étrange récente impliquant Elijah.',
'01:01:02','Nouvelles alliances', 201),
(5201,'Irrité par les récents événements impliquant la sécurité de son bébé à naître, Klaus exige des réponses de Sophie, croyant qu’elle est impliquée. Sophie révèle à Klaus et Rebekah un secret troublant de son passé. Pendant ce temps, Marcel demande à Klaus de l’accompagner dans le bayou après que des restes macabres aient été découverts, tandis que Rebekah, Sophie et Hayley se lancent dans leur propre mission. Davina se confie à un allié inattendu et révèle des informations choquantes sur les sorcières, conduisant finalement à une révélation troublante.',
'00:56:45','Le rituel de moisson', 201),

(1301, 'Le jour de son anniversaire, Jiwoo Yoon assiste à la mort atroce de son père. Prête à tout pour se venger, la jeune femme se lance à la recherche de l assassin.',
'00:45:00','Episode 01',301),
(2301,'Mujin Choi inflige une punition à Gangjae Do. Jiwoo intègre les forces de police sous couverture et change radicalement d identité.',
'00:46:00','Episode 02',301),
(3301,'Durant la traque d une cible imprévue avec son équipe, Jiwoo doit faire preuve de sang-froid. Un nouveau réseau de drogue et son chef menacent l empire de Mujin.',
'00:47:00','Episode 03',301),
(4301,'Pour Giho Cha, la déclaration de guerre de Gangjae contre Mujin vient à point nommé. Pildo Jeon suspecte Jiwoo de manigancer quelque chose et décide de la suivre.',
'00:50:00','Episode 04',301),
(5301,'Jiwoo et Pildo échappent au pire de justesse, reportant l attention de la police sur Gangjae. La présence d un visage familier au commissariat déstabilise Jiwoo.',
'00:46:00','Episode 05',301),

(1401,'Arrivé à l Université de Belgrave, Jack intègre une société secrète imprégnée de mystère et de magie. Très vite, une série de meurtres étranges terrorise le campus.',
'00:45:00', 'Semaine infernale (partie 01)',401 ),
(2401,'Grand-père expose sa théorie au sujet des attaques. Jack et Alyssa tentent de surveiller les autres apprentis. Au Temple, Jack rencontre un célèbre personnage.',
'00:47:00', 'Semaine Infernale (partie 02)', 401),
(3401,'Une société secrète rivale cherche à recruter Jack. Plus tard, une leçon de magie lui ouvre les yeux sur le prix à payer pour chaque sort lancé.',
'00:45:00', 'Introduction a l etique(partie 01)', 401),
(4401,'Jack suggère de faire alliance avec les Chevaliers, et Randall lui enseigne comment maîtriser ses pouvoirs. De son côté, Edward prend Alyssa sous son aile.',
'00:48:00', 'Introduction a l etique(partie 02)',401),

(1501,'Après avoir mis leur lycée à feu et à sang, Eda, Osman, Sinan et Kerem réalisent que seule Burcu, une jeune prof à l écoute, pourrait encore les sauver de l expulsion.',
'01:02:00', 'Le premier regard',501,),
(2501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.',
'01:02:00', 'Uneadmiration mutuelle',501),
(3501,'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.',
'01:02:00', 'L envol du desir',501),
(4501, 'Işık encourage Eda à poursuivre ses rêves. Après avoir soumis Tuncay à un test impitoyable, les amis rendent un jugement sans indulgence.',
'01:02:00', 'Abscence et manque',501),
(5501, 'Osman embringue Tuncay dans une magouille... dont il n avait pas anticipé les conséquences. Işık invente une excuse afin que Burcu et Kemal travaillent ensemble.',
'01:02:00', 'Le profondeur des sentiments ',501),
(6501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.',
'01:02:00', 'Jeux et enjeux ', 501),
(7501,'Tuncay annonce une mauvaise nouvelle à Burcu. Un incident dans le labo neuf pousse Necdet à bout, et l expulsion de la petite bande n est plus qu une question d heures',
'01:02:00', 'Changement de cap ',501),
(8501,'Après un conseil disciplinaire houleux, les cinq amis saisiront-ils leur dernière chance de faire ce qui semble être amende honorable ? Kemal et Burcu tombent des nues.',
'01:02:00', 'Un moment unique ',501),

(1502,'La tension monte entre Burcu et Kemal. Furieuse, Işık passe à l action après avoir entendu parler du pacte honteux entre Necdet et ses amis.',
'01:02:00', 'Episode 01 ',502),
(2502,'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.',
'01:02:00', 'Episode 02 ',502),
(3502'Tombée sous le charme d Osman, Elif est anéantie par un malentendu. Kerem encourage Eda à persévérer dans son art. Kemal prend Sinan sous son aile.',
'01:02:00', 'Episode 03 ',502),
(4502,'Lorsque tout espoir semble perdu, Işık se détache du groupe, mais Elif l incite à reconsidérer sa décision. Kerem envisage un choix déchirant.',
'01:02:00', 'Episode 04 ',502),
(5502,'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.',
'01:02:00', 'Episode 05 ',502),
(6502,'Kerem et Eda se retrouvent dans une impasse. Necdet tombe dans le piège d Osman. Refusant de se soumettre à la pression parentale, Elif prend son courage à deux mains.',
'01:02:00', 'Episode 06 ',502),
(7502,'Les amis se préparent pour les examens. Elif se ravise pendant son récital. Necdet tente de se dérober à une enquête en manipulant Yıldıra',
'01:02:00', 'Episode 07 ',502),
(8502,'Le jour du jugement approche pour Necdet. Elif fait ses valises. Osman imagine une solution pour inciter Kerem à étudier.',
'01:02:00', 'Episode 08 ',502),

(1601,'Alors qu on ouragan s abat sur Miami, la situation est tout aussi houleuse aux urgences de Maguire, où une grave accusation provoque des dissensions entre internes.',
'00:50:00', 'Episode 01', 601),
(2601, 'La tempête redouble d intensité. Les urgences sont débordées et Danny doit faire des choix difficiles. Tom doit se montrer à la hauteur quand le sort frappe quelqu un de proche.',
'00:50:00', 'Episode 02', 601),
(3601,'Alors que les générateurs de secours de l hôpital faiblissent, la Dre Cruz s inquiète pour la sécurité de Vero. Sophie et Camila risquent tout pour sauver une patiente en péril.',
'00:50:00', 'Episode 03', 601),
(4601, 'Les urgences sont saturées après la tempête. Danny jongle pour concilier l afflux de patients et l arrivée d une nouvelle titulaire qui connaît bien Xander.',
'00:50:00',  'Episode 04', 601),
(5601, 'Un shérif adjoint charmeur a des vues sur Danny. Harper subit les parents désobligeants d une jeune patiente. Sophie fait face à un dilemme moral.',
'00:50:00', 'Episode 05', 601),
(6601, 'Une visite à leur père acariâtre dans leur ville natale ravive des tensions entre Danny et Harper. Le jour de repos de Tom et du Dr Soriano prend une tournure inattendue.',
'00:50:00', 'Episode 06', 601),
(7601, 'Pour choisir le prochain chef des internes, la Dre Cruz observe minutieusement Danny et Sam sur le terrain. Camila cherche à comprendre l étrange maladie d une fille de neuf ans.',
'00:50:00', 'Episode 07', 601),
(8601, 'En attendant de passer un entretien avec les RH, Danny et Xander se penchent sur leur douloureux passé. Une crise met en évidence les conflits de loyauté qui hantent Tom.',
'00:50:00', 'Episode 08', 601)
;


--remplir la table episode_realisateur
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