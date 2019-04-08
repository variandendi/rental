<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kontak');
	}

	function index(){
		$this->m_kontak->update_status_kontak();
		$x['data']=$this->m_kontak->get_pesan();
		$this->load->view('admin/v_inbox',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/pesan');
	}

}

/* End of file inbox.php */
/* Location: ./application/controllers/admin/inbox.php */