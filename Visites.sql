CREATE TABLE tp2_visites(
    id INT UNSIGNED AUTO_INCREMENT,
    url_page VARCHAR(150),
    titre VARCHAR(35),
    date_visite DATETIME,
    adresse_ip VARCHAR(50),
    id_usager INT,
    PRIMARY KEY(id)
);