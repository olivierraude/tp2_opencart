<?php
class ModelReportVisites extends Model {
    /**
     * ajout d'une visite: chaque visite sur un page du site est ajoutée dans la DB
     * paramètre:
     *      $url (str)      : adresse internet du site web visité
     *      $titre (str)    : titre de la page
     *      $adresse_ip     : adresse ip de l'utilisateur
     *      $id_usager      : si l'utilisateur est connecté , on inscrit son identifiant (sinon null ou 0 ???)       
     *  
     */

    public function addVisite($data)
    {
        $this->db->query("INSERT INTO " . DB_PREFIX . "visites (url_page,titre,adresse_IP,id_usager)
                            VALUES ('" . $this->db->escape($data['url_page']) . "', 
                                    '" . $this->db->escape($data['titre']) . "', 
                                    '" . $this->db->escape($data['adresse_ip']) . "', 
									'" . $this->db->escape($data['id_usager']) . "')");
		$visite_id = $this->db->getLastId();
		return $visite_id;
    }
    
    public function getDistinctURIs($data)
    {
        $sql = "SELECT COUNT(DISTINCT url_page) FROM " . DB_PREFIX . "visites";
        $distinctUris = $this->db->query($sql);

		return $distinctUris;
    }
    
    public function getAllURIs($data)
    {
        $sql = "SELECT url_page FROM " . DB_PREFIX . "visites";
        $uris = $this->db->query($sql);

        //$arUri = array_count_values($uris);
		return $uris;
    }
}