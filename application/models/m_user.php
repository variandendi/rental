<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function get_all_user(){
		$hsl=$this->db->query("SELECT dt_user.*,IF(jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM dt_user");
		return $hsl;	
	}

	function simpan_user($nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		$hsl=$this->db->query("INSERT INTO dt_user (nama,jenkel,username,password,email,nohp,levelakses,foto) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$gambar')");
		return $hsl;
	}

	function simpan_user_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("INSERT INTO dt_user (nama,jenkel,username,password,email,nohp,levelakses) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE PENGGUNA //
	function update_user_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		$hsl=$this->db->query("UPDATE dt_user set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',levelakses='$level',foto='$gambar' where id='$kode'");
		return $hsl;
	}
	function update_user($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		$hsl=$this->db->query("UPDATE dt_user set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',levelakses='$level',foto='$gambar' where id='$kode'");
		return $hsl;
	}

	function update_user_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE dt_user set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',levelakses='$level' where id='$kode'");
		return $hsl;
	}
	function update_user_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE dt_user set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',levelakses='$level' where id='$kode'");
		return $hsl;
	}
	//END UPDATE PENGGUNA//

	function hapus_user($kode){
		$hsl=$this->db->query("DELETE FROM dt_user where id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM dt_user where id='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE dt_user set password=md5('$pass') where id='$id'");
		return $hsl;
	}

	function get_user_login($kode){
		$hsl=$this->db->query("SELECT * FROM dt_user where id='$kode'");
		return $hsl;
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */