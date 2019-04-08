<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function cekadmin($username,$password){
        $login=$this->db->query("SELECT * FROM dt_user WHERE username='$username' AND password=md5('$password')");
        return $login;
    }
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */