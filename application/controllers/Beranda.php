<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$data['web']	= $this->MWeb->tampil()->row(); //menampilkan data dari model MWeb
		$data['konten_public'] = "konten_public"; //menampilkan view dari konten public
		$this->load->view('template_public', $data); //menampilkan view dari template public
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */