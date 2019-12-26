<?php
class ModelVisitesVisites extends Model{

    /**
     * Pour le tp2, ajout des méthodes pour récupérer les données dans le tableau visites
     */

    public function getAllVisites()
    {
        $query = $this->db->query("SELECT date_visite, titre , url_page, id_usager, adresse_ip
                                    FROM " . DB_PREFIX . "visites
                                    ORDER BY date_visite DESC");
        return $query->rows;
    }
    
    public function getPlusVisite($id_visite)
    {
        // SELECT `titre`,`url_page`,count(*) as nombre_visites 
        // FROM `tp2_visites` 
        // group by `url_page` 
        // ORDER BY `nombre_visites` 
        // DESC limit 15
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    }
}

?>