<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MDaftar');
	}

	public function index()
	{
		$data['title']	= "Daftar Calon Peserta Didik"; //judul web
		$data['web']	= $this->MWeb->tampil()->row(); //menampilkan data dari model MWeb
		
		//kondisi submit untuk tambah
		if ($this->input->post('submit')) {

            $a = $this->input->post('nama_siswa');
            $b = $this->input->post('kelamin_siswa');
            $j = $this->input->post('warga_negara');
            $c = $this->input->post('tgl_lahir_siswa');
            $d = $this->input->post('agama_siswa');
            $e = $this->input->post('alamat_siswa');
            $f = $this->input->post('asal_sekolah_siswa');
            $g = $this->input->post('no_hp_siswa');
            $k = $this->input->post('email_siswa');
            $h = $this->input->post('nama_ayah_siswa');
            $l = $this->input->post('penghasilan_ayah_siswa');
            $i = $this->input->post('nama_ibu_siswa');
            $m = $this->input->post('penghasilan_ibu_siswa');
            // $n = $this->input->post('image');

			//untuk upload file atau gambar
			$config = [
                'file_name' => date('d-m-Y').'-img',
                'upload_path' => './upload/siswa',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

			$this->load->library('upload',$config); //akses library upload
			
			if($this->upload->do_upload('image')) {
				$file = $this->upload->data();
				$objek = array(
					'nama_siswa' => $a,
					'kelamin_siswa' => $b,
					'warga_negara' => $j,
					'tgl_lahir_siswa' => $c,
					'agama_siswa' => $d,
					'alamat_siswa' => $e,
					'asal_sekolah_siswa' => $f,
					'no_hp_siswa' => $g,
					'email_siswa' => $k,
					'nama_ayah_siswa' => $h,
					'penghasilan_ayah_siswa' => $l,
					'nama_ibu_siswa' => $i,
					'penghasilan_ibu_siswa' => $m,
					'image' => $file['file_name'],
					 );
	
				$query = $this->MDaftar->simpan($objek);

				// var_dump($query);
				// die;
	
				if ($query) {
					$this->session->set_flashdata('berhasil_simpan', 'sukses');
					redirect(base_url('daftar'));
				}
	
			} else {
				// $this->session->set_flashdata('Gagal', 'sukses');
				$error = "
					<script>
						alert('Gagal');
					</script>
				";
				echo $error;
				redirect(base_url('pendaftar'));
			}

        } else {
            $data['konten_public'] = "daftar"; //menampilkan data dari view konten public
			$this->load->view('template_public', $data); //menampilkan view template public
        }
    }

}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */
