USE tv_shows;

-- TABLE: tag
DROP TABLE IF EXISTS tag;
CREATE TABLE tag (
    id_tag INT NOT NULL,
    nom VARCHAR(50),
    PRIMARY KEY (id_tag)
);

-- TABLE: serie
DROP TABLE IF EXISTS serie;
CREATE TABLE serie (
    cle_serie INT AUTO_INCREMENT,
    titre VARCHAR(100),
    nb_saison INT,
    PRIMARY KEY (cle_serie)
);

-- TABLE: realisateur
DROP TABLE IF EXISTS realisateur;
CREATE TABLE realisateur (
    cle_real INT NOT NULL,
    nom VARCHAR(60),
    image VARCHAR(255),
    PRIMARY KEY (cle_real)
);

-- TABLE: acteur
DROP TABLE IF EXISTS acteur;
CREATE TABLE acteur (
    cle_act INT NOT NULL,
    nom VARCHAR(60),
    image VARCHAR(255),
    PRIMARY KEY (cle_act)
);

-- TABLE: saison
DROP TABLE IF EXISTS saison;
CREATE TABLE saison (
    cle_saison INT NOT NULL,
    titre VARCHAR(100),
    affichage VARCHAR(255),
    nb_episode INT,
    cle_serie INT,
    PRIMARY KEY (cle_saison),
    FOREIGN KEY (cle_serie) REFERENCES serie(cle_serie)
);

-- TABLE: episode
DROP TABLE IF EXISTS episode;
CREATE TABLE episode (
    cle_episode INT NOT NULL,
    synopsis TEXT,
    duree TIME,
    titre VARCHAR(100),
    id_saison INT,
    PRIMARY KEY (cle_episode),
    FOREIGN KEY (id_saison) REFERENCES saison(cle_saison),
);

-- TABLE: saison_acteur
DROP TABLE IF EXISTS saison_acteur;
CREATE TABLE saison_acteur (
    cle_saison INT,
    cle_acteur INT,
    PRIMARY KEY (cle_saison, cle_acteur),
    FOREIGN KEY (cle_saison) REFERENCES saison(cle_saison),
    FOREIGN KEY (cle_acteur) REFERENCES acteur(cle_act)
);

-- TABLE: serie_tag
DROP TABLE IF EXISTS serie_tag;
CREATE TABLE serie_tag (
    cle_serie INT,
    cle_tag INT,
    PRIMARY KEY (cle_serie, cle_tag),
    FOREIGN KEY (cle_serie) REFERENCES serie(cle_serie),
    FOREIGN KEY (cle_tag) REFERENCES tag(id_tag)
);

-- TABLE: episode_realisateur
DROP TABLE IF EXISTS episode_realisateur;
CREATE TABLE episode_realisateur (
    cle_episode INT,
    cle_real INT,
    PRIMARY KEY (cle_episode, cle_real),
    FOREIGN KEY (cle_episode) REFERENCES episode(cle_episode),
    FOREIGN KEY (cle_real) REFERENCES realisateur(cle_real)
);
