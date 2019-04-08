<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_album');
		$this->load->model('m_gallery');
		$this->load->model('m_user');
		$this->load->library('upload');
	}
	function index(){
		
		$x['data']=$this->m_gallery->get_all_gallery();
		$x['alb']=$this->m_album->get_all_album();
		$this->load->view('admin/v_gallery',$x);
	}
	
	function simpan_gallery(){
				$config['upload_path'] = './assets/img/car'; //path folder
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
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './assets/img/car/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_user->get_user_login($kode);
							$p=$user->row_array();
							$user_id=$p['id'];
							$user_nama=$p['nama'];
							$this->m_gallery->simpan_gallery($judul,$album,$user_id,$user_nama,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/gallery');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/gallery');
	                }
	                 
	            }else{
					redirect('admin/gallery');
				}
				
	}
	
	function update_gallery(){
				
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
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './assets/img/car'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $gallery_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$images=$this->input->post('gambar');
							$path='./assets/gambar/'.$images;
							unlink($path);
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_user->get_user_login($kode);
							$p=$user->row_array();
							$user_id=$p['id'];
							$user_nama=$p['nama'];
							$this->m_gallery->update_gallery($gallery_id,$judul,$album,$user_id,$user_nama,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/gallery');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/gallery');
	                }
	                
	            }else{
							$gallery_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_user->get_user_login($kode);
							$p=$user->row_array();
							$user_id=$p['id'];
							$user_nama=$p['nama'];
							$this->m_gallery->update_gallery_tanpa_img($gallery_id,$judul,$album,$user_id,$user_nama);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/gallery');
	            } 

	}

	function hapus_gallery(){
		$kode=$this->input->post('kode');
		$album=$this->input->post('album');
		$gambar=$this->input->post('gambar');
		$path='./assets/img/car/'.$gambar;
		unlink($path);
		$this->m_gallery->hapus_gallery($kode,$album);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/gallery');
	}

}

/* End of file gallery.php */
/* Location: ./application/controllers/admin/gallery.php */