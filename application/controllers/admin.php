<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_logged_in();
	    
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		//Memanggil data User
		$user = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['user'] = $user;

		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	
	}


	public function role()
	{
		$data['title'] = 'Role';
		//Memanggil data User
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	
	}

	public function user_list()
	{
		$data['title'] = 'Daftar Unit Kerja Change Agent';
		//Memanggil data User
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['user_unit'] = $this->db->get('unit_kerja')->result_array();

		$data['AllUser'] = $this->member_model->getUser();

		
		
		$this->form_validation->set_rules('unit', 'Unit Kerja' ,'required');


			if ($this->form_validation->run() == false){

				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/user_list', $data);
				$this->load->view('templates/footer');
			}else{
				$this->db->insert('unit_kerja', ['unit' => $this->input->post('unit')]);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Unit kerja berhasil di tambahkan </div>');
						redirect('admin/user_list');
			}

	}



	public function registration()
	{
		
		$data['title'] = 'Daftar Unit Kerja Change Agent';
		//Memanggil data User
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['user_unit'] = $this->db->get_where('unit_kerja', ['unit'])->result_array();

		$data['AllUser'] = $this->db->get('user')->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('unit_agent', 'Unit Kerja', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'this email is already register!'
			]);
		


		if ($this->form_validation->run() == false) {
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/user_list', $data);
				$this->load->view('templates/footer');
		} else {

			$email = $this->input->post('email', true);

			$data = [
				'name'			=> htmlspecialchars($this->input->post('name', TRUE)),
				'email'			=> htmlspecialchars($email, TRUE),
				'id_unit'		=> htmlspecialchars($this->input->post('unit_agent', TRUE)),
				'image'			=> 'default.jpg',
				'password'		=> password_hash(123456, PASSWORD_DEFAULT),
				'role_id'		=> 2,
				'is_active'		=> 0,
				'date_created'	=> time()
			];

			//Membuat Token Random
			$token = base64_encode(random_bytes(20));
			$user_token = [
				'email'			=> $email,
				'token'			=> $token,
				'date_created'	=> time()

			];

			$this->db->insert('user', $data);
			

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your Account has been created, Please activate your Account</div>');
			redirect('admin/user_list');
		}
		
	}

	public function deleteUnit($id)
	{
		$this->member_model->deleteUnit($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit kerja was successfully deleted</div>');
			redirect('admin/user_list');
	}
	
	public function deleteUser($id)
	{
		$this->member_model->deleteUser($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change agent was successfully deleted</div>');
			redirect('admin/user_list');
	}

	public function EditAgent()
	{
		$this->member_model->EditAgent();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change agent was successfully Edited</div>');
			redirect('admin/user_list');
	}

	public function editUnit()
	{
		$this->member_model->editUnit($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Work Unit was successfully Edited</div>');
			redirect('admin/user_list');
	}

	public function resetPassword($id)
	{
		$this->member_model->resetPassword($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di perbarui</div>');
			redirect('admin/user_list');
	}
}