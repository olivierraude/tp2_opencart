<?php
class ModelVisitesVisites extends Model {

    public function getAllVisites()
    {
        $query = $this->db->query("SELECT * 
                                    FROM " . DB_PREFIX . "visites
                                    ORDER BY date_visite DESC");
        return $query->rows;
    }

    public function getTotalPagesVisitees()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "visites");

		return $query->row['total'];
    }

    
    // public function getVisite($id_visite)
    // {
    //     $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    // }
    
    // public function getPlusVisite($id_visite)
    // {
    //     $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    // }


}

?>