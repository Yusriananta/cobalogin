<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
		/*cek_logged_in();*/
	}


	public function index()
	{
		$data['title'] = 'Pelaksanaan Program';
		//Memanggil data User
		//Memanggil data User
		$user = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['user'] = $user;
		$id_unit = $user['id_unit'];

		$bulan = date('m');
		$tahun = date('Y');
		
		$data['mandatori'] = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND mandatori = 1 ORDER BY tanggal ASC")->result_array();
		$data['planning'] = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND approvel = 0 AND mandatori = 0 AND id_unit = $id_unit ORDER BY tanggal ASC")->result_array();
		$data['approved'] = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND approvel = 1 AND mandatori = 0 AND id_unit = $id_unit ORDER BY tanggal ASC")->result_array();

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/index', $data);
			$this->load->view('templates/footer');
	}

	public function Pelaksanaan()
	{
		$data['title'] = 'Pelaksanaan Program';
		//Memanggil data User
		$user = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['user'] = $user;
		$id_unit = $user['id_unit'];

		$data['approved'] = $this->program_model->planApproved();

		$this->form_validation->set_rules('change_agent', 'Nama Change Agent' ,'required');
		$this->form_validation->set_rules('pemimpin', 'Nama Pemimpin' ,'required');
		$this->form_validation->set_rules('kegiatan_budaya', 'Nama Kegiatan Budaya' ,'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Kegiatan' ,'required');
		$this->form_validation->set_rules('tanggal', 'tanggal Pelaksanaan' ,'required');
		$this->form_validation->set_rules('q1', 'Question' ,'required');
		$this->form_validation->set_rules('q2', 'Question' ,'required');
		$this->form_validation->set_rules('q3', 'Question' ,'required');

		if ($this->form_validation->run() == false){

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/Pelaksanaan', $data);
			$this->load->view('templates/footer');
		}else{

			


           $config['upload_path']          = './assets/img/kegiatan/';
                $config['allowed_types']        = 'gif|jpg|png|PNG';
                $config['max_size']             = 5120; //max file 5mb
               

                $this->load->library('upload', $config);

                if (!empty($_FILES['image_q1'])) {
                	$this->upload->do_upload('image_q1');
                	$data1 		= $this->upload->data();
                	$image_q1	= $data1['file_name'];
                	
                }

                  if (!empty($_FILES['image_q2'])) {
                	$this->upload->do_upload('image_q2');
                	$data2 		= $this->upload->data();
                	$image_q2	= $data2['file_name'];
                }

                if (!empty($_FILES['image_q3'])) {
                	$this->upload->do_upload('image_q3');
                	$data3 		= $this->upload->data();
                	$image_q3	= $data3['file_name'];
                }

                if (!empty($_FILES['evidence1'])) {
                	$this->upload->do_upload('evidence1');
                	$data4 		= $this->upload->data();
                	$evidence1	= $data4['file_name'];
                }


                if (!empty($_FILES['evidence2'])) {
                	$this->upload->do_upload('evidence2');
                	$data5 		= $this->upload->data();
                	$evidence2	= $data5['file_name'];
                }


                if (!empty($_FILES['evidence3'])) {
                	$this->upload->do_upload('evidence3');
                	$data6 		= $this->upload->data();
                	$evidence3	= $data6['file_name'];
                }
                		


                        $data =
							[
							'id_unit'			=> $id_unit,
							'change_agent'		=> $this->input->post('change_agent', true),
							'pemimpin'			=> $this->input->post('pemimpin', true),
							'kegiatan_budaya'	=> $this->input->post('kegiatan_budaya', true),
							'deskripsi'			=> $this->input->post('deskripsi', true),
							'tanggal'			=> $this->input->post('tanggal', true),
							'poin'				=> 35,
							'q1'				=> $this->input->post('q1', true),
							'q2'				=> $this->input->post('q2', true),
							'q3'				=> $this->input->post('q3', true),
							'image_q1'				=> $image_q1,
							'Image_q2'				=> $image_q2,
							'image_q3'				=> $image_q3,
							'evidence1'				=> $evidence1,
							'evidence2'				=> $evidence2,
							'evidence3'				=> $evidence3
							];

							$id_kegiatan = $this->input->post('id');
							
							$this->db->insert('pelaksanaan', $data);
							$terlaksana = ['terlaksana'=>1];
							$this->db->where('id', $id_kegiatan);
							$this->db->update('planning', $terlaksana);
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pelaksanaan kegiatan budaya berhasil di simpan</div>');
							redirect('laporan');
                }

			

			
		

			
	}

	public function laporan_pelaksanaan()
	{
		$data['title'] = 'Laporan Pelaksanaan';
		//Memanggil data User
		$user = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();

		$data['user'] = $user;
		$id_unit = $user['id_unit'];

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if (!$bulan) {
			$bulan = date('m');
			}

		if (!$tahun) {
			$tahun = date('Y');
			}

		$data['terlaksana'] = $this->db->query("SELECT * FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND id_unit = $id_unit ORDER BY tanggal ASC")->result_array();

		

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/laporan_pelaksanaan', $data);
			$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Laporan Pelaksanaan';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();

		$this->load->model('program_model');
		$detail = $this->program_model->detail_kegiatan($id);
		$data['detail'] = $detail;

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/detail_kegiatan', $data);
			$this->load->view('templates/footer');

				
	}


		public function grafik_user()
	{
		$data['title'] = 'Grafik Bulanan';
		//Memanggil data User
		$user = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();

		$data['user'] = $user;
		$id_unit = $user['id_unit'];
		$tahun=$this->input->post('tahun', true);

		if (!$tahun) {
			$tahun = date('Y');
		}

		$data['tahun'] = $this->program_model->getTahunPlanning();
		$data['unit'] = $this->db->get_where('unit_kerja', ['id' => $id_unit])->row_array();
		$data['tahun_grp'] = $tahun;
		$data['data_grp']=$this->program_model->nilaiGrafik($id_unit, $tahun);
		$data['valueChart']=$this->program_model->nilaiGrafik($id_unit, $tahun);

	
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/grafik_user', $data);
			$this->load->view('templates/footer', $data);
	}


}