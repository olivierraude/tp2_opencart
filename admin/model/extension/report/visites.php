<?php
class ModelVisites extends Model {

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
        $distinctUris = $this->db->query($sql);

		return $distinctUris;
    }
    
    public function getAllURIs($data = array())
    {
        $sql = "SELECT url_page, COUNT(*)AS nombreURL FROM " . DB_PREFIX . "visites 
                    GROUP BY url_page 
                    ORDER BY nombreURL DESC";
        
        $query = $this->db->query($sql);

        return $query;
    }
}

?>