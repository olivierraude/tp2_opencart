<?php
class ModelReportStatistics extends Model {

	/**
	 * Pour le tp2, ajout des méthodes pour récupérer les données dans le tableau visites
	 */

	public function getAllVisites()
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "visites");
		return $query->rows;
    }
    
    public function getVisite($id_visite)
    {
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
    }
    
    public function getPlusVisite($id_visite)
    {
        $this->db->query("SELECT * FROM " . DB_PREFIX . "visites WHERE id = '" . (int)$data['id'] . "' ORDER BY date DESC");
	}
	

	/*	function report Statistics	*/

	public function getStatistics() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "statistics");

		return $query->rows;
	}
	
	public function getValue($code) {
		$query = $this->db->query("SELECT value FROM " . DB_PREFIX . "statistics WHERE `code` = '" . $this->db->escape($code) . "'");

		if ($query->num_rows) {
			return $query->row['value'];
		} else {
			return null;	
		}
	}
	
	public function addValue($code, $value) {
		$this->db->query("UPDATE " . DB_PREFIX . "statistics SET `value` = (`value` + '" . (float)$value . "') WHERE `code` = '" . $this->db->escape($code) . "'");
	}
	
	public function editValue($code, $value) {
		$this->db->query("UPDATE " . DB_PREFIX . "statistics SET `value` = '" . (float)$value . "' WHERE `code` = '" . $this->db->escape($code) . "'");
	}
		
	public function removeValue($code, $value) {
		$this->db->query("UPDATE " . DB_PREFIX . "statistics SET `value` = (`value` - '" . (float)$value . "') WHERE `code` = '" . $this->db->escape($code) . "'");
	}	
}
