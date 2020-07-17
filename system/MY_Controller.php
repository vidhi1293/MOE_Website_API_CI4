<?php 

namespace CodeIgniter;
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/BeforeValidException.php';
require_once APPPATH . '/libraries/ExpiredException.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
use \Firebase\JWT\JWT;

class MY_Controller extends REST_Controller
{
    private $user_credential;
    
    /***** This method is to check, User is Authenticate and Authorization or not for every request *****/
    // public function auth()
    // {
    //     $this->load->model('Auth_model');
    //     //$headers = $this->input->get_request_header('Authorization');
    //     $headers = $_SERVER['Authorization'];
    //     $key = $this->config->item('thekey'); //secret key for encode and decode
    //     $token= "token";
    //    	if (!empty($headers)) {
    //     	if (preg_match('/Bearer\s(\S+)/', $headers , $matches)) {
    //         $token = $matches[1];
    //     	}
    //     } 
    //     try {           
    //        $decoded = JWT::decode($token, $key, array('HS256'));
    //        $where_query = array('EmailAddress' => $decoded->EmailAddress, 'UserId' => $decoded->UserId); //For where query condition
    //        $val = $this->Auth_model->get_user($where_query)->row(); //Model to get single data row from database base on username
    //        $invalidLogin = 'Invalid Login Credentails';
    //        if($this->Auth_model->get_user($where_query)->num_rows() == 0){$this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);}
    //        $this->user_data = $decoded;
    //        $this->load->library('session');
    //        $this->session->set_flashdata('CompanyId', $decoded->CompanyId);
    //     } catch (Exception $e) {
    //         $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
    //         $this->response($invalid, 401);//401
    //     }
    // }
}