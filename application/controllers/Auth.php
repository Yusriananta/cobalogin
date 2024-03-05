 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->database();
        $this->load->library('session');		
	} 

	public function index()
	{
		if ($this->session->userdata('email') == true) {
			redirect(site_url('user'), 'refresh');
		}
            
	    
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//validation succes
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		// mengquery data dari data base
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user) {
			//user ada pada database dan aktif
			if($user['is_active'] == 1) {
				
				//cocokan password dengan data user
				if(password_verify($password, $user['password'])) {
					
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'id_unit' => $user['id_unit']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				}else {
				/*echo $password."<br>".$user['password'];exit();*/
					$this->session->set_flashdata('message', '<div class="alert" role="alert"> Wrong Password </div>');
						redirect('auth');
				}

			}else { //jika user tidak aktif
				$this->session->set_flashdata('message', '<div class="alert" role="alert"> This Email has not been Activated! </div>');
					redirect('auth');
			}

		} else {
			//jika user tidak ada 
			$this->session->set_flashdata('message', '<div class="alert" role="alert"> Email is NOT Registered! </div>');
			redirect('auth');
		}


	}

	public function registration()
	{
		
		

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'this email is already register!'
			]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'password dont match!',
				'min_length' => 'password too short!'

			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		


		if ($this->form_validation->run() == false) {
			$data['title'] = "Cobalogin User Registration";
			$this->load->view('templates/auth_header');
			$this->load->view('auth/registration', $data);
			$this->load->view('templates/auth_footer');
		} else {

			$email = $this->input->post('email', true);

			$data = [
				'name'			=> htmlspecialchars($this->input->post('name', true)),
				'email'			=> htmlspecialchars($email),
				'image'			=> 'default.jpg',
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
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
			$this->db->insert('user_token', $user_token);


			$this->_sendEmail($token, 'verify');


			$this->session->set_flashdata('message', '<div class="alert" role="alert">Congratulation your Account has been created, Please activate your Account</div>');
			redirect('auth');
		}
		
	}


	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'	=> 'smtp',
			'smtp_host'	=> 'ssl://smtp.googlemail.com',
			'smtp_user'	=> 'cobalogin1311@gmail.com',
			'smtp_pass'	=> 'alsd zaym xvip ykoq',
			'smtp_port'	=> 465,
			'mailtype'	=> 'html',
			'charset'	=> 'utf-8',
			'newline'	=> "\r\n"
		];



		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('cobalogin1311@gmail.com', 'Admin cobalogin');
		$this->email->to($this->input->post('email'));



		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account: <a href="'.base_url().'auth/verify?email='.$this->input->post('email').'&token='.urlencode($token).'">Activate</a>');
		}else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password: <a href="'.base_url().'auth/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>');
		}
	



		if($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}



	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$time = time();

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {

			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if ($time = $user_token['date_created']) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);


					$this->session->set_flashdata('message', '<div class="alert" role="alert">'. $email .' has been activated: Please LOGIN</div>');
					redirect('auth');
					}else {

						$this->db->delete('user', ['email' => $email]);
						$this->db->delete('user_token', ['email' => $email]);


						$this->session->set_flashdata('message', '<div class="alert" role="alert"> Account activation failed!: Token expired </div>');
						redirect('auth');
					}					
			}else {
				$this->session->set_flashdata('message', '<div class="alert" role="alert"> Account activation failed!: Token Infalid </div>');
				redirect('auth');
			}
		}else {
			$this->session->set_flashdata('massage', '<div class="alert" role="alert"> Account activation failed!: Wrong email </div>');
			redirect('auth');
		}
	}



	public function logout()
	{
		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert" role="alert"> You have been loged out! </div>');
			redirect('auth');
        unset($_SESSION['email']);

	}


	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgotpassword');
			$this->load->view('templates/auth_footer');
		}else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user',['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(20));
				$user_token = [
				'email'			=> $email,
				'token'			=> $token,
				'date_created'	=> time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert" role="alert">Please cek your email to reset password</div>');
				redirect('auth/forgotpassword');

			}else {
				$this->session->set_flashdata('message', '<div class="alert" role="alert">Email is not registered or Activated!</div>');
				redirect('auth/forgotpassword');
			}

		}

	
	}


	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {

			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {

				$this->session->set_userdata('reset_email', $email);
				$this->changepassword();

			}else {
				$this->session->set_flashdata('message', '<div class="alert" role="alert">Reset passsword failed! Token Infalid</div>');
				redirect('auth');
			}

		}else {
			$this->session->set_flashdata('message', '<div class="alert" role="alert">Reset passsword failed! Wrong email</div>');
				redirect('auth');
		}
	}



	public function changepassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}


		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		}else {
			$password = password_hash($this->input->post('Password1 '), PASSWORD_DEFAULT);

			$email = $this->session->userdata('reset_email');


			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
	

			$this->session->unset_userdata('reset_email');
			$this->db->delete('user_token', ['email' => $email]); 

			$this->session->set_flashdata('message', '<div class="alert" role="alert">Password has been changed! Please login</div>');
				redirect('auth');


		}
		
	}


}