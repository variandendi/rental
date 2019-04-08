<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_album extends CI_Model {

	function get_all_album(){
		$gallery=$this->db->query("SELECT dt_album.*,DATE_FORMAT(tanggal_album,'%d/%m/%Y') AS tanggal FROM dt_album ORDER BY id_album DESC");
		return $gallery;
	}
	function simpan_album($album,$user_id,$user_nama,$gambar){
		$gallery=$this->db->query("insert into dt_album(nama_album,id_user_album,author_album,cover_album) values ('$album','$user_id','$user_nama','$gambar')");
		return $gallery;
	}
	function update_album($album_id,$album_nama,$user_id,$user_nama,$gambar){
		$gallery=$this->db->query("update dt_album set nama_album='$album_nama',id_user_album='$user_id',author_album='$user_nama',cover_album='$gambar' where id_album='$album_id'");
		return $gallery;
	}
	function update_album_tanpa_gambar($album_id,$album_nama,$user_id,$user_nama){
		$gallery=$this->db->query("update dt_album set nama_album='$album_nama',id_user_album='$user_id',author_album='$user_nama' where id_album='$album_id'");
		return $gallery;
	}
	function hapus_album($kode){
		$gallery=$this->db->query("delete from dt_album where id_album='$kode'");
		return $gallery;
	}

}

/* End of file m_album.php */
/* Location: ./application/models/m_album.php */