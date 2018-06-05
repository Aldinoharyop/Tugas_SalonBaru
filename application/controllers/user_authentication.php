<?php  
session_start(); //we need to start session in order to access it through CI
Class User_Authentication extends CI_Controller {



	public function __construct() {
		parent::__construct();
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
				// Load session library
		/*$this->load->library('session');*/
		// Load database
		$this->load->model('Model_login');
	}
		// Show login page
		public function index() {
					
			$this->load->view('master/register');
	}

		// Show registration page
		public function user_registration_show() {
			$this->load->view('registration_form');
	}

		// Validate and store registration data in database
		public function new_user_registration() {
		// Check validation for user input in SignUp form
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nohp', 'Nomor Hp', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('master/register');
			} else {
				$data = array(
					'user_name' => $this->input->post('nama'),
					'user_name' => $this->input->post('email'),
					'user_email' => $this->input->post('nohp'),
					'user_email' => $this->input->post('alamat'),
					'user_password' => $this->input->post('password')
				);
				$result = $this->Model_login->registration_insert($data);
				if ($result == TRUE) {
					$data['message_display'] = 'Registration Successfully !';
					$this->load->view('admin/login', $data);
				} else {
					$data['message_display'] = 'Username already exist!';
					$this->load->view('master/register', $data);
				}
			}
	}
		// Check for user login process
		public function user_login_process() {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				if(isset($this->session->userdata['logged_in'])){
					$this->load->view('admin_page');
				}else{
					$this->load->view('login_form');
				}
			} else {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$result = $this->Model_login->login($data);
				if ($result == TRUE) {
					$username = $this->input->post('username');
					$result = $this->Model_login->read_user_information($username);
					if ($result != false) {
						$session_data = array(
							'username' => $result[0]->user_name,
							'email' => $result[0]->user_email,
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						$this->load->view('admin_page');
					}
				} else {
					$data = array(
						'error_message' => 'Invalid Username or Password'
					);
					$this->load->view('login_form', $data);
				}
			}
		}
		// Logout from admin page
		public function logout() {
		// Removing session data
			$sess_array = array(
				'username' => ''
			);
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully Logout';
			$this->load->view('login_form', $data);
		}
	}

	?>