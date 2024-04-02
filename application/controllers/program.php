<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class program extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
		cek_logged_in();
	}


	public function index()
	{

		$data['title'] = 'Program Budaya';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();
		$data['user_unit'] = $this->db->get('unit_kerja')->result_array();

		foreach ($data['user_unit'] as $key) {
			$jumlahApprove = $this->program_model->jumlahApprove($key['id'],$_POST);
			if($jumlahApprove){
				$data1[]=array('id'=>$key['id'],
				'unit'=>$key['unit'],
				'approved'=>$jumlahApprove['approved'],
				'notApproved'=>$jumlahApprove['notApproved']);
			}else{
				$data1[]=array('id'=>$key['id'],
				'unit'=>$key['unit'],
				'approved'=>null,
				'notApproved'=>null);
			}
				
		};


		$data['planning'] = $this->db->get('planning')->result_array();
		$data['approved'] = $this->program_model->planApproved();
		$data['mandatori'] = $this->program_model->mandatori($_POST);
		$data['tahun'] = $this->program_model->getTahunPlanning();
		$data['jumlahApprove'] = $data1;

		/*
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');*/
		
		// $this->form_validation->set_rules('kegiatan', 'Nama Kegiatan' ,'required');
		// $this->form_validation->set_rules('deskripsi', 'Deskripsi' ,'required');
		


		if ($this->input->post('kegiatan')==null){
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('program/index', $data);
			$this->load->view('templates/footer');
		}else{

			$data = [
					'kegiatan'	=> $this->input->post('kegiatan'),
					'deskripsi'	=> $this->input->post('deskripsi'),
					'approvel'	=> 1,
					'mandatori'	=> 1,
					'tanggal'	=> date('Y-m-d')
			];

			$this->db->insert('planning', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kegiatan mandatori berhasil di input</div>');
			redirect('program');


		}
	}

	

	public function kegiatan_approved()
	{
		// print_r($_POST['idUnit']);
		// exit();
		$id = $_POST['idUnit'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$no=1;

		
		// $data= $this->program_model->planApproved($id, $_POST);
		$data= $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND mandatori = 0 AND approvel = 1 
		AND id_unit = $id ORDER BY tanggal ASC")->result_array();

		$no=1;
		foreach($data as $key){
			$sendData[]=array('approved'=>
										array('no'=>$no,
										'id'=>$key['id'],
										'id_unit'=>$key['id_unit'],
										'kegiatan'=>$key['kegiatan'],
										'deskripsi'=>$key['deskripsi'],
										'approvel'=>$key['approvel'],
										'mandatori'=>$key['mandatori']
								));
			$no++;
		}
		
		print_r(json_encode($sendData));


	}

	public function kegiatan_pending()
	{
		// print_r($_POST['idUnit']);
		// exit();
		$id = $_POST['idUnit'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$no=1;

		
		$data= $this->program_model->planPending($id);

		$no=1;
		foreach($data as $key){
			$sendData[]=array('notapproved'=>
										array('no'=>$no,
										'id'=>$key['id'],
										'id_unit'=>$key['id_unit'],
										'kegiatan'=>$key['kegiatan'],
										'deskripsi'=>$key['deskripsi'],
										'approvel'=>$key['approvel'],
										'mandatori'=>$key['mandatori']
								));
			$no++;
		}
		
		print_r(json_encode($sendData));


	}

	public function deleteMandatori($id)
	{

		$this->program_model->deletePlanning($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mandatori berhasil di  hapus</div>');
			redirect('program');
	}

	public function laporan_pelaksanaan()
	{
		$data['title'] = 'Laporan Pelaksanaan';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();

		$data['user_unit'] = $this->db->get_where('unit_kerja', ['unit'])->result_array();

		$data['planning'] = $this->program_model->planPending();
		$data['approved'] = $this->program_model->planApproved();
		$data['mandatori'] = $this->program_model->mandatori();


		
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('program/laporan_pelaksanaan', $data);
			$this->load->view('templates/footer');
	}


	public function kegiatan_terlaksana($id)
	{

		$data['title'] = 'Laporan Pelaksanaan';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();

		$data['user_unit'] = $this->db->get('unit_kerja')->result_array();
		$data['nama_unit'] = $this->member_model->getUnit($id,$_POST);
		$data['terlaksana'] =$this->program_model->kegiatan_terlaksana($id,$_POST);
		$data['tahun'] = $this->program_model->getTahunPlanning();


		
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('program/kegiatan_terlaksana', $data);
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
		$data['user_unit'] = $this->db->get_where('unit_kerja')->row_array();
		$data['nama_unit'] = $this->member_model->getUnit($id);
		$detail = $this->program_model->detail_kegiatan($id);
		$data['detail'] = $detail;

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('program/detail_kegiatan', $data);
			$this->load->view('templates/footer');

				
	}

	public function deletePlanning($id)
	{
		
		
		$this->program_model->deletePlanning($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kegiatan berhasil di hapus</div>');
		redirect('program');
	}

	public function approve($id)
	{

		$data = ['approvel' =>1];
		$this->db->where('id', $id);
		$this->db->update('planning', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kegiatan berhasil di approve</div>');
		redirect('program');
	}

	public function rekap_nilai()
	{
		
		$data['title'] = 'Rekap Nilai Action Plan';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();
		$data['user_unit'] = $this->db->get('unit_kerja')->result_array();
		$data['tahun'] = $this->program_model->getTahunPlanning();
		$data['bulan'] = $this->program_model->getBulanPlanning();

		foreach ($data['user_unit'] as $key) {
			$nilai = $this->program_model->nilai($key['id'],$_POST);
			
			$data1[]=array('id'=>$key['id'],
						'unit'=>$key['unit'],
						'kegiatan'=>$nilai['tPoin'],
						'tQ1'=>$nilai['tQ1'],
						'tQ2'=>$nilai['tQ2'],
						'tQ3'=>$nilai['tQ3'],
						'total'=>$nilai['total']);
			
		};
		

		
		$data['nilai'] = $data1;

		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('program/rekap_nilai', $data);
		$this->load->view('templates/footer');

	}

	public function editMandatori()

	{
		$this->program_model->editPlan();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kegiatan berhasil di edit</div>');
		redirect('program');
	}

	public function generatePdf()
    {
    	$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		

        $this->load->library('pdfgenerator');
        $data['title'] = "Rekap Nilai";
        $data['user_unit'] = $this->db->get('unit_kerja')->result_array();
        foreach ($data['user_unit'] as $key) {
			$nilai = $this->program_model->nilai($key['id']);
			
			$data1[]=array('id'=>$key['id'],
						'unit'=>$key['unit'],
						'kegiatan'=>$nilai['tPoin'],
						'tQ1'=>$nilai['tQ1'],
						'tQ2'=>$nilai['tQ2'],
						'tQ3'=>$nilai['tQ3'],
						'total'=>$nilai['total']);
			
		};

		$data['nilai'] = $data1;
		$data['bulan'] = $this->db->get_where('nama_bulan', ['id' => $bulan])->row_array();
		$data['tahun'] = $tahun;

        $file_pdf = "Rekap Nilai $bulan-$tahun";
        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('rekap_nilai', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_foto($id,$image)
    {
    	
        $this->load->helper('download');
        
        $filedata = $this->program_model->detail_kegiatan($id);
      	
        	$file = 'assets/img/kegiatan/'.$filedata[$image];
        	force_download($file, NULL);
        
        

  
    
    }
    public function data_rekap_nilai()
    {
    	$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$no=1;

		$unit = $this->db->get('unit_kerja')->result_array();

		
		foreach($unit as $key){
			$nilai = $this->program_model->nilai($key['id'],$_POST);
			if ($nilai == null) {
				$sendData[]=array('dataNilai'=>
										array('no'=>$no,
										'unit'=>$key['unit'],
										'poin'=>"-",
										'q1'=>"-",
										'q2'=>"-",
										'q3'=>"-",
										'total'=>"-",
								));
				$no++;
			}else{
				$sendData[]=array('dataNilai'=>
										array('no'=>$no,
										'unit'=>$key['unit'],
										'poin'=>$nilai['tPoin'],
										'q1'=>$nilai['tQ1'],
										'q2'=>$nilai['tQ2'],
										'q3'=>$nilai['tQ3'],
										'total'=>$nilai['total'],
								));
				$no++;
			}
			
		}
		
		echo(json_encode($sendData));


    }

    public function grafik()
    {
    	$id_unit= $this->input->post('id', true);
		$tahun= $this->input->post('tahun', true);

		// $id_unit = $_POST['id'];
		// $tahun = $_POST['tahun'];

		
		
		if (!$id_unit) {
			$id_unit = 1;
		}

		if (!$tahun) {
			$tahun = date('Y');
		}
		// print_r($id_unit);exit();

    	$data['title'] = 'Grafik Kegiatan';
		//Memanggil data User
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['tahun'] = $this->program_model->getTahunPlanning();
		$data['user_unit'] = $this->db->get('unit_kerja')->result_array();
		$data['unit'] = $this->db->get_where('unit_kerja', ['id' => $id_unit])->row_array();
		// print_r($data['unit']);exit();
		$data['tahun_grp'] = $tahun;
		// $data['data_grp']=$this->program_model->nilaiGrafik($id_unit, $tahun);
		$data['y1value'] = "[10, 20, 30, 40, 50, 60];";
		$data['valueChart']=$this->program_model->nilaiGrafik($id_unit, $tahun);
		// print_r($data['valueChart']);
		// exit();

		//end item

		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('program/grafik', $data);
		$this->load->view('templates/footer', $data);
    }

    public function editPlan($id)
    {
    	$data['title'] = 'Edit Planning';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();
		$data['planning'] = $this->db->get_where('planning', ['id' => $id])->row_array();

    	$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('program/edit_plan', $data);
		$this->load->view('templates/footer');
    }

    public function data_mandatori()
    {
    	$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$no=1;

		$mandatori= $this->program_model->mandatori($_POST);

		foreach($mandatori as $key){
			$unit = $this->db->get('unit_kerja')->result_array();
			$sendData[]=array('dataMandatori'=>
										array('no'=>$no,
										'id'		=>$key['id'],
										'kegiatan' => $key['kegiatan'],
										'deskripsi'=> $key['deskripsi'],					
										
								));
			$no++;
		}
		
		echo(json_encode($sendData));

    }

     public function jumlah_approve()
    {
    	$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$no=1;

		$unit = $this->db->get('unit_kerja')->result_array();

		foreach($unit as $key){
			$jumlahApprove = $this->program_model->jumlahApprove($key['id'],$_POST);
			if ($jumlahApprove) {
				$sendData[]=array('dataApprove'=>
										array('no'=>$no,
										'id'			=>$key['id'],
										'unit'			=>$key['unit'],
										'approved'		=>$jumlahApprove['approved'],
										'notApproved'	=>$jumlahApprove['notApproved'],
								));
			$no++;
			}else{
				$sendData[]=array('dataApprove'=>
										array('no'=>$no,
										'id'			=>$key['id'],
										'unit'			=>$key['unit'],
										'approved'		=>"-",
										'notApproved'	=>"- ",
								));
			$no++;
			}
			
		}
		
		echo(json_encode($sendData));

    }

}