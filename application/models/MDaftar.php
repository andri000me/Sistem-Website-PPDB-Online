<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDaftar extends CI_Model {

	//model untuk tampil
	public function tampil() {
		return $this->db->get('tb_daftar');
	}

	//model untuk simpan
	public function simpan($data) {
		return $this->db->insert('tb_daftar', $data);
	}

	//model untuk hapus
	public function hapus($data)
	{
		$hapus = $this->db->where('id_daftar', $data);
        return $this->db->delete('tb_daftar', $hapus);
    }
}
    


/* End of file MDaftar.php */
/* Location: ./application/models/MDaftar.php */