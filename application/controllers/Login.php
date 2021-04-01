<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MLogin'); //menampilkan data model MLogin
		if ($this->session->userdata('status') == 'login') {
			redirect(base_url('dashboard')); //url yg dituju
		}
	}

	public function index()
	{
		$data['web']	= $this->MWeb->tampil()->row(); //menampilkan data model MWeb
		$data['title'] 	= "Login Aplikasi"; //judul 
		$this->load->view('tampil_login', $data); //menampilkan view tampil login
	}

	//fungsi untuk aksi login
	public function aksilogin()
	{
		$id_user = $this->input->post('id_user'); 
		$password = $this->input->post('password');

		$where = array(
			'id_user' => $id_user,
			'password' => md5($password)
		);

		$cek = $this->MLogin->login("tb_user", $where )->num_rows(); //cek model MLogin

		if ($cek > 0 ) {

			$data_session = array(
				'id_user' => $id_user,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard')); //url yang dituju
		} else {
			$this->session->set_flashdata('gagal_login', 'gagal'); //sesi gagal login
			redirect(base_url('login')); //url yang dituju
		}
	}

}
