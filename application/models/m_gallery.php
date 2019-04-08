<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

	function get_all_gallery(){
		$galeri=$this->db->query("SELECT dt_gallery.*,DATE_FORMAT(tanggal_gallery,'%d/%m/%Y') AS tanggal,nama_album FROM dt_gallery join dt_album on id_album_gallery=id_album ORDER BY id_gallery DESC");
		return $galeri;
	}
	function simpan_gallery($judul,$album,$user_id,$user_nama,$gambar){
		$this->db->trans_start();
            $this->db->query("insert into dt_gallery(judul_gallery,id_album_gallery,id_user_gallery,author_gallery,gambar_gallery) values ('$judul','$album','$user_id','$user_nama','$gambar')");
            $this->db->query("update dt_album set jumlah_album=jumlah_album+1 where id_album='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	function update_gallery($galeri_id,$judul,$album,$user_id,$user_nama,$gambar){
		$gallery=$this->db->query("update dt_gallery set judul_gallery='$judul',id_album_gallery='$album',id_pengguna_pengguna='$user_id',author_gallery='$user_nama',gambar_gallery='$gambar' where id_gallery='$galeri_id'");
		return $gallery;
	}
	function update_gallery_tanpa_gambar($galeri_id,$judul,$album,$user_id,$user_nama){
		$hsl=$this->db->query("update dt_gallery set judul_gallery='$judul',id_album_gallery='$album',id_user_gallery='$user_id',author_gallery='$user_nama' where id_gallery='$galeri_id'");
		return $gallery;
	}
	function hapus_gallery($kode,$album){
		$this->db->trans_start();
            $this->db->query("delete from dt_gallery where id_gallery='$kode'");
            $this->db->query("update dt_album set jumlah_album=jumlah_album-1 where id_album='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_gallery_home(){
		$gallery=$this->db->query("SELECT dt_gallery.*,DATE_FORMAT(tanggal_gallery,'%d/%m/%Y') AS tanggal,nama_album FROM dt_gallery join dt_album on id_album_gallery=id_album ORDER BY id_gallery DESC limit 4");
		return $gallery;
	}

	function get_gallery_by_album_id($id_album){
		$gallery=$this->db->query("SELECT dt_gallery.*,DATE_FORMAT(tanggal_gallery,'%d/%m/%Y') AS tanggal,nama_album FROM dt_gallery join dt_album on id_album_gallery=id_album where galeri_id_album='$id_album' ORDER BY id_gallery DESC");
		return $gallery;
	}
}

/* End of file m_gallery.php */
/* Location: ./application/models/m_gallery.php */