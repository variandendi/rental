<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}
	public function index()
	{
		$this->load->view('admin/v_login');
	}
	function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        $password=strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
        $cadmin=$this->m_login->cekadmin($username,$password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();
            $newdata = array(
                'idadmin'   => $xcadmin['id'],
                'username'  => $xcadmin['username'],
                'nama'      => $xcadmin['nama'],
                'level'     => $xcadmin['levelakses'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('admin/dashboard'); 
        }else{
            redirect('administrator/gagal'); 
        }
    }


    function gagal(){
        $url=base_url('administrator');
        echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Username Atau Password Salah.</div>");
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('administrator');
        redirect($url);
    }
}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */