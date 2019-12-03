<?php
class ModelVisites extends Model {
    /**
     * ajout d'une visite: chaque visite sur un page du site est ajoutée dans la DB
     * paramètre:
     *      $url (str)      : adresse internet du site web visité
     *      $titre (str)    : titre de la page
     *      $adresse_ip     : adresse ip de l'utilisateur
     *      $id_usager      : si l'utilisateur est connecté , on inscrit son identifiant (sinon null ou 0 ???)       
     *  
     */
    public function addVisite($url,$titre,$adresse_ip,$id_usager)
    {
        $this->db->query("INSERT INTO " . DB_PREFIX . "visites SET id = '" . (int)$data['id'] . "', url_page = '" . $data['url_page'] . "', titre = '" . $data['titre'] . "', date_visite = '" . $data['date_visite'] . "', id_usager = '" . $data['id_usager'] . "', adresse_IP = '" . $data['adresse_IP'] . "', id_usager = '" . (int)$data['id_usager'] . "'");
    }

    public function getAllVisites()
    {
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites");
    }
    
    public function getVisite($id_visite)
    {
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    }
    
    public function getPlusVisite($id_visite)
    {
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    }
}

?>