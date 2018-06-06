<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class VerifyLogin extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_user','',TRUE);
    $this->load->library('session');
    $this->load->library('form_validation');
  }

  function index()
  {
//This method will have the credentials validation
/*   $this->load->library('form_validation');*/

/*   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

if($this->form_validation->run() == FALSE)
{
//Field validation failed.  User redirected to login page
if($this->session->userdata('logged_in')){
$this->load->view('home');
} else {
$this->load->view('login');
}
}
else
{
//Go to private area
redirect(site_url().'admin/home', 'refresh');
}*/

}
  function check_database(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
    if ($this->form_validation->run() == FALSE) {
      if(isset($this->session->userdata['logged_in'])){
        $this->load->view('homelogin');
      }else{
        $this->load->view('login');
      }
    } else {
      $data = array(
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
      );
      $result = $this->user_model->login($data);
      if ($result == TRUE) {
        $email = $this->input->post('email');
        $result = $this->user_model->read_user_information($email);
        if ($result != false) {
          $session_data = array(
            'idcustomer' => $result[0]->id_customer
          );
// Add user data in session
          $this->session->set_userdata('logged_in', $session_data);
          $this->load->view('homelogin', $session_data);
        }
      } else {
        $data = array(
          'error_message' => 'Invalid Username or Password'
        );
        $this->load->view('login', $data);
      }
    }
  }
  public function logout() {
// Removing session data
    $sess_array = array(
      'username' => ''
    );
    $this->session->unset_userdata('logged_in', $sess_array);
    $data['message_display'] = 'Successfully Logout';
    $this->load->view('home', $data);
}
}
?>