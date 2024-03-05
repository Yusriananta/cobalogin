<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_logged_in();

	}

	public function index()
	{
		$data['title'] = 'My Profile';
		//Memanggil data User
		$user = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();
		$data['user'] = $user;

		$id_unit = $user['id_unit'];

		$data['unit'] = $this->db->get_where('unit_kerja', ['id' => $id_unit])->row_array(); 


		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');

	
	}


	public function editProfile()
	{
		$data['title'] = 'Edit Profile';
		//Memanggil data User
		$user = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();
		$data['user'] = $user;

		$id_unit = $user['id_unit'];
		

		$data['user_unit'] = $this->db->get('unit_kerja')->result_array();

		$this->form_validation->set_rules('name', 'Full Name' ,'required|trim');
		$this->form_validation->set_rules('unit', 'Work Unit' ,'required|trim');



		if ($this->form_validation->run() == false) {

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/editProfile', $data);
			$this->load->view('templates/footer');
		}else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$unit = $this->input->post('unit');

			// Cek jika ada gambar untuk di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['upload_path']          = './assets/img/profile/';
                 $this->load->library('upload', $config);

                 if ($this->upload->do_upload('image')) {
                 	$old_image = $data['user']['image'];
                 	if ($old_image !='default.jpg') {
                 		unlink(FCPATH.'assets/img/profile/'.$old_image);
                 	}


                 	$new_image = $this->upload->data('file_name');
                 	$this->db->set('image', $new_image);
                 }else {
                 	echo $this->upload->display_errors();
                 }
			}


			$this->db->set('name', $name);
			$this->db->set('id_unit', $unit);
			$this->db->where('email', $email);
			$this->db->update('user');


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile has Been Updated!</div>');
			redirect('user');
		}
		
	}

	public function changepassword()
	{
		$data['title'] = 'Change Password';
		//Memanggil data User
		$data['user'] = $this->db->get_where(
			'user', ['email' =>$this->session->userdata('email')]
			)->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');



		if ($this->form_validation->run() == false) {

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		}else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			// Password salah
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current password!</div>');
				redirect('user/changepassword');
			}else {
				//password sama dengan password lama
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as Current password!</div>');
					redirect('user/changepassword');
				}else{
					//password sudah oke
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('Password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password is changed</div>');
					redirect('user/changepassword');

				}
			}
		}
		
	}

	public function planning()
	{
		$data['title'] = 'Input Action Plan';
		//Memanggil data User
		$user = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['user'] = $user;
		$id_unit = $user['id_unit'];

		$bulan = date('m');
		$tahun = date('Y');
		
		$data['mandatori'] = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND mandatori = 1 ORDER BY tanggal ASC")->result_array();
		$data['planning'] = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND approvel = 0 AND mandatori = 0 AND id_unit = $id_unit ORDER BY tanggal ASC")->result_array();
		$data['approved'] = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND approvel = 1 AND mandatori = 0 AND id_unit = $id_unit ORDER BY tanggal ASC")->result_array();
		
		

		$this->form_validation->set_rules('kegiatan', 'Nama Kegiatan' ,'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi' ,'required');
		
		if ($this->form_validation->run() == false){
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/planning', $data);
			$this->load->view('templates/footer');
		}else{
			
			
			
			$data = [
					'Id_unit'	=> $id_unit,
					'kegiatan'	=> $this->input->post('kegiatan'),
					'deskripsi'	=> $this->input->post('deskripsi'),
					'approvel'	=> 0,
					'mandatori'	=> 0,
					'tanggal'	=> date('Y-m-d'),
					'end'		=> date('Y-m-t')
			];

			$this->db->insert('planning', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kegiatan baru berhasil di input</div>');
			redirect('user/planning');
		}
		

	
	}

	public function deletePlanning($id)
	{

		$this->program_model->deletePlanning($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Action Plan was successfully deleted</div>');
			redirect('user/planning');
	}

	public function editPlan()

	{
		$this->program_model->editPlan();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Action Plan berhasil di edit</div>');
		redirect('user/planning');
	}

}