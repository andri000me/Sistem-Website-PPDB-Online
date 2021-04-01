<?php
class Logout extends CI_Controller {

	public function index()
	{
		$this->session->sess_destroy(); //sesi destroy
		redirect(base_url('beranda')); //url yang dituju
	}

}