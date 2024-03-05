<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		cek_logged_in();
	}


	public function index()
	{
		$data['title'] = 'Menu Management';
		//Memanggil data User
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu' ,'required');

		if ($this->form_validation->run() == false){

		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');		
		}else{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Menu Added </div>');
						redirect('menu');
		}

		
	}


	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		//Memanggil data User
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['SubMenu'] = $this->menu_model->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->form_validation->set_rules('title', 'Title' ,'required');
		$this->form_validation->set_rules('menu_id', 'Menu' ,'required');
		$this->form_validation->set_rules('url', 'Url' ,'required');
		$this->form_validation->set_rules('icon', 'Icon' ,'required');


		if ($this->form_validation->run() == false){

			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		}else {
			$is_active = $this->input->post('is_active');
			if (!$is_active) {
				$is_active = 0;
			}
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $is_active
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added </div>');
						redirect('menu/submenu');

		}
		

	}

	public function editMenu()
	{
		$this->menu_model->editMenu();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu was successfully Edited</div>');
			redirect('menu');
	}

	public function deleteMenu($id)
	{
		$this->menu_model->deleteMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu was successfully deleted</div>');
			redirect('menu');
	}

	public function editSubMenu()
	{
		$this->menu_model->editSubMenu();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu was successfully Edited</div>');
			redirect('menu/submenu');
	}

	public function deleteSubMenu($id)
	{
		$this->menu_model->deleteSubMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu was successfully deleted</div>');
			redirect('menu/submenu');
	}

}