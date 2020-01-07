<?php
class ModelExtensionReportVisites extends Model {

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
  
    public function getDistinctURIs($data)
    {
        $sql = "SELECT COUNT(DISTINCT url_page) FROM " . DB_PREFIX . "visites";
        $query = $this->db->query($sql);

		return $distinctUris;
    }
    
    public function getAllURIs($data = array())
    {
        //set global sql_mode='';

        $sql = "SELECT titre, url_page, COUNT(*) AS nombreURL FROM " . DB_PREFIX . "visites 
        GROUP BY url_page 
        ORDER BY nombreURL DESC";
        
        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }
}

?>