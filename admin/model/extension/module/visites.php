<?php
class ModelExtensionModuleVisites extends Model{

 public function createTable(){
 $this->db->query("CREATE TABLE IF NOT EXISTS ".DB_PREFIX."visites (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `url_page` varchar(150) DEFAULT NULL,
    `titre` varchar(35) DEFAULT NULL,
    `date_visite` datetime DEFAULT CURRENT_TIMESTAMP,
    `adresse_ip` varchar(50) DEFAULT NULL,
    `id_usager` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
    )");
 }

 public function dropTable(){
 $this->db->query("DROP TABLE ".DB_PREFIX. "visites");
 }

}
