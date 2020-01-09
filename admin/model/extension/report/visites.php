<?php
class ModelExtensionReportVisites extends Model {

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


}

?>