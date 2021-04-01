<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MWeb extends CI_Model {

	//model untuk tampil
	public function tampil()
	{
		return $this->db->get('tb_web');
	}	

}

/* End of file MWeb.php */
/* Location: ./application/models/MWeb.php */