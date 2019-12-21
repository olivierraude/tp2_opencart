CREATE TABLE `tp2_visites` (
    `id` int(10) UNSIGNED NOT NULL,
    `url_page` varchar(150) DEFAULT NULL,
    `titre` varchar(35) DEFAULT NULL,
    `date_visite` datetime DEFAULT NULL,
    `adresse_ip` varchar(50) DEFAULT NULL,
    `viewed` int(5) NOT NULL DEFAULT '0',
    `id_usager` int(11) DEFAULT NULL,
    PRIMARY KEY(id)
);