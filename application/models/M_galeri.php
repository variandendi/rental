<?php
class M_galeri extends CI_Model{

	function get_all_galeri(){
		$hsl=$this->db->query("SELECT dt_gallery.*,DATE_FORMAT(tanggal_gallery,'%d/%m/%Y') AS tanggal,nama_album FROM dt_gallery join dt_album on id_album_gallery=id_album ORDER BY id_gallery DESC");
		return $hsl;
	}
	function simpan_galeri($judul,$album,$user_id,$user_nama,$gambar){
		$this->db->trans_start();
            $this->db->query("insert into dt_gallery(judul_gallery,id_album_gallery,id_user_gallery,author_gallery,gambar_gallery) values ('$judul','$album','$user_id','$user_nama','$gambar')");
            $this->db->query("update dt_album set jumlah_album=jumlah_album+1 where id_album='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_galeri($id_gallery,$judul,$album,$user_id,$user_nama,$gambar){
		$hsl=$this->db->query("update dt_gallery set judul_gallery='$judul',id_album_gallery='$album',id_user_gallery='$user_id',author_gallery='$user_nama',gambar_gallery='$gambar' where id_gallery='$id_gallery'");
		return $hsl;
	}
	function update_galeri_tanpa_img($id_gallery,$judul,$album,$user_id,$user_nama){
		$hsl=$this->db->query("update dt_gallery set judul_gallery='$judul',id_album_gallery='$album',id_user_gallery='$user_id',author_gallery='$user_nama' where id_gallery='$id_gallery'");
		return $hsl;
	}
	function hapus_galeri($kode,$album){
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
	function get_galeri_home(){
		$hsl=$this->db->query("SELECT dt_gallery.*,DATE_FORMAT(tanggal_gallery,'%d/%m/%Y') AS tanggal,nama_album FROM dt_gallery join dt_album on id_album_gallery=id_album ORDER BY id_gallery DESC limit 4");
		return $hsl;
	}

	function get_galeri_by_id_album($idalbum){
		$hsl=$this->db->query("SELECT dt_gallery.*,DATE_FORMAT(tanggal_gallery,'%d/%m/%Y') AS tanggal,nama_album FROM dt_gallery join dt_album on id_album_gallery=id_album where id_album_gallery='$idalbum' ORDER BY id_gallery DESC");
		return $hsl;
	}
	

}