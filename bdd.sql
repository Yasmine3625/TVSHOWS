-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 mai 2025 à 00:47
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
DROP TABLE IF EXISTS acteur;

CREATE TABLE `acteur` (
  `cle_act` int NOT NULL,
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
(33, 'Marc Blucas', 'Walter_boys_act05.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--
DROP TABLE IF EXISTS episode;

CREATE TABLE `episode` (
  `cle_episode` int NOT NULL,
  `synopsis` text DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `id_saison` int DEFAULT NULL,
  `numero_episode` INT(15)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`cle_episode`, `synopsis`, `duree`, `titre`, `id_saison`,`numero_episode`) VALUES
(1101, 'John Nolan est un divorcé âgé de 45 ans qui, après avoir assisté à (et fait déjouer) un braquage de banque dans sa petite ville, décide de changer de vie : il déménage à Los Angeles et devient flic.', '00:46:00', 'Premiers pas', 101,1),
(1102, 'Deux semaines après la fin de la saison 1, Nolan a déménagé dans une nouvelle maison et les recrues apprennent les résultats de leur examen. Ils réussissent tous le test.', '00:48:00', 'Impact', 102,1),
(1201, 'L histoire est raconté du point de vue d Elijah. Déterminé à aider son frère à trouver la rédemption.', '01:02:00', 'Retour a la Nouvelle-Orleans', 201,1),
(1301, 'Le jour de son anniversaire, Jiwoo Yoon assiste à la mort atroce de son père. Prête à tout pour se venger.', '00:45:00', 'Episode 01', 301, 1),
(1401, 'Arrivé à l Université de Belgrave, Jack intègre une société secrète imprégnée de mystère et de magie.', '00:45:00', 'Semaine infernale (partie 01)', 401, 1),
(1501, 'Après avoir mis leur lycée à feu et à sang, Eda, Osman, Sinan et Kerem réalisent que seule Burcu, une jeune prof à l écoute, pourrait encore les sauver de l expulsion.', '01:02:00', 'Le premier regard', 501, 1),
(1502, 'La tension monte entre Burcu et Kemal. Furieuse, Işık passe à l action après avoir entendu parler du pacte honteux entre Necdet et ses amis.', '01:02:00', 'Episode 01 ', 502, 1),
(1601, 'Alors qu un ouragan s abat sur Miami, la situation est tout aussi houleuse aux urgences de Maguire, où une grave accusation provoque des dissensions entre internes.', '00:50:00', 'Episode 01', 601, 1),
(2101, 'Nolan persuade une femme de ne pas se suicider. Jackson est interrogé sur les raisons pour lesquelles il n a pas tiré avec son arme, mais Lopez le couvre.', '00:47:00', 'Pas de repos pour les braves', 101, 2),
(2102, 'Nolan essaie de gérer sa relation avec Russo, et crée des liens avec Grace pendant qu il enquête sur un cas criminel avec l agent Lopez.', '00:45:00', 'Le pari', 102, 2),
(2201, 'Rebekah arrive à la Nouvelle-Orléans à la recherche d Elijah, mais rencontre Hayley dans le manoir de Klaus où elle se confie à Rebekah sur son état inattendu.', '00:59:45', 'À la reconquête du royaume', 201, 2),
(2301, 'Mujin Choi inflige une punition à Gangjae Do. Jiwoo intègre les forces de police sous couverture.', '00:46:00', 'Episode 02', 301, 2),
(2401, 'Grand-père expose sa théorie au sujet des attaques.', '00:47:00', 'Semaine Infernale (partie 02)', 401, 2),
(2501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Uneadmiration mutuelle', 501, 2),
(2502, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Episode 02 ', 502, 2),
(2601, 'La tempête redouble d intensité. Les urgences sont débordées et Danny doit faire des choix difficiles. Tom doit se montrer à la hauteur quand le sort frappe quelqu un de proche.', '00:50:00', 'Episode 02', 601, 2),
(3101, 'Nolan et Bishop poursuivent un groupe de voleurs et Nolan perd un sac d argent volé lorsqu un artiste de rue s enfuit avec. Le bureau apprend que les voleurs', '00:48:00', 'Plan B', 101, 3),
(3102, 'Le propriétaire de West est arrêté et il se retrouve expulsé de son appartement.', '00:46:00', 'Recherche appartement', 102, 3),
(3201, 'Rebekah et Klaus se sont alliés afin de récupérer Elijah, détenu par l arme secrète anti-sorcières de Marcel.', '00:58:49', 'Les amants maudits', 201, 3),
(3301, 'Durant la traque d une cible imprévue avec son équipe, Jiwoo doit faire preuve de sang-froid.', '00:47:00', 'Episode 03', 301, 3),
(3401, 'Une société secrète rivale cherche à recruter Jack. Plus tard, une leçon de magie lui ouvre les yeux sur le prix à payer pour chaque sort lancé.', '00:45:00', 'Introduction a l etique(partie 01)', 401, 3),
(3501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'L envol du desir', 501, 3),
(3502, 'Tombée sous le charme d Osman, Elif est anéantie par un malentendu. Kerem encourage Eda à persévérer dans son art. Kemal prend Sinan sous son aile.', '01:02:00', 'Episode 03 ', 502, 3),
(3601, 'Alors que les générateurs de secours de l hôpital faiblissent, la Dre Cruz s inquiète pour la sécurité de Vero. Sophie et Camila risquent tout pour sauver une patiente en péril.', '00:50:00', 'Episode 03', 601, 3),
(4101, 'Le Sergent Gray teste les recrues en interchangeant leur formateurs: il assigne Nolan à Lopez, West à Bradford et Chen à Bishop; et charge les recrues de mieux comprendre leurs nouveaux formateurs.', '00:45:00', 'Changement d equipe', 101, 4),
(4102, 'Nolan est assigné à son nouvel agent instructeur, le lieutenant Nyla Harper, dont il trouve les méthodes trop extrêmes.', '00:50:00', 'Le billet en or', 102, 4),
(4201, 'Avec le festival annuel de musique de la rue Dauphine en vue, Davina, souhaitant profiter d une soirée.', '01:01:02', 'Nouvelles alliances', 201, 4),
(4301, 'Pour Giho Cha, la déclaration de guerre de Gangjae contre Mujin vient à point nommé.', '00:50:00', 'Episode 04', 301, 4),
(4401, 'Jack suggère de faire alliance avec les Chevaliers, et Randall lui enseigne comment maîtriser ses pouvoirs. De son côté, Edward prend Alyssa sous son aile.', '00:48:00', 'Introduction a l etique(partie 02)', 401, 4),
(4501, 'Işık encourage Eda à poursuivre ses rêves. Après avoir soumis Tuncay à un test impitoyable, les amis rendent un jugement sans indulgence.', '01:02:00', 'Abscence et manque', 501, 4),
(4502, 'Lorsque tout espoir semble perdu, Işık se détache du groupe, mais Elif l incite à reconsidérer sa décision. Kerem envisage un choix déchirant.', '01:02:00', 'Episode 04 ', 502, 4),
(4601, 'Les urgences sont saturées après la tempête. Danny jongle pour concilier l afflux de patients et l arrivée d une nouvelle titulaire qui connaît bien Xander.', '00:50:00', 'Episode 04', 601, 4),
(5101, 'Nolan a du mal à faire face à sa rupture avec Chen au moment même où les formateurs lancent un concours annuel pour déterminer qui peut obtenir le plus d arrestations en un seul jour de travail.', '00:46:00', 'Le tournoi', 101, 5),
(5201, 'Irrité par les récents événements impliquant la sécurité de son bébé à naître, Klaus exige des réponses de Sophie.', '00:56:45', 'Le rituel de moisson', 201, 5),
(5301, 'Jiwoo et Pildo échappent au pire de justesse, reportant l attention de la police sur Gangjae.', '00:46:00', 'Episode 05', 301, 5),
(5501, 'Osman embringue Tuncay dans une magouille... dont il n avait pas anticipé les conséquences. Işık invente une excuse afin que Burcu et Kemal travaillent ensemble.', '01:02:00', 'Le profondeur des sentiments ', 501 ,5),
(5502, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Episode 05 ', 502, 5),
(5601, 'Un shérif adjoint charmeur a des vues sur Danny. Harper subit les parents désobligeants d une jeune patiente. Sophie fait face à un dilemme moral.', '00:50:00', 'Episode 05', 601 ,5),
(6501, 'Une lycéenne modèle et quatre rebelles décident que leur prof préférée doit craquer sur le bel entraîneur de basket. Une folle histoire d amitié, d amour et de courage.', '01:02:00', 'Jeux et enjeux ', 501, 6),
(6502, 'Kerem et Eda se retrouvent dans une impasse. Necdet tombe dans le piège d Osman. Refusant de se soumettre à la pression parentale, Elif prend son courage à deux mains.', '01:02:00', 'Episode 06 ', 502, 6),
(6601, 'Une visite à leur père acariâtre dans leur ville natale ravive des tensions entre Danny et Harper. Le jour de repos de Tom et du Dr Soriano prend une tournure inattendue.', '00:50:00', 'Episode 06', 601, 6),
(7501, 'Tuncay annonce une mauvaise nouvelle à Burcu. Un incident dans le labo neuf pousse Necdet à bout, et l expulsion de la petite bande n est plus qu une question d heures', '01:02:00', 'Changement de cap ', 501, 7),
(7502, 'Les amis se préparent pour les examens. Elif se ravise pendant son récital. Necdet tente de se dérober à une enquête en manipulant Yıldira.', '01:02:00', 'Episode 07 ', 502, 7),
(7601, 'Pour choisir le prochain chef des internes, la Dre Cruz observe minutieusement Danny et Sam sur le terrain. Camila cherche à comprendre l étrange maladie d une fille de neuf ans.', '00:50:00', 'Episode 07', 601, 6),
(8501, 'Après un conseil disciplinaire houleux, les cinq amis saisiront-ils leur dernière chance de faire ce qui semble être amende honorable ? Kemal et Burcu tombent des nues.', '01:02:00', 'Un moment unique ', 501, 8),
(8502, 'Le jour du jugement approche pour Necdet. Elif fait ses valises. Osman imagine une solution pour inciter Kerem à étudier.', '01:02:00', 'Episode 08 ', 502, 8),
(8601, 'En attendant de passer un entretien avec les RH, Danny et Xander se penchent sur leur douloureux passé. Une crise met en évidence les conflits de loyauté qui hantent Tom.', '00:50:00', 'Episode 08', 601,8);

-- --------------------------------------------------------

--
-- Structure de la table `episode_realisateur`
--
DROP TABLE IF EXISTS episode_realisateur;

CREATE TABLE `episode_realisateur` (
  `cle_episode` int NOT NULL,
  `cle_real` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `episode_realisateur` (`cle_episode`, `cle_real`) VALUES
(1502, 3),(8601,3),(8601,2),(8502,4),(8502,2),(8501,4),(8502,6),
(1502, 4),(7601,5),(7601,1),(7602,2),(7601,1),(7602,5),(6601,3),(6601,4),
(1501, 5),
(1502, 6),
(1502, 2),
(1501, 2),
(1502, 1),(1101,1),(1101,2),(1102,4),(1102,5),(6502,4),(6502,4),(6501,2),(6501,3);
-- Structure de la table `realisateur`
--
DROP TABLE IF EXISTS realisateur;

CREATE TABLE `realisateur` (
  `cle_real` int NOT NULL,
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
(6, 'Brad Turner', 'real02_originals.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--
DROP TABLE IF EXISTS saison;

CREATE TABLE `saison` (
  `cle_saison` int NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `affichage` varchar(255) DEFAULT NULL,
  `nb_episode` int(11) DEFAULT NULL,
  `cle_serie` int DEFAULT NULL
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
(701, 'Saison 1', 'Walter_boys.jpeg', 10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `saison_acteur`
--
DROP TABLE IF EXISTS saison_acteur;

CREATE TABLE `saison_acteur` (
  `cle_saison` int NOT NULL,
  `cle_acteur` int NOT NULL
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
(701, 33);

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--
DROP TABLE IF EXISTS serie;

CREATE TABLE `serie` (
  `cle_serie` int(11) NOT NULL,
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
(6, 'Love 101', 2, 'love101.webp'),
(7, 'Ma vie avec les walter Boys', 1, 'Walter_boys.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `serie_tag`
--
DROP TABLE IF EXISTS serie_tag;

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
(7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--
DROP TABLE IF EXISTS tag;

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
-- Index pour la table `episode_realisateur`
--
/*ALTER TABLE `episode_realisateur`
  ADD PRIMARY KEY (`cle_episode`,`cle_real`),
  ADD KEY `cle_real` (`cle_real`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`cle_real`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`cle_saison`),
  ADD KEY `cle_serie` (`cle_serie`);

--
-- Index pour la table `saison_acteur`
--
ALTER TABLE `saison_acteur`
  ADD PRIMARY KEY (`cle_saison`,`cle_acteur`),
  ADD KEY `cle_acteur` (`cle_acteur`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`cle_serie`);

--
-- Index pour la table `serie_tag`
--
ALTER TABLE `serie_tag`
  ADD PRIMARY KEY (`cle_serie`,`cle_tag`),
  ADD KEY `cle_tag` (`cle_tag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `cle_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`cle_saison`);

--
-- Contraintes pour la table `episode_realisateur`
--
ALTER TABLE `episode_realisateur`
  ADD CONSTRAINT `episode_realisateur_ibfk_1` FOREIGN KEY (`cle_episode`) REFERENCES `episode` (`cle_episode`),
  ADD CONSTRAINT `episode_realisateur_ibfk_2` FOREIGN KEY (`cle_real`) REFERENCES `realisateur` (`cle_real`);

--
-- Contraintes pour la table `saison`
--
ALTER TABLE `saison`
  ADD CONSTRAINT `saison_ibfk_1` FOREIGN KEY (`cle_serie`) REFERENCES `serie` (`cle_serie`);

--
-- Contraintes pour la table `saison_acteur`
--
ALTER TABLE `saison_acteur`
  ADD CONSTRAINT `saison_acteur_ibfk_1` FOREIGN KEY (`cle_saison`) REFERENCES `saison` (`cle_saison`),
  ADD CONSTRAINT `saison_acteur_ibfk_2` FOREIGN KEY (`cle_acteur`) REFERENCES `acteur` (`cle_act`);

--
-- Contraintes pour la table `serie_tag`
--
ALTER TABLE `serie_tag`
  ADD CONSTRAINT `serie_tag_ibfk_1` FOREIGN KEY (`cle_serie`) REFERENCES `serie` (`cle_serie`),
  ADD CONSTRAINT `serie_tag_ibfk_2` FOREIGN KEY (`cle_tag`) REFERENCES `tag` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
