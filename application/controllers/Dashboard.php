<?php
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MLogin'); //menampilkan data model MLogin
		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login')); //url yg dituju
		}
	}

    public function index()
    {
    	$data['konten'] = "konten"; //menampilkan view konten
    	$data['web']	= $this->MWeb->tampil()->row(); //menampilkan data model MWeb
    	$id_login = $this->session->userdata("id_user"); //sesi untuk login
		$data['login'] = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row(); // mengakses database
		
        $this->load->view('template', $data); //menampilkan view template
    }
}
