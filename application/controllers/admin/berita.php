<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_berita');
		$this->load->model('m_user');
		$this->load->library('upload');
	}
	function index(){
		$x['data']=$this->m_berita->get_all_berita();
		$this->load->view('admin/v_berita',$x);
	}
	function add_berita(){
		$x['kat']=$this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_add_berita',$x);
	}
	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_berita->get_berita_by_kode($kode);
		$x['kat']=$this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_edit_berita',$x);
	}
	function simpan_berita(){
				$config['upload_path'] = './assets/img/car/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/img/car/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 840;
	                        $config['height']= 450;
	                        $config['new_image']= './assets/img/car'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
							$judul=strip_tags($this->input->post('xjudul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$pra_slug=$filter2.'.html';
							$slug=strtolower(str_replace(" ", "-", $pra_slug));
							$isi=$this->input->post('xisi');
							$kategori_id=strip_tags($this->input->post('xkategori'));
							$data=$this->m_kategori->get_kategori_byid($kategori_id);
							$q=$data->row_array();
							$kategori_nama=$q['nama_kategori'];
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_user->get_user_login($kode);
							$p=$user->row_array();
							$user_id=$p['id'];
							$user_nama=$p['nama'];
							$this->m_berita->simpan_berita($judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$gambar,$slug);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/berita');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/berita');
	                }
	                 
	            }else{
					redirect('admin/berita');
				}
				
	}
	
	function update_berita(){
				
	            $config['upload_path'] = './assets/img/car/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/img/car/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 840;
	                        $config['height']= 450;
	                        $config['new_image']= './assets/img/car/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $berita_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
	                        $filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$pra_slug=$filter2.'.html';
							$slug=strtolower(str_replace(" ", "-", $pra_slug));
							$isi=$this->input->post('xisi');
							$kategori_id=strip_tags($this->input->post('xkategori'));
							$data=$this->m_kategori->get_kategori_byid($kategori_id);
							$q=$data->row_array();
							$kategori_nama=$q['nama_kategori'];
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_user->get_user_login($kode);
							$p=$user->row_array();
							$user_id=$p['id'];
							$user_nama=$p['nama'];
							$this->m_berita->update_berita($berita_id,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$gambar,$slug);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/berita');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/user');
	                }
	                
	            }else{
							$berita_id=$this->input->post('kode');
							$judul=strip_tags($this->input->post('xjudul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$pra_slug=$filter2.'.html';
							$slug=strtolower(str_replace(" ", "-", $pra_slug));
							$isi=$this->input->post('xisi');
							$kategori_id=strip_tags($this->input->post('xkategori'));
							$data=$this->m_kategori->get_kategori_byid($kategori_id);
							$q=$data->row_array();
							$kategori_nama=$q['nama_kategori'];
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_user->get_user_login($kode);
							$p=$user->row_array();
							$user_id=$p['id'];
							$user_nama=$p['nama'];
							$this->m_berita->update_berita_tanpa_img($berita_id,$judul,$isi,$kategori_id,$kategori_nama,$user_id,$user_nama,$slug);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/berita');
	            } 

	}

	function hapus_berita(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/img/car/'.$gambar;
		unlink($path);
		$this->m_berita->hapus_berita($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/berita');
	}

}

/* End of file berita.php */
/* Location: ./application/controllers/admin/berita.php */