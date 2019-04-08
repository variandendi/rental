<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	function get_all_berita(){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita ORDER BY id_berita DESC");
		return $hsl;
	}
	function simpan_berita($judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("insert into dt_berita(judul_berita,isi_berita,id_kategori_berita,nama_kategori_berita,id_user_berita,author_berita,gambar_berita,slug_berita) values ('$judul','$isi','$kategori_id','$kategori_nama','$user_id','$user_nama','$gambar','$slug')");
		return $hsl;
	}
	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita where id_berita='$kode'");
		return $hsl;
	}
	function update_berita($id_berita,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("update dt_berita set judul_berita='$judul',isi_berita='$isi',id_kategori_berita='$kategori_id',nama_kategori_berita='$kategori_nama',id_user_berita='$user_id',author_berita='$user_nama',gambar_berita='$gambar',slug_berita='$slug' where id_berita='$id_berita'");
		return $hsl;
	}
	function update_berita_tanpa_img($id_berita,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("update dt_berita set judul_berita='$judul',isi_berita='$isi',id_kategori_berita='$kategori_id',nama_kategori_berita='$kategori_nama',id_user_berita='$user_id',author_berita='$user_nama',slug_berita='$slug' where id_berita='$id_berita'");
		return $hsl;
	}
	function hapus_berita($kode){
		$hsl=$this->db->query("delete from dt_berita where id_berita='$kode'");
		return $hsl;
	}



	//Front-End

	function get_post_home(){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d %M %Y') AS tanggal FROM dt_berita ORDER BY id_berita DESC limit 3");
		return $hsl;
	}

	function get_berita_slider(){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita where image_slider_berita='1' ORDER BY id_berita DESC");
		return $hsl;
	}

	function berita_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita ORDER BY id_berita DESC limit $offset,$limit");
		return $hsl;
	}

	function berita(){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita ORDER BY id_berita DESC");
		return $hsl;
	} 
	function get_berita_by_slug($slug){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita where slug_berita='$slug'");
		return $hsl;
	}

	function get_berita_by_kategori($kategori_id){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita where id_kategori_berita='$kategori_id'");
		return $hsl;
	}

	function get_berita_by_kategori_perpage($kategori_id,$offset,$limit){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita where id_kategori_berita='$kategori_id' limit $offset,$limit");
		return $hsl;
	}

	function search_berita($keyword){
		$hsl=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM dt_berita WHERE judul_berita LIKE '%$keyword%'");
		return $hsl;
	}

	function post_komentar($nama,$email,$web,$msg,$id_berita){
		$hsl=$this->db->query("INSERT INTO dt_komentar (nama_komentar,email_komentar,email_komentar,isi_komentar,id_komentar_berita) VALUES ('$nama','$email','$web','$msg','$id_berita')");
		return $hsl;
	}


	function jumlah_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM dt_view WHERE ip_view='$user_ip' AND id_view_berita='$kode' AND DATE(tanggal_view)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO dt_view (ip_view,id_view_berita) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE dt_berita SET views_berita=views_berita+1 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Good
    function count_good($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM dt_rating WHERE ip_rating='$user_ip' AND id_rating_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO dt_rating (ip_rating,point_rating,id_rating_berita) VALUES('$user_ip','1','$kode')");
				$this->db->query("UPDATE dt_berita SET rating_berita=rating_berita+1 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_like($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM dt_rating WHERE ip_rating='$user_ip' AND id_rating_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO dt_rating (ip_rating,point_rating,id_rating_berita) VALUES('$user_ip','2','$kode')");
				$this->db->query("UPDATE dt_berita SET rating_berita=rating_berita+2 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_love($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM dt_rating WHERE ip_rating='$user_ip' AND id_rating_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO dt_rating (ip_rating,point_rating,id_rating_berita) VALUES('$user_ip','3','$kode')");
				$this->db->query("UPDATE dt_berita SET rating_berita=rating_berita+3 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_genius($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM dt_rating WHERE ip_rating='$user_ip' AND id_rating_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO dt_rating (ip_rating,point_rating,id_rating_berita) VALUES('$user_ip','4','$kode')");
				$this->db->query("UPDATE dt_berita SET rating_berita=rating_berita+4 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    function cek_ip_rate($kode){
    	$user_ip=$_SERVER['REMOTE_ADDR'];
        $hsl=$this->db->query("SELECT * FROM dt_rating WHERE ip_rating='$user_ip' AND id_rating_berita='$kode'");
        return $hsl;
    }


    function get_berita_populer(){
		$hasil=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d %M %Y') AS tanggal FROM dt_berita ORDER BY views_berita DESC limit 10");
		return $hasil;
	}

	function get_berita_terbaru(){
		$hasil=$this->db->query("SELECT dt_berita.*,DATE_FORMAT(tanggal_berita,'%d %M %Y') AS tanggal FROM dt_berita ORDER BY id_berita DESC limit 10");
		return $hasil;
	}

	function get_kategori_for_blog(){
		$hasil=$this->db->query("SELECT COUNT(id_kategori_berita) AS jml,id_kategori,nama_kategori FROM dt_berita JOIN dt_kategori ON id_kategori_berita=id_kategori GROUP BY id_kategori_berita");
		return $hasil;
	}

}

/* End of file m_berita.php */
/* Location: ./application/models/m_berita.php */