<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
	}
	public function index()
	{
		$this->load->view('admin/v_dashboard');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */