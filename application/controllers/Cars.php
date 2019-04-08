<?php
class Cars extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_gallery');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
	}

	function index(){
		$data['alb']=$this->m_album->get_all_album();
		$data['data']=$this->m_gallery->get_all_gallery();
		$this->load->view('v_cars',$data);
	}
}
