<?php
class ModelVisitesVisites extends Model{

    /**
     * Pour le tp2, ajout des méthodes pour récupérer les données dans le tableau visites
     */

    public function getAllVisites()
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "visites");
        return $query->rows;
    }
    
    public function getPlusVisite($id_visite)
    {
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    }
}

?>