<?php

class Lead extends CI_Model {

	public function read_leads($limit) {
		$query = "SELECT * FROM leads LIMIT {$limit}, 10";
		return $this->db->query($query)->result_array();
	}

	public function count_leads() {
		$query = "SELECT COUNT(leads_id) AS rows FROM leads";
		return $this->db->query($query)->row_array();
	}

	public function limit_leads($name, $from_date, $to_date, $limit) {
		$query = "SELECT * FROM leads WHERE CONCAT(first_name,' ', last_name) LIKE '".$this->db->escape_str($name)."%' AND registered_datetime BETWEEN {$from_date} AND {$to_date} LIMIT {$limit}, 10";
		return $this->db->query($query, array($from_date, $to_date))->result_array();
	}

	public function count_limit_leads($name, $from_date, $to_date) {
		$query = "SELECT COUNT(leads_id) AS rows FROM leads WHERE CONCAT(first_name,' ', last_name) LIKE '".$this->db->escape_str($name)."%' AND registered_datetime BETWEEN {$from_date} AND {$to_date}";
		return $this->db->query($query)->row_array();
	}

}

?>