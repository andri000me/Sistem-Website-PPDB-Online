<?php
class Pendaftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDaftar');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        };

        $id_login   = $this->session->userdata("id_user");
        $datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
    }

	//fungsi untuk menampilkan data
    public function index()
    {
        $data['title']  = "Data Pendaftar";
        $data['data']   = $this->MDaftar->tampil()->result_array();
        $data['konten'] = "pendaftar/tampil";
		$data['web']    = $this->MWeb->tampil()->row();
		$jml_pria = $this->db->get_where('tb_daftar',['kelamin_siswa' => 'Pria'])->num_rows();
		$jml_wanita = $this->db->get_where('tb_daftar',['kelamin_siswa' => 'Wanita'])->num_rows();
		
		$cr['label'] = ['Pria','Wanita'];
		$cr['data'] = [$jml_pria,$jml_wanita];
		$data['chart_data'] = json_encode($cr);
        $this->load->view('template', $data);
    }

	//fungsi untuk tambah data
    public function tambah() {
    	$data['title']    = "Tambah Pendaftar";
        $data['web']    = $this->MWeb->tampil()->row();
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
			
			$config = [
                'file_name' => date('d-m-Y').'-img',
                'upload_path' => './upload/siswa',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

			$this->load->library('upload',$config);
			
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
					redirect(base_url('pendaftar'));
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
            $data['konten'] = "pendaftar/tambah";
            $this->load->view('template', $data);
        }
    }

	//fungsi untuk edit
    public function edit($id) {
        $data['title']  = "Edit Data Pendaftar";
        $data['web']    = $this->MWeb->tampil()->row();
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
			
			if(empty($_FILES['image'])) {
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
					// 'image' => $n,
					);

				$this->db->where('id_daftar', $id);
				$query = $this->db->update('tb_daftar', $objek);

				if ($query) {
					$this->session->set_flashdata('berhasil_edit', 'sukses');
					redirect(base_url('pendaftar'));
				}
			} else {
				$config = [
					'file_name' => date('d-m-Y').'-img',
					'upload_path' => './upload/siswa',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'max_size' => 2048,
				];
	
				$this->load->library('upload',$config);
				
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
		
					$this->db->where('id_daftar', $id);
					$query = $this->db->update('tb_daftar', $objek);
					if ($query) {
						$this->session->set_flashdata('berhasil_simpan', 'sukses');
						redirect(base_url('pendaftar'));
					}
				} else {
					$error = "
						<script>
							alert('Gagal');
						</script>
					";
					echo $error;
					redirect(base_url('pendaftar'));
				}
					
			}

        } else {
            $data['konten'] = "pendaftar/edit";
            $data['editdata'] = $this->db->get_where("tb_daftar", array('id_daftar'=> $id))->row();
            $this->load->view('template', $data); 
        }
    }

	//fungsi untuk hapus
    public function hapus($id)
    {

        $query = $this->MDaftar->hapus($id);

        if ($query) {
            $this->session->set_flashdata('berhasil_hapus', 'sukses');
            redirect(base_url('pendaftar'));
        }
    }

}
