<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_user');
		$this->load->library('upload');
	}
	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_user->get_user_login($kode);
		$x['data']=$this->m_user->get_all_user();
		$this->load->view('admin/v_user',$x);
	}

	function simpan_user(){
	            $config['upload_path'] = './assets/gambar/'; //path folder
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
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $nama=$this->input->post('xnama');
	                        $jenkel=$this->input->post('xjenkel');
	                        $username=$this->input->post('xusername');
	                        $password=$this->input->post('xpassword');
                            $konfirm_password=$this->input->post('xpassword2');
                            $email=$this->input->post('xemail');
                            $nohp=$this->input->post('xkontak');
							$level=$this->input->post('xlevel');
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/user');
     						}else{
	               				$this->m_user->simpan_user($nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar);
	                    		echo $this->session->set_flashdata('msg','success');
	               				redirect('admin/user');
	               				
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/user');
	                }
	                 
	            }else{
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xkontak');
					$level=$this->input->post('xlevel');
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/user');
     				}else{
	               		$this->m_user->simpan_user_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','success');
	               		redirect('admin/user');
	               	}
	            } 

	}

	function update_user(){
				
	            $config['upload_path'] = './assets/gambar/'; //path folder
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
	                        $config['source_image']='./assets/gambar/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/gambar/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
	                        $nama=$this->input->post('xnama');
	                		$jenkel=$this->input->post('xjenkel');
	                		$username=$this->input->post('xusername');
	                		$password=$this->input->post('xpassword');
                    		$konfirm_password=$this->input->post('xpassword2');
                    		$email=$this->input->post('xemail');
                    		$nohp=$this->input->post('xkontak');
							$level=$this->input->post('xlevel');
                            if (empty($password) && empty($konfirm_password)) {
                            	$this->m_user->update_user_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/user');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/user');
     						}else{
	               				$this->m_user->update_user($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/user');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/user');
	                }
	                
	            }else{
	            	$kode=$this->input->post('kode');
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xkontak');
					$level=$this->input->post('xlevel');
	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->m_user->update_user_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','info');
	               		redirect('admin/user');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/user');
     				}else{
	               		$this->m_user->update_user_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','warning');
	               		redirect('admin/user');
	               	}
	            } 

	}

	function hapus_user(){
		$kode=$this->input->post('kode');
		$data=$this->m_user->get_user_login($kode);
		$q=$data->row_array();
		$p=$q['foto'];
		$path=base_url().'assets/gambar/'.$p;
		delete_files($path);
		$this->m_user->hapus_user($kode);
	    echo $this->session->set_flashdata('msg','success-hapus');
	    redirect('admin/user');
	}

	function reset_password(){
   
        $id=$this->uri->segment(4);
        $get=$this->m_user->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['username'];
        }
        $pass=rand(123456,999999);
        $this->m_user->resetpass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
	    redirect('admin/user');
   
    }

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */