<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita');
	}
	public function index()
	{
		$jum=$this->m_berita->berita();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=6;
        $config['base_url'] = base_url() . 'berita/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $beritaku['page'] =$this->pagination->create_links();
		$beritaku['data']=$this->m_berita->berita_perpage($offset,$limit);
		$this->load->view('v_blog',$beritaku);
	}

	function detail($slug){
		$data=$this->m_berita->get_berita_by_slug($slug);
		$q=$data->row_array();
		$kode=$q['id_berita'];
		$this->m_berita->jumlah_views($kode);
		$beritaku['rate']=$this->m_berita->cek_ip_rate($kode);
		$beritaku['data']=$this->m_berita->get_berita_by_slug($slug);
		$beritaku['populer']=$this->m_berita->get_berita_populer();
		$beritaku['terbaru']=$this->m_berita->get_berita_terbaru();
		$beritaku['kat']=$this->m_berita->get_kategori_for_blog();
		$this->load->view('v_blog_detail',$beritaku);
	}

	function kategori(){
		$kategori_id=$this->uri->segment(3);
		$jum=$this->m_berita->get_berita_by_kategori($kategori_id);
        $page=$this->uri->segment(4);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=5;
        $config['base_url'] = base_url() . 'berita/kategori/'.$kategori_id.'/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $beritaku['page'] =$this->pagination->create_links();
		$beritaku['data']=$this->m_berita->get_berita_by_kategori_perpage($kategori_id,$offset,$limit);
		$this->load->view('v_blog',$beritaku);
	}

	function search(){
		$keyword=str_replace("'", "", $this->input->post('xfilter',TRUE));
		$beritaku['data']=$this->m_berita->search_berita($keyword);
		$this->load->view('v_blog',$beritaku);
	}

	function komentar(){
		$id_berita=$this->input->post('kode');
		$nama=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('nama',TRUE))));
		$email=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('email',TRUE))));
		$web=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('web',TRUE))));
		$msg=strip_tags(trim(htmlspecialchars(str_replace("'", "", $this->input->post('message',TRUE)))));
		$this->m_berita->post_komentar($nama,$email,$web,$msg,$id_berita);
		echo $this->session->set_flashdata("msg","<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Informasi!</strong> Komentar Anda akan tampil setelah di moderasi oleh admin!</div>");
		redirect('berita/detail/'.$id_berita);
	}

	function good($slug){
		$data=$this->m_berita->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->m_berita->count_good($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

	function like($slug){
		$data=$this->m_berita->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->m_berita->count_like($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

	function love($slug){
		$data=$this->m_berita->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->m_berita->count_love($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

	function genius($slug){
		$data=$this->m_berita->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->m_berita->count_genius($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */