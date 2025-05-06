-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 mai 2025 à 21:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tv_shows`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `cle_act` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`cle_act`, `nom`, `image`) VALUES
(1, 'Danielle Rose Russel', 'originals_act06.webp'),
(2, 'Joseph Morgan', 'originals_act01.webp'),
(3, 'Daniel Gillies', 'originals_act02.webp'),
(4, 'Phoebe Tonkin', 'originals_act03.webp'),
(5, 'Charles Michael Davis', 'originals_act04.webp'),
(6, 'Claire Holt', 'originals_act05.webp'),
(7, 'Colin Woodell', 'Pulse_act02.jpg'),
(8, 'Willa Fitzgerald', 'Pulse_act01.jpeg'),
(9, 'Justina Machado', 'Pulse_act03.webp'),
(10, 'Jack Bannon', 'Pulse_act04.webp'),
(11, 'Daniela Nieves', 'Pulse_act05.webp'),
(12, 'Mert Yazicioglu', 'Love101_act01.webp'),
(13, 'Ipek Filiz Yazici', 'Love101_act02.webp'),
(14, 'Alina Boz', 'Love101_act03.webp'),
(15, 'Kubilay Aka', 'Love101_act04.webp'),
(16, 'Pinar Deniz', 'Love101_act05.webp'),
(17, 'Kaan Urgancioglu', 'Love101_act06.webp'),
(18, 'Han So-hee', 'My_name_act01.jpeg'),
(19, 'Ahn Bo-hyun', 'My_name_act02.jpeg'),
(20, 'Park Hee-soon', 'My_name_act03.jpeg'),
(21, 'Nathan Fillion', 'the_rookie_act01.jpeg'),
(22, 'Eric Winter', 'the_rookie_act02.jpeg'),
(23, 'Melissa O`Neil', 'the_rookie_act03.jpeg'),
(24, 'Mekia Cox', 'the_rookie_act04.jpeg'),
(25, 'Nicholas Hoult', 'the_order_act01.jpeg'),
(26, 'Jude law', 'the_order_act02.jpeg'),
(27, 'Tye Sheridan', 'the_order_act03.jpeg'),
(28, 'Odessa Yong', 'the_order_act04.jpeg'),
(29, 'Noah LaLonde', 'Walter_boys_act01.jpeg'),
(30, 'Nikki Rodriguez ', 'Walter_boys_act02.jpeg'),
(31, 'Ashby', 'Walter_boys_act03.jpeg'),
(32, 'Sarah Rafferty', 'Walter_boys_act04.jpeg'),
(33, 'Marc Blucas', 'Walter_boys_act05.jpeg'),
(34, 'Úrsula Corberó', 'casa_de_papel_act01.jpeg'),
(35, 'Álvaro Morte', 'casa_de_papel_act02.webp'),
(36, 'Itziar Ituño', 'casa_de_papel_act03.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `cle_episode` int(11) NOT NULL,
  `synopsis` text DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `id_saison` int(11) DEFAULT NULL,
  `numero_episode` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`cle_episode`, `synopsis`, `duree`, `titre`, `id_saison`, `numero_episode`) VALUES
