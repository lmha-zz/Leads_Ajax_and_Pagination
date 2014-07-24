<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('lead');
		$this->load->library('pagination');
	}

	public function index() {
		$leads = $this->lead->read_leads(0);
		$rows = $this->lead->count_leads();
		$pagination = $this->updatePagination(intval($rows['rows']));
		$this->load->view('index', array('leads' => $leads,
										 'pagination' => $pagination));
	}

	public function limit_leads($limit = null) {
		if(empty($this->input->post('name'))) {
			$name = '';
		} else {
			$name = $this->input->post('name');
		}
		if(empty($this->input->post('from_date'))) {
			$from_date = 1;
		} else {
			$from_date = "'".$this->input->post('from_date')."'";
		}
		if(empty($this->input->post('to_date'))) {
			$to_date = 'NOW()';
		} else {
			$to_date = "'".$this->input->post('to_date')."'";
		}

		if($limit == null) {
			$leads = $this->lead->limit_leads($name, $from_date, $to_date, 0);
		} else {
			$leads = $this->lead->limit_leads($name, $from_date, $to_date, $limit);
		}

		$rows = $this->lead->count_limit_leads($name, $from_date, $to_date);
		$pagination = $this->updatePagination(intval($rows['rows']));
		$data = array('leads' => $leads,
					  'pagination' => $pagination);

		echo json_encode($data);
	}

	public function updatePagination($rows) {
		$config['base_url'] = 'leads/limit_leads';
		$config['total_rows'] = $rows;
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */