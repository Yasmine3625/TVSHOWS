Use tv_shows;
select * FROM serie WHERE titre LIKE 'the rookie' ;

SELECT DISTINCT s.titre AS serie
FROM acteur a
JOIN saison_acteur sa ON a.cle_act = sa.cle_acteur
JOIN saison s ON sa.cle_saison = s.cle_saison
JOIN serie ser ON s.cle_serie = ser.cle_serie
WHERE a.nom LIKE acteur_name;


SELECT DISTINCT s.titre AS serie
FROM realisateur r
JOIN episode_realisateur er ON r.cle_real = er.cle_real
JOIN episode e ON er.cle_episode = e.cle_episode
JOIN saison s ON e.id_saison = s.cle_saison
JOIN serie ser ON s.cle_serie = ser.cle_serie
WHERE r.nom LIKE acteur_name;