(1017, 'Le professeur recrute une jeune braqueuse et sept autres criminels en vue d’un cambriolage grandiose ciblant la Fabrique de la monnaie et du timbre d’Espagne.\r\n\r\nLe jour du braquage, après avoir réussi à rentrer en détournant un camion, la bande de malfaiteurs se retrouve cernée par les autorités et doit se retrancher dans la Maison de la Monnaie avec 67 otages. Ainsi commence le plan mis en place par le Professeur.', '00:00:58', 'Effectuer la décision', 17, 1),
(1018, 'Trois ans ont passé depuis le braquage. Rio est localisé et fait prisonnier, Tokyo lance un appel de détresse au Professeur et l\'équipe se reforme autour d\'un audacieux plan de sauvetage. Un nouveau braquage se prépare.', '00:00:50', 'On est de retour', 18, 1),
(1101, 'John Nolan est un divorcé âgé de 45 ans qui, après avoir assisté à (et fait déjouer) un braquage de banque dans sa petite ville, décide de changer de vie : il déménage à Los Angeles et devient flic.', '00:46:00', 'Premiers pas', 101, 1),
(1102, 'Deux semaines après la fin de la saison 1, Nolan a déménagé dans une nouvelle maison et les recrues apprennent les résultats de leur examen. Ils réussissent tous le test.', '00:48:00', 'Impact', 102, 1),
(1201, 'L histoire est raconté du point de vue d Elijah. Déterminé à aider son frère à trouver la rédemption.', '01:02:00', 'Retour a la Nouvelle-Orleans', 201, 1),
(1301, 'Le jour de son anniversaire, Jiwoo Yoon assiste à la mort atroce de son père. Prête à tout pour se venger.', '00:45:00', 'Episode 01', 301, 1),
(1401, 'Arrivé à l Université de Belgrave, Jack intègre une société secrète imprégnée de mystère et de magie.', '00:45:00', 'Semaine infernale (partie 01)', 401, 1),
(1501, 'Après avoir mis leur lycée à feu et à sang, Eda, Osman, Sinan et Kerem réalisent que seule Burcu, une jeune prof à l écoute, pourrait encore les sauver de l expulsion.', '01:02:00', 'Le premier regard', 501, 1),
(1502, 'La tension monte entre Burcu et Kemal. Furieuse, Işık passe à l action après avoir entendu parler du pacte honteux entre Necdet et ses amis.', '01:02:00', 'Episode 01 ', 502, 1),
(1601, 'Alors qu un ouragan s abat sur Miami, la situation est tout aussi houleuse aux urgences de Maguire, où une grave accusation provoque des dissensions entre internes.', '00:50:00', 'Episode 01', 601, 1),
(1701, 'Lors d’une fête lycéenne, Jackie Howards attend avec impatience sa grande sœur Lucy qui est censée rentrer pour les vacances. Mais l’adolescente a la surprise de voir arriver son oncle Richard qui est venu lui annoncer une terrible nouvelle. À la suite de cet événement tragique, elle est contrainte d’aller vivre chez Katherine et George Walter, un couple qui vit dans le Colorado avec ses nombreux enfants dans un environnement très différent de celui auquel elle était habituée à New York. Au sein du foyer comme au lycée, Jackie tente tant bien que mal de s’adapter à ce nouveau cadre.', '00:00:49', 'Bienvenue dans le Colorado', 701, 1),
(1801, 'Lorsque Mercredi est expulsée de son école après une farce délicieusement malicieuse, ses parents l\'envoient à l\'Académie Nevermore, le pensionnat où ils sont tombés amoureux.', '00:00:56', 'Mercredi porte-malheur', 801, 1),
(1901, 'In 2003, a mass fungal infection of mutated Cordyceps sparks a global pandemic and the collapse of society. Joel flees with his daughter, Sarah, and brother, Tommy, from their Texas home; Sarah is killed by a soldier. Twenty years later, Joel lives in a quarantine zone (QZ) in Boston managed by the Federal Disaster Response Agency (FEDRA),', '00:00:51', 'When You\'re Lost in the Darkness', 901, 1),
(2017, 'Raquel, qui gère les négociations pour la libération des otages, établit un contact avec le Professeur. L’un des otages est un élément clé du plan des cambrioleurs.', '00:00:56', 'Des imprudences mortelles', 17, 2),
(2018, 'Le braquage de la banque d’Espagne afin de récupérer Rio commence : le groupe précédent, renforcé par de nouvelles recrues, utilise l’argent du précédent coup à leur avantage en larguant 140 millions d’euros en guise de diversion et profité du chaos pour pénétrer dans la banque.', '00:00:52', 'Aikido', 18, 2),
(2101, 'Nolan persuade une femme de ne pas se suicider. Jackson est interrogé sur les raisons pour lesquelles il n a pas tiré avec son arme, mais Lopez le couvre.', '00:47:00', 'Pas de repos pour les braves', 101, 2),
(2102, 'Nolan essaie de gérer sa relation avec Russo, et crée des liens avec Grace pendant qu il enquête sur un cas criminel avec l agent Lopez.', '00:45:00', 'Le pari', 102, 2),
(2201, 'Rebekah arrive à la Nouvelle-Orléans à la recherche d Elijah, mais rencontre Hayley dans le manoir de Klaus où elle se confie à Rebekah sur son état inattendu.', '00:59:45', 'À la reconquête du royaume', 201, 2),
(2301, 'Mujin Choi inflige une punition à Gangjae Do. Jiwoo intègre les forces de police sous couverture.', '00:46:00', 'Episode 02', 301, 2),
(2401, 'Grand-père expose sa théorie au sujet des attaques.', '00:47:00', 'Semaine Infernale (partie 02)', 401, 2),
(2501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Uneadmiration mutuelle', 501, 2),
(2502, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Episode 02 ', 502, 2),
(2601, 'La tempête redouble d intensité. Les urgences sont débordées et Danny doit faire des choix difficiles. Tom doit se montrer à la hauteur quand le sort frappe quelqu un de proche.', '00:50:00', 'Episode 02', 601, 2),
(2701, 'En partant courir de bon matin, Jackie surprend une fille sortant de la chambre de Cole. Elle croise ensuite Nathan qui s\'apprête lui aussi à faire un footing. Le garçon lui propose de se joindre à elle. Jackie lui pose des questions sur Cole. Nathan lui apprend que son frère était jusqu\'il y a peu un excellent joueur de football américain mais qu\'il a dû arrêter subitement à la suite d\'une fracture à la jambe. Plus tard, Jackie veut prendre une douche mais la salle de bain de l\'étage est occupée et elle est contrainte d\'aller dans celle du bas. Une mauvaise surprise l\'y attend.', '00:00:39', 'Lacher prise', 701, 2),
(2801, 'Le shérif interroge Mercredi concernant l\'étrange incident nocturne. Plus tard, Mercredi affronte une rivale féroce lors de l\'impitoyable course de la Coupe Allan Poe.', '00:00:50', 'Un malheur qui arrive toujours seul', 801, 2),
(2901, 'Two days before the worldwide outbreak, in Jakarta, Indonesia, government officials show an infected corpse to a mycologist, who tells them there is no cure or vaccine and advises bombing the entire city to prevent further outbreak. In the present, Ellie explains to Joel and Tess that she is being transported west in hopes of being used to find a cure. Discovering that the path to the State House is swarmed with the infected, they cut through a history museum, where they are attacked by blind infected known as \"clickers\" and Ellie is bitten. They arrive at the State House but find the Fireflies dead. Tess reveals she was bitten, while Ellie\'s bite begins to heal, proving her immunity. Joel shoots an infected, which alerts the swarm to their location. Tess convinces him to escape and take Ellie to their allies in Lincoln, Massachusetts, while she stays behind, blowing up the building and killing herself along with the horde.', '00:00:53', 'Infected', 901, 2),
(3000, 'Joel and Ellie begin the hike to meet with Bill and Frank. Ellie sees evidence of the government\'s execution of innocents during the early days of the pandemic. Back in 2007, Frank leaves Baltimore and stumbles upon the compound of Bill, a paranoid survivalist who reluctantly takes him in. The men begin a romance, sharing a love of music and food. Years later, Frank contacts Tess by radio and the two groups enter a tenuous friendship. In the present, Frank is terminally ill and asks Bill to assist his suicide after they marry. Bill, not wanting to live without Frank, kills himself as well. When Joel and Ellie arrive, they discover a letter Bill left for Joel. Bill wrote that protecting Frank gave his life meaning and that he has bequeathed all his supplies to Joel and Tess. Unbeknownst to Joel, Ellie takes Frank\'s pistol. They take Bill\'s truck and set out to find Tommy.', '00:00:51', 'Long, Long Time', 0, 3),
(3017, 'La police identifie un des cambrioleurs. Raquel se méfie de l’homme qu’elle a rencontré dans un bar, qui n’est nul autre que le Professeur.', '00:00:55', 'Erreur après avoir fait feu', 17, 3),
(3018, 'Une fois dans la banque, les braqueurs doivent désormais neutraliser la garde du gouverneur afin d’utiliser ce dernier. Cela ne se fait pas sans accros et Palerme, chef du groupe dans la banque, est blessé. Dehors, le colonel Prieto laisse sa place au colonel Tamayo et à l’inspectrice Sierra, moins procéduriers, pour arrêter les braqueurs au plus vite.', '00:00:49', '48 mètres sous terre', 18, 3),
(3101, 'Nolan et Bishop poursuivent un groupe de voleurs et Nolan perd un sac d argent volé lorsqu un artiste de rue s enfuit avec. Le bureau apprend que les voleurs', '00:48:00', 'Plan B', 101, 3),
(3102, 'Le propriétaire de West est arrêté et il se retrouve expulsé de son appartement.', '00:46:00', 'Recherche appartement', 102, 3),
(3201, 'Rebekah et Klaus se sont alliés afin de récupérer Elijah, détenu par l arme secrète anti-sorcières de Marcel.', '00:58:49', 'Les amants maudits', 201, 3),
(3301, 'Durant la traque d une cible imprévue avec son équipe, Jiwoo doit faire preuve de sang-froid.', '00:47:00', 'Episode 03', 301, 3),
(3401, 'Une société secrète rivale cherche à recruter Jack. Plus tard, une leçon de magie lui ouvre les yeux sur le prix à payer pour chaque sort lancé.', '00:45:00', 'Introduction a l etique(partie 01)', 401, 3),
(3501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'L envol du desir', 501, 3),
(3502, 'Tombée sous le charme d Osman, Elif est anéantie par un malentendu. Kerem encourage Eda à persévérer dans son art. Kemal prend Sinan sous son aile.', '01:02:00', 'Episode 03 ', 502, 3),
(3601, 'Alors que les générateurs de secours de l hôpital faiblissent, la Dre Cruz s inquiète pour la sécurité de Vero. Sophie et Camila risquent tout pour sauver une patiente en péril.', '00:50:00', 'Episode 03', 601, 3),
(3701, 'Un match de football américain opposant l\'équipe de Silver Falls à celle de Lockwood va bientôt avoir lieu. Au lycée, Olivia vient parler à Jackie pour la remercier de n\'avoir dit à personne qu\'elle l\'avait vue sortir de la chambre de Cole. Les deux filles se rendent ensuite à une réunion du conseil des élèves où Erin leur apprend qu\'il faut trouver de toute urgence des fonds pour financer les travaux de rénovation de l\'auditorium de l\'établissement. Jackie propose de faire une vente aux enchères avec l\'aide des commerçants de la ville. Erin rejette son idée mais finit par s\'incliner après un vote à main levé qui va dans le sens de Jackie.', '00:00:42', 'L\'effet de Cole', 701, 3),
(3801, 'Mercredi tombe par hasard sur une société secrète. Pendant la Journée du Lien, les marginaux de Nevermore se mêlent aux normis de Jericho dans le Monde des Pèlerins.', '00:00:52', 'Malheur à mes ennemis ?', 801, 3),
(4017, 'Raquel traverse une crise personnelle. Les otages prennent peur en entendant des coups de feu. Les cambrioleurs n’arrivent pas à se mettre d’accord.', '00:00:52', 'Un cheval de Troie', 17, 4),
(4018, 'Le groupe de braqueurs commence à forcer la porte du coffre caché en double fond du premier coffre, déjà inondé. Le Professeur s\'attendait à ce que l\'accès soit compliqué, mais il est surpris par le colonel Tamayo et l\'agent Sierra, prêts à prendre des mesures radicales et illégales pour sortir le gang au plus vite de la banque.', '00:00:48', 'L\'Heure du dauphin', 18, 4),
(4101, 'Le Sergent Gray teste les recrues en interchangeant leur formateurs: il assigne Nolan à Lopez, West à Bradford et Chen à Bishop; et charge les recrues de mieux comprendre leurs nouveaux formateurs.', '00:45:00', 'Changement d equipe', 101, 4),
(4102, 'Nolan est assigné à son nouvel agent instructeur, le lieutenant Nyla Harper, dont il trouve les méthodes trop extrêmes.', '00:50:00', 'Le billet en or', 102, 4),
(4201, 'Avec le festival annuel de musique de la rue Dauphine en vue, Davina, souhaitant profiter d une soirée.', '01:01:02', 'Nouvelles alliances', 201, 4),
(4301, 'Pour Giho Cha, la déclaration de guerre de Gangjae contre Mujin vient à point nommé.', '00:50:00', 'Episode 04', 301, 4),
(4401, 'Jack suggère de faire alliance avec les Chevaliers, et Randall lui enseigne comment maîtriser ses pouvoirs. De son côté, Edward prend Alyssa sous son aile.', '00:48:00', 'Introduction a l etique(partie 02)', 401, 4),
(4501, 'Işık encourage Eda à poursuivre ses rêves. Après avoir soumis Tuncay à un test impitoyable, les amis rendent un jugement sans indulgence.', '01:02:00', 'Abscence et manque', 501, 4),
(4502, 'Lorsque tout espoir semble perdu, Işık se détache du groupe, mais Elif l incite à reconsidérer sa décision. Kerem envisage un choix déchirant.', '01:02:00', 'Episode 04 ', 502, 4),
(4601, 'Les urgences sont saturées après la tempête. Danny jongle pour concilier l afflux de patients et l arrivée d une nouvelle titulaire qui connaît bien Xander.', '00:50:00', 'Episode 04', 601, 4),
(4701, 'Jackie reçoit une notification sur son téléphone lui rappelant que c’est le jour de l’anniversaire de sa sœur Lucy. Elle déballe des cartons et en sort une théière qu\'elle descend à la cuisine. Mais juste après, Parker la renverse et la brise en plusieurs morceaux. Au lycée, Alex s\'inquiète car il trouve que Jackie est taiseuse. L\'adolescente prétend alors avoir simplement mal à la tête. Voyant qu’elle ne va pas bien, Cole propose à l\'adolescente de passer l’après-midi dans un chalet près d’un lac avec d’autres élèves. Mais cette virée implique de sécher les cours.', '00:00:43', 'Dix-neuf', 701, 4),
(4801, 'Le bal des malheurs est le quatrième épisode de la première saison de la série Mercredi. Il a été diffusé le 23 novembre 2022 sur Netflix.', '00:00:53', 'Le bal des malheurs', 801, 4),
(4901, 'Traveling through Missouri, Joel and Ellie are forced to take a detour through Kansas City, where they are ambushed. Joel kills two of the bandits, but a third overpowers him and nearly chokes him to death before Ellie saves him by shooting the man with Frank\'s pistol. More bandits find the bodies; their leader, Kathleen, believes Joel and Ellie might be in contact with a man named Henry and orders a manhunt. Joel counsels Ellie about the firefight and gives her the pistol back. Kathleen\'s second-in-command Perry thinks he has found Henry\'s hideout, but something is growing under the building. Kathleen orders it kept secret until they find Henry. Joel and Ellie sleep in a high-rise apartment for the night, hoping they can scout a way out of the city in daylight. They awaken to find Henry and his younger brother Sam holding them at gunpoint.', '00:00:50', 'Please Hold to My Hand', 901, 4),
(5000, 'Henry and Sam make a tentative truce with Joel and Ellie. Joel wants to part ways, but Henry proposes they escape the city together using underground tunnel routes that only Henry knows; Joel hesitantly agrees. Henry confesses to Joel he was responsible for the death of Kathleen\'s brother, turning him over to FEDRA in exchange for medication for Sam\'s leukemia. Ellie and Sam quickly become friends. After escaping through the tunnels, the group is attacked by a sniper from an upper-story window. Joel sneaks up and kills him, but finds out he was radioing Kathleen, who arrives with her militia. Before Kathleen can kill Henry, a horde of infected emerge from underground, including a large \"bloater\" that beheads Perry and a child clicker that mauls Kathleen. After the group escape to a motel, Sam shows Ellie he was bitten on the leg. The next morning, Sam is infected and attacks Ellie; Henry kills him before killing himself. Joel and Ellie bury them and set off on foot heading west.', '00:00:52', 'Endure and Survive', 0, 5),
(5017, 'Les cambrioleurs laissent des médecins entrer dans l\'édifice et un policier s\'infiltre parmi eux. Le professeur saura-t-il garder une longueur d\'avance sur Raquel ?', '00:00:57', 'Le jour de la marmotte', 17, 5),
(5018, 'Denver parvient à arrêter l\'assaut lancé par Tamayo en montrant au grand public que le deuxième coffre a été forcé, révélant l\'existence de son contenu : des documents confidentiels sur les secrets gouvernementaux. Le colonel compte désormais sur l\'agent Sierra pour créer des tensions dans le gang.', '00:00:50', 'Boum, boum, ciao', 18, 5),
(5101, 'Nolan a du mal à faire face à sa rupture avec Chen au moment même où les formateurs lancent un concours annuel pour déterminer qui peut obtenir le plus d arrestations en un seul jour de travail.', '00:46:00', 'Le tournoi', 101, 5),
(5201, 'Irrité par les récents événements impliquant la sécurité de son bébé à naître, Klaus exige des réponses de Sophie.', '00:56:45', 'Le rituel de moisson', 201, 5),
(5301, 'Jiwoo et Pildo échappent au pire de justesse, reportant l attention de la police sur Gangjae.', '00:46:00', 'Episode 05', 301, 5),
(5501, 'Osman embringue Tuncay dans une magouille... dont il n avait pas anticipé les conséquences. Işık invente une excuse afin que Burcu et Kemal travaillent ensemble.', '01:02:00', 'Le profondeur des sentiments ', 501, 5),
(5502, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Episode 05 ', 502, 5),
(5601, 'Un shérif adjoint charmeur a des vues sur Danny. Harper subit les parents désobligeants d une jeune patiente. Sophie fait face à un dilemme moral.', '00:50:00', 'Episode 05', 601, 5),
(5701, 'Dans la famille Walter, la tradition exige que chaque membre prépare un plat différent pour Thanksgiving. Katherine propose à Jackie de participer à ce rituel mais l’adolescente n’en a pas envie. Au lycée, Alex prend Jackie à part à la fin d’un cours et lui demande ce qui se passe car il a le sentiment que l’adolescente l’évite. Elle lui assure avoir simplement été assez prise ces derniers temps. Le jeune homme se confie ensuite à Kiley et lui avoue qu’il regrette de ne pas avoir embrassé Jackie lorsqu’il en a eu l’occasion. Il demande conseil à son amie qui lui recommande de trouver un nouveau moment propice en proposant à celle qu\'il convoite une activité qui aurait vraiment du sens pour elle.', '00:00:45', 'Thanksgiving', 701, 5),
(5801, 'Lors du week-end des parents, Mercredi fouille dans le passé de sa famille, et fait involontairement arrêter son père. Enid sent la pression de « transmuter ».', '00:00:50', '30 ans de malheur', 801, 5),
(5901, 'Henry and Sam make a tentative truce with Joel and Ellie. Joel wants to part ways, but Henry proposes they escape the city together using underground tunnel routes that only Henry knows; Joel hesitantly agrees. Henry confesses to Joel he was responsible for the death of Kathleen\'s brother, turning him over to FEDRA in exchange for medication for Sam\'s leukemia. Ellie and Sam quickly become friends. After escaping through the tunnels, the group is attacked by a sniper from an upper-story window. Joel sneaks up and kills him, but finds out he was radioing Kathleen, who arrives with her militia. Before Kathleen can kill Henry, a horde of infected emerge from underground, including a large \"bloater\" that beheads Perry and a child clicker that mauls Kathleen. After the group escape to a motel, Sam shows Ellie he was bitten on the leg. The next morning, Sam is infected and attacks Ellie; Henry kills him before killing himself. Joel and Ellie bury them and set off on foot heading west.', '00:00:52', 'Endure and Survive', 901, 5),
(6017, 'L\'état de Monica s\'aggrave. Le Professeur se délecte après sa dernière ruse. Rio est troublé par une nouvelle dont il prend connaissance à la télévision.', '00:00:56', 'La guerre chaude et froide', 17, 6),
(6018, 'Afin d\'empêcher le Professeur d\'utiliser les documents du coffre caché, l\'agent Sierra suggère de noyer les révélations dans des fake news. Pour le Professeur, une offensive est imminente sur la Banque et Palerme est prêt à prendre les armes pour se défendre.', '00:00:50', 'Plus rien n\'avait d\'importance', 18, 6),
(6501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Jeux et enjeux ', 501, 6),
(6502, 'Kerem et Eda se retrouvent dans une impasse. Necdet tombe dans le piège d Osman. Refusant de se soumettre à la pression parentale, Elif prend son courage à deux mains.', '01:02:00', 'Episode 06 ', 502, 6),
(6601, 'Une visite à leur père acariâtre dans leur ville natale ravive des tensions entre Danny et Harper. Le jour de repos de Tom et du Dr Soriano prend une tournure inattendue.', '00:50:00', 'Episode 06', 601, 6),
(6701, 'Jackie vit à présent au grand jour sa relation naissante avec l’un des frères Walter, lequel se montre particulièrement démonstratif en public. Alors que la fête du feu de joie est attendue avec impatience par de nombreux élèves du lycée de Silver Falls, Olivia et Erin ont décidé d’y aller ensemble. La nature de la relation de cette dernière avec Cole reste ambiguë, y compris pour la jeune fille elle-même. Quant à Nathan, il offre à Skylar une playlist musicale sur une clé USB dont il a lui-même choisi les titres. Ce dernier le remercie chaleureusement pour cette attention', '00:00:46', 'Lourd à porter', 701, 6),
(6801, 'La Saison 1 de Mercredi est la première saison de la série Mercredi. Elle est sortie sur Netflix le 23 novembre 2022 et elle se compose de huit épisodes. Brillante, sarcastique et un peu morte', '00:00:51', 'Malheureux anniversaire', 801, 6),
(6901, 'No.\r\noverall	No. in\r\nseason	Title	Directed by	Written by	Original release date	U.S. viewers\r\n(millions)\r\n1	1	\"When You\'re Lost in the Darkness\"	Craig Mazin	Craig Mazin & Neil Druckmann	January 15, 2023	0.588[52]\r\nIn 2003, a mass fungal infection of mutated Cordyceps sparks a global pandemic and the collapse of society. Joel flees with his daughter, Sarah, and brother, Tommy, from their Texas home; Sarah is killed by a soldier. Twenty years later, Joel lives in a quarantine zone (QZ) in Boston managed by the Federal Disaster Response Agency (FEDRA), working as a smuggler with his partner, Tess. When Tommy fails to contact them from Wyoming, they pay a local dealer, Robert, for a car battery but he scams them and sells it to the Fireflies, a rebel group opposing FEDRA. Attempting to retrieve it, Joel and Tess encounter Marlene, the Fireflies\' leader, who begs them to take a teenager named Ellie to the Massachusetts State House in exchange for a working truck. While sneaking out of the QZ, the three run into a soldier on the outside. He tests them for the infection and reveals Ellie is positive. Joel kills the soldier and Ellie claims to be immune to the infection.\r\n2	2	\"Infected\"	Neil Druckmann	Craig Mazin	January 22, 2023	0.633[53]\r\nTwo days before the worldwide outbreak, in Jakarta, Indonesia, government officials show an infected corpse to a mycologist, who tells them there is no cure or vaccine and advises bombing the entire city to prevent further outbreak. In the present, Ellie explains to Joel and Tess that she is being transported west in hopes of being used to find a cure. Discovering that the path to the State House is swarmed with the infected, they cut through a history museum, where they are attacked by blind infected known as \"clickers\" and Ellie is bitten. They arrive at the State House but find the Fireflies dead. Tess reveals she was bitten, while Ellie\'s bite begins to heal, proving her immunity. Joel shoots an infected, which alerts the swarm to their location. Tess convinces him to escape and take Ellie to their allies in Lincoln, Massachusetts, while she stays behind, blowing up the building and killing herself along with the horde.\r\n3	3	\"Long, Long Time\"	Peter Hoar	Craig Mazin	January 29, 2023	0.747[54]\r\nJoel and Ellie begin the hike to meet with Bill and Frank. Ellie sees evidence of the government\'s execution of innocents during the early days of the pandemic. Back in 2007, Frank leaves Baltimore and stumbles upon the compound of Bill, a paranoid survivalist who reluctantly takes him in. The men begin a romance, sharing a love of music and food. Years later, Frank contacts Tess by radio and the two groups enter a tenuous friendship. In the present, Frank is terminally ill and asks Bill to assist his suicide after they marry. Bill, not wanting to live without Frank, kills himself as well. When Joel and Ellie arrive, they discover a letter Bill left for Joel. Bill wrote that protecting Frank gave his life meaning and that he has bequeathed all his supplies to Joel and Tess. Unbeknownst to Joel, Ellie takes Frank\'s pistol. They take Bill\'s truck and set out to find Tommy.\r\n4	4	\"Please Hold to My Hand\"	Jeremy Webb	Craig Mazin	February 5, 2023	0.991[55]\r\nTraveling through Missouri, Joel and Ellie are forced to take a detour through Kansas City, where they are ambushed. Joel kills two of the bandits, but a third overpowers him and nearly chokes him to death before Ellie saves him by shooting the man with Frank\'s pistol. More bandits find the bodies; their leader, Kathleen, believes Joel and Ellie might be in contact with a man named Henry and orders a manhunt. Joel counsels Ellie about the firefight and gives her the pistol back. Kathleen\'s second-in-command Perry thinks he has found Henry\'s hideout, but something is growing under the building. Kathleen orders it kept secret until they find Henry. Joel and Ellie sleep in a high-rise apartment for the night, hoping they can scout a way out of the city in daylight. They awaken to find Henry and his younger brother Sam holding them at gunpoint.\r\n5	5	\"Endure and Survive\"	Jeremy Webb	Craig Mazin	February 12, 2023[a]	0.382[57]\r\nHenry and Sam make a tentative truce with Joel and Ellie. Joel wants to part ways, but Henry proposes they escape the city together using underground tunnel routes that only Henry knows; Joel hesitantly agrees. Henry confesses to Joel he was responsible for the death of Kathleen\'s brother, turning him over to FEDRA in exchange for medication for Sam\'s leukemia. Ellie and Sam quickly become friends. After escaping through the tunnels, the group is attacked by a sniper from an upper-story window. Joel sneaks up and kills him, but finds out he was radioing Kathleen, who arrives with her militia. Before Kathleen can kill Henry, a horde of infected emerge from underground, including a large \"bloater\" that beheads Perry and a child clicker that mauls Kathleen. After the group escape to a motel, Sam shows Ellie he was bitten on the leg. The next morning, Sam is infected and attacks Ellie; Henry kills him before killing himself. Joel and Ellie bury them and set off on foot heading west.\r\n6	6	\"Kin\"	Jasmila Žbanić	Craig Mazin	February 19, 2023	0.841[58]\r\nThree months after Henry and Sam\'s deaths, Joel and Ellie reach a small, thriving community in Jackson, Wyoming, where Joel is reunited with Tommy, whose wife Maria is pregnant. Ellie learns about Sarah\'s fate from Maria. Joel confides in Tommy about Ellie\'s immunity and his own declining mental state. Joel asks Tommy to take Ellie to the Fireflies, as he is afraid he cannot keep her safe. Ellie overhears them and confronts Joel, who insists they will part ways. Joel changes his mind after remembering Sarah, and he and Ellie travel to Colorado on horseback. They find the Fireflies have vacated their base, possibly relocating to a hospital in Utah. Joel and Ellie attempt to escape a group of raiders. When one of them attacks Joel, Joel kills him but is stabbed during the struggle. Joel and Ellie escape the others, but Joel soon collapses and falls off their horse, leaving Ellie unsure how to proceed.', '00:00:53', 'Kin', 901, 6),
(7017, 'Le Professeur risque d\'être à découvert à cause d\'une avancée dans l\'enquête et d\'une erreur commise par l\'un des cambrioleurs.', '00:00:52', 'Instabilité réfrigérée', 17, 7),
(7018, 'Rio a rejoint l’équipe dans la banque, mais ces derniers doivent l’opérer pour le retirer le micro installé par la police. Dans le sud de l’Espagne, le Professeur et Lisbonne sont sur le point de se faire arrêter.', '00:00:52', 'Petites vacances', 18, 7),
(7501, 'Tuncay annonce une mauvaise nouvelle à Burcu. Un incident dans le labo neuf pousse Necdet à bout, et l expulsion de la petite bande n est plus qu une question d heures', '01:02:00', 'Changement de cap ', 501, 7),
(7502, 'Les amis se préparent pour les examens. Elif se ravise pendant son récital. Necdet tente de se dérober à une enquête en manipulant Yıldira.', '01:02:00', 'Episode 07 ', 502, 7),
(7601, 'Pour choisir le prochain chef des internes, la Dre Cruz observe minutieusement Danny et Sam sur le terrain. Camila cherche à comprendre l étrange maladie d une fille de neuf ans.', '00:50:00', 'Episode 07', 601, 6),
(7701, 'Le lendemain du feu de joie, Katherine est soucieuse et avoue à George qu’elle a mal dormi. Elle apprend à son mari que deux de ses fils se sont battus la veille et que c’est à cause d’une fille qui vit sous leur toit…Les Walter décident d’établir des règles strictes au sein du foyer. Katherine surprend alors Parker qui écoutait derrière la porte. Elle révèle à ses parents que des filles viennent parfois rendre visite à Cole la nuit en cachette et qu’il laisse la porte du fond ouverte pour qu’elles puissent le rejoindre. Le couple tombe des nues et décide d’avoir une conversation les yeux dans les yeux avec leurs fils.', '00:00:46', 'Les rumeurs vont vite', 701, 7),
(7801, 'La Saison 1 de Mercredi est la première saison de la série Mercredi. Elle est sortie sur Netflix le 23 novembre 2022 et elle se compose de huit épisodes. Brillante, sarcastique et un peu morte', '00:00:50', 'Malheureusement vôtre', 801, 7),
(7901, 'Ellie and an injured Joel shelter in an abandoned house. As Joel approaches death, he urges Ellie to leave him. In a flashback, Ellie remembers her time in FEDRA military school, which she attended with her best friend Riley. While Ellie causes trouble and fights with her peers, Riley ran away and has been missing for three weeks. Riley sneaks back into their dorm room and reveals to Ellie she has joined the Fireflies. She brings Ellie to an abandoned mall, where they explore a photo booth, an arcade, and a carousel. Riley tells Ellie the Fireflies have assigned her to a post in Atlanta, and it is her last night in Boston. Ellie is upset, but convinces Riley to stay, and they kiss. An infected attacks the two and Ellie kills it, but both are bitten during the struggle. Tearfully, they decide to stay together and wait for the infection to take hold. In the present, Ellie finds a sewing needle and stitches Joel\'s wound.', '00:00:56', 'Left Behind', 901, 7),
(8017, 'Tokyo surprend Alison en train de bavarder avec Rio et la met au pied du mur. La police pense avoir été infiltrée par un espion', '00:00:59', 'Vous l\'avez cherché', 17, 8),
(8018, 'Le Professeur parvient à se cacher mais Lisbonne est capturée. Tokyo boit pour accepter sa rupture avec Rio, alors que Palerme a l\'autorisation pour créer une diversion et faire croire à la police que le gang va s\'enfuir.Sierra adopte une tactique très ciblée pour mettre Nairobi en position de faiblesse.', '00:00:48', 'La Dérive', 18, 8),
(8501, 'Après un conseil disciplinaire houleux, les cinq amis saisiront-ils leur dernière chance de faire ce qui semble être amende honorable ? Kemal et Burcu tombent des nues.', '01:02:00', 'Un moment unique ', 501, 8),
(8502, 'Le jour du jugement approche pour Necdet. Elif fait ses valises. Osman imagine une solution pour inciter Kerem à étudier.', '01:02:00', 'Episode 08 ', 502, 8),
(8601, 'En attendant de passer un entretien avec les RH, Danny et Xander se penchent sur leur douloureux passé. Une crise met en évidence les conflits de loyauté qui hantent Tom.', '00:50:00', 'Episode 08', 601, 8),
(8701, 'Katherine propose à Will de s’installer dans le grenier de la grange mais celui-ci décline son offre car il pense envahir déjà suffisamment le foyer familial. En parcourant le journal du jour, le jeune homme découvre que sa mère s\'apprête à être nommée vétérinaire de l’année lors d\'un gala annuel qui se tiendra à la fin de la semaine. De son côté, George est inquiet. Il s’est levé tôt pour commencer à abattre des arbres envahis de parasites et espère ne pas avoir à faire une croix sur la totalité de son verger. Au lycée, Cole quitte un cours en pleine dissertation sur table. Son professeur tente de le convaincre de rester mais le jeune homme ne veut rien entendre.', '00:00:43', 'En roue libre', 701, 8),
(8801, 'La Saison 1 de Mercredi est la première saison de la série Mercredi. Elle est sortie sur Netflix le 23 novembre 2022 et elle se compose de huit épisodes. Brillante, sarcastique et un peu morte', '00:00:51', 'Oiseau de malheur', 801, 8),
(8901, 'Ellie leaves Joel, who is still recovering, to hunt for food. After shooting a deer, she tracks the wounded animal and encounters a preacher, David, and his fellow hunter James. She trades her deer for penicillin. David reveals the man who stabbed Joel was a member of his group; Ellie leaves to treat Joel. The next day, she discovers David and his men have followed her to seek vengeance on Joel. She flees to draw them away but is captured. At David\'s camp, he reveals he has been feeding his group human flesh. Meanwhile, Joel awakens and tortures some of David\'s men into telling him Ellie\'s whereabouts. David and James attempt to kill Ellie but she kills James and escapes; David hunts her down and tries to rape her, but she kills him with a meat cleaver. Joel finds a traumatized Ellie outside the cult\'s burning community center and comforts her.', '00:00:46', 'When We Are in Need', 901, 8),
(9017, 'Le Professeur se hâte pour empêcher un témoin de l\'identifier. Berlin cherche à se venger quand son nom est dévoilé et bafoué dans la presse.', '00:00:55', 'Celui qui la suit, l\'attrape', 17, 9),
(9701, 'Grace est très enthousiaste à l’idée d\'initier Jackie aux codes vestimentaires de la foire country mais cette dernière se montre peu enjouée. L\'adolescente confie ses inquiétudes à son amie concernant sa relation avec Alex. L\'adolescent lui en veut depuis le gala et la jeune new-yorkaise ne s\'est pas remise de ce que lui a dit Cole ce soir-là. Poussée par Grace, Jackie finit par aller voir Alex dans sa chambre pour tenter de renouer avec lui. De son côté, Hayley décide de rendre visite à Will chez les Walter pour lui apporter du courrier. Une fois sur place, elle lui propose d\'aller faire une balade dans la nature.', '00:00:40', 'La roue tourne', 701, 9),
(9901, 'n a flashback, Ellie\'s mother Anna is bitten by an infected as she gives birth to Ellie. She is found by Marlene, who hesitantly takes Ellie and kills Anna, at the latter\'s request. In the present day, Joel tells Ellie of his suicide attempt after Sarah\'s death. Firefly soldiers capture Ellie and knock Joel unconscious. After Joel awakens in a hospital, Marlene explains that doctors are preparing Ellie for surgery in hope of developing a cure, and Joel protests when he realizes the procedure will kill her. Marlene orders Joel to be taken away. He escapes and kills several Firefly soldiers, including those who surrender, and kills Ellie\'s surgeon for resisting. Joel carries an unconscious Ellie from the hospital. Marlene intercepts them, stating there is still time to find a cure, but Joel shoots and kills her. When Ellie awakens, Joel lies and tells her the Fireflies had already failed to develop a cure from other immune people. As they hike to Jackson, Ellie insists that Joel swear his story about the Fireflies is true. When he does so, she replies \"Okay\".', '00:00:52', 'Look for the Light', 901, 9),
(10701, 'Les préparatifs du mariage d\'un des membres du clan Walter battent leur plein au ranch. Jackie, qui prend très à cœur son rôle de wedding planner, participe activement à l’organisation de la fête. Will, de son côté, prend connaissance de l’offre qu\'un promoteur a faite à ses parents. L\'aîné de la famille considère que la proposition est honnête mais se demande si c’est vraiment ce que veulent Katherine et George. Sa mère lui explique qu’ils peuvent encore patienter avant de prendre une décision ferme et que les autres membres de la fratrie ne doivent pas être mis au courant de la situation.', '00:00:56', 'Ils vécurent heureux...', 701, 10),
(21001, 'Ancien membre de la police militaire, Jack Reacher arrive à Margrave, en Géorgie. Arrêté pour le meurtre d\'un homme retrouvé battu et abattu de deux balles, il nie les faits et échafaude des théories sur les coupables. Le chef des détectives du département de police de Margrave, Oscar Finlay le garde en cellule. Un autre homme avoue le crime, Finlay à l\'arrête aussi. En prison, Reacher comprend qu\'Hubble est forcé à endosser le meurtre sous la menace. Après une bagarre violente orchestrée par le gardien Spivey, les deux hommes sont libérés. Reacher découvre que la victime n\'est autre que son frère.', '00:00:56', 'Bienvenue a Margrave', 1001, 1),
(31001, 'Après l\'assassinat de son frère, Reacher s\'allie à l\'inspectrice Roscoe. Ils soupçonnent Paul Hubble d\'être mêlé au crime, mais ce dernier est retrouvé mort, supplicié et cloué au mur, conformément aux menaces reçues les jours précédents. Le chef Morrison est aussi assassiné, de manière similaire. Reacher pense que la police est corrompue. Avec Finlay, ils contactent le FBI et mettent la famille Hubble sous protection. L\'ancien militaire part confronter le gardien Spivey, mais tombe dans un guet-apens tendu par des tueurs. Blessé, il passe la nuit avec Roscoe dont la maison est ensuite cambriolée.', '00:00:52', 'Première danse', 1001, 2),
(41001, 'L\'enquête sur la mort du frère de Jack se poursuit. On découvre à la victime, Joe, un passé d’agent secret infiltré à Margrave pour une mission top secrète. Sa collègue Molly accepte d\'aider Reacher discrètement. Pendant ce temps, un deuxième cadavre est retrouvé : un chauffeur routier lié à l\'entreprise de Kliner. Avec Finlay, Jack interroge l\'avocat du chauffeur, puis Kliner lui-même, qui reste évasif. De retour en ville, Finlay est agressé par des policiers corrompus. Reacher le met à l\'abri dans un motel et part à la recherche de Spivey, témoin clé disparu.', '00:00:47', 'Cuillère en argent', 1001, 3),
(51001, 'Reacher cache les cadavres des tueurs et file avec Roscoe dans un hôtel sécurisé. Il découvre son passé militaire, le sauvetage d’enfants torturés en Irak. Pendant ce temps, grâce à une piste de Finlay, ils découvrent la voiture carbonisée du frère de Reacher. Chez la veuve d\'un chauffeur assassiné, ils découvrent à celui-ci un usage de fausse monnaie pour Kliner. Jack retrouve la trace de Ron, contact de son frère, mais tombe dans une embuscade. Il déchiffre un message cryptique laissé par Joe. Alors qu\'il s\'apprête à recevoir des documents compromettants, son informateur du FBI est assassiné.', '00:00:53', 'Dommage collatéral', 1001, 4),
(61001, 'Après la mort de Molly, Reacher adopte un chien maltraité. Il comprend que l\'énorme stock de nourriture animale de la ferme sert à faire passer clandestinement de la fausse monnaie. Il tabasse KJ, le fils de Kliner, mais ne peut le confondre faute de preuves. Avec Finlay et Roscoe, renvoyée de la police, ils mettent la main sur des documents dissimulés par l\'inspecteur assassiné Gray. Ils réalisent que Margrave est une plaque tournante idéale pour un important trafic. Reacher contacte Neagley, ex-collègue du FBI. Ils remontent la piste d\'un enquêteur liquidé connaisseur du dossier.', '00:00:48', 'Aucune excuse', 1001, 5),
(71001, 'Alors que Reacher examine les blessures infligées à Kliner Sr, Teale tente de calmer KJ, furieux contre Finlay qu\'il accuse d\'avoir tué son père. Il l’écarte de l\'enquête. Pendant ce temps, Roscoe, paniquée, installe Charlie et les filles dans une planque. Elle parvient à neutraliser des hommes envoyés pour les surveiller. Le groupe finit par rejoindre un dîner où Charlie dévoile les affaires illégales de Paul avec Kliner. De son côté, Reacher découvre l’existence d’une enquête passée menée par son frère sur un trafic massif de fausse monnaie fabriquée aux USA puis exportée au Venezuela.', '00:00:51', 'Le papier c\'est la clé', 1001, 6),
(81001, 'Le couple Stevenson est retrouvé assassiné chez eux, visiblement torturé pour obtenir des informations. De retour à Margrave, Reacher explique à Finlay ses soupçons sur un deuxième officier corrompu agissant en coulisses. Suite à cela, Finlay est congédié par Teale. Reacher fouille la maison de Hubble, tombe dans un guet-apens mais parvient à neutraliser ses assaillants. Il contacte alors Roscoe pour lui expliquer que la fausse monnaie est produite à Margrave à partir de vrais billets de 1 dollar débarrassés de leur encre, imprimés de nouveau en tant que billets de 100, puis expédiés au Venezuela.', '00:00:47', 'Ne rien dire', 1001, 7),
(91001, 'Reacher et Finlay sont retenus en joue par Teale, KJ et Picard. Ces derniers menacent Roscoe et sa famille pour forcer Paul à revenir. KJ avoue avoir tué son père ainsi que Molly et Joe. Teale est corrompu depuis longtemps. Picard est chargé de surveiller Reacher pendant qu’il retrouve Hubble. Durant le trajet, l’ancien flic crève un pneu de voiture et profite de la confusion pour abattre Picard. A la prison, il sauve Finlay in extremis et fauche Baker avec sa voiture. Ils retrouvent Neagley et préparent l\'assaut final dans l\'entrepôt où Roscoe et les autres sont retenus.', '00:00:52', 'La part de tarte', 1001, 8);

-- --------------------------------------------------------

--
-- Structure de la table `episode_realisateur`
--

CREATE TABLE `episode_realisateur` (
  `cle_episode` int(11) NOT NULL,
  `cle_real` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `episode_realisateur`
--

INSERT INTO `episode_realisateur` (`cle_episode`, `cle_real`) VALUES
(1502, 3),
(8601, 3),
(8601, 2),
(8502, 4),
(8502, 2),
(8501, 4),
(8502, 6),
(1502, 4),
(7601, 5),
(7601, 1),
(7602, 2),
(7601, 1),
(7602, 5),
(6601, 3),
(6601, 4),
(1501, 5),
(1502, 6),
(1502, 2),
(1501, 2),
(1502, 1),
(1101, 1),
(1101, 2),
(1102, 4),
(1102, 5),
(6502, 4),
(6502, 4),
(6501, 2),
(6501, 3),
(1901, 7),
(2901, 8),
(3901, 9),
(4901, 10),
(5901, 10),
(6901, 11),
(7901, 12),
(11001, 13),
(21001, 14),
(31001, 15),
(41001, 16),
(51001, 14),
(51001, 15),
(61001, 5),
(61001, 13),
(71001, 14),
(71001, 12),
(81001, 4),
(1017, 1),
(2017, 1),
(3017, 1),
(4017, 1),
(1018, 1);

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `cle_real` int(30) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`cle_real`, `nom`, `image`) VALUES
(1, 'Liz Friedlander', 'real01_the_rookie.jpeg'),
(2, 'Adam Davidson', 'real02_the_rookie.jpeg'),
(3, 'Greg Beeman', 'real03_the_rookie.jpeg'),
(4, 'Rob Bowman', 'real04_the_rookie.jpeg'),
(5, 'Chris Grismer', 'real01_originals.jpeg'),
(6, 'Brad Turner', 'real02_originals.jpeg'),
(7, 'James Marshall', 'wednesday_real1.jpg'),
(8, 'Craig Mazin', 'the_last_of_us_real01.jpeg'),
(9, 'Neil Druckmann', 'the_last_of_us_real02.jpeg'),
(10, 'Peter Hoar', 'the_last_of_us_real03.jpeg'),
(11, 'Jeremy Webb', 'the_last_of_us_real04.jpeg'),
(12, 'Jasmila Žbanić', 'the_last_of_us_real05.jpeg'),
(13, 'Liza Johnson', 'the_last_of_us_real07.jpeg'),
(14, 'Ali Abbasi', 'the_last_of_us_real08.jpeg'),
(15, 'carol banker', 'reacherS1_real01.jpeg'),
(16, 'julian holmes', 'reacherS1_real02.jpeg'),
(17, 'Christine moore', 'reacherS1_real03.jpeg'),
(18, 'Sam Hill', 'reacherS1_real04.webp'),
(19, 'Miguel Ángel Vivas', 'casa_de_papel_real01.jpg'),
(20, 'Jesús Colmenar', 'casa_de_papel_real02.webp'),
(21, 'Álex Rodrigo', 'casa_de_papel_real03.webp'),
(22, 'Alejandro Bazzano', 'casa_de_papel_real04.jpg'),
(23, 'Koldo Serra', 'casa_de_papel_real05.webp');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `cle_saison` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `affichage` varchar(255) DEFAULT NULL,
  `nb_episode` int(11) DEFAULT NULL,
  `cle_serie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`cle_saison`, `titre`, `affichage`, `nb_episode`, `cle_serie`) VALUES
(101, 'Saison 1', 'the_rookie.jpeg', 5, 1),
(102, 'Saison 2', 'the_rookie.jpeg', 4, 1),
(201, 'Saison 1', 'originals.webp', 5, 5),
(301, 'Saison 1', 'My_name.jpeg', 5, 4),
(401, 'Saison 1', 'the_order.jpeg', 4, 3),
(501, 'Saison 1', 'Love101.webp', 8, 6),
(502, 'Saison 2', 'Love101.webp', 8, 6),
(601, 'Saison 1', 'Pulse.jpeg', 8, 2),
(701, 'Saison 1', 'Walter_boys.jpeg', 10, 7),
(1, 'Saison 1', 'wednesday.jpg', 0, 0),
(1, 'Saison 1', 'wednesday.jpg', 0, 0),
(801, 'Saison 1', 'wednesday.jpg', 6, 8),
(901, 'Saison 1', 'the_last_of_us.jpeg', 12, 9),
(1001, 'Saison 1', 'reacherS1.jpeg', 8, 10),
(15, 'Saison 1', 'reacherS1.jpeg', 5, 0),
(16, 'jhasj', '100.jpg', 3, 6),
(17, 'Saison 1', 'La_Casa_de_PapelS1.webp', 9, 11),
(18, 'Saison 2', 'La_Casa_de_PapelS2.jpeg', 8, 11);

-- --------------------------------------------------------

--
-- Structure de la table `saison_acteur`
--

CREATE TABLE `saison_acteur` (
  `cle_saison` int(11) NOT NULL,
  `cle_acteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `saison_acteur`
--

INSERT INTO `saison_acteur` (`cle_saison`, `cle_acteur`) VALUES
(101, 21),
(101, 22),
(101, 23),
(101, 24),
(102, 21),
(102, 22),
(102, 23),
(102, 24),
(201, 1),
(201, 2),
(201, 3),
(201, 4),
(201, 5),
(201, 6),
(301, 18),
(301, 19),
(301, 20),
(401, 25),
(401, 26),
(401, 27),
(401, 28),
(501, 12),
(501, 13),
(501, 14),
(501, 15),
(501, 16),
(501, 17),
(502, 12),
(502, 13),
(502, 14),
(502, 15),
(502, 16),
(502, 17),
(601, 7),
(601, 8),
(601, 9),
(601, 10),
(601, 11),
(701, 29),
(701, 30),
(701, 31),
(701, 32),
(701, 33),
(0, 34),
(0, 35),
(0, 36);

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `cle_serie` int(50) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `nb_saison` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`cle_serie`, `titre`, `nb_saison`, `image`) VALUES
(1, 'the rookie', 2, 'the_rookie.jpeg'),
(2, 'Pulse', 1, 'Pulse.webp'),
(3, 'the order', 1, 'the_order.jpeg'),
(4, 'My name', 1, 'My_name.jpeg'),
(5, 'originals', 1, 'originals.jpg'),
(6, 'Love 101', 3, 'love101.webp'),
(7, 'Ma vie avec les walter Boys', 1, 'Walter_boys.jpeg'),
(8, 'wednesday', 1, 'Wednesday.webp'),
(9, 'The Last Of Us', 0, 'The_Last_Of_Us.jpg'),
(10, 'Reacher', 0, 'reacher.jpg'),
(11, 'La Casa De Papel', 2, 'la_casa_de_papel.webp');

-- --------------------------------------------------------

--
-- Structure de la table `serie_tag`
--

CREATE TABLE `serie_tag` (
  `cle_serie` int(11) NOT NULL,
  `cle_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `serie_tag`
--

INSERT INTO `serie_tag` (`cle_serie`, `cle_tag`) VALUES
(1, 2),
(1, 5),
(2, 3),
(2, 4),
(2, 6),
(3, 3),
(4, 1),
(4, 5),
(4, 7),
(5, 2),
(5, 4),
(6, 1),
(6, 7),
(7, 1),
(7, 2),
(8, 4),
(8, 3),
(9, 2),
(9, 4),
(9, 3),
(10, 2),
(10, 4),
(11, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id_tag`, `nom`) VALUES
(1, 'Comédie'),
(2, 'action'),
(3, 'horreur'),
(4, 'drame'),
(5, 'science fiction'),
(6, 'romance'),
(7, 'policier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`cle_act`);

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`cle_episode`),
  ADD KEY `id_saison` (`id_saison`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`cle_real`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`cle_serie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `cle_real` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `cle_serie` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
