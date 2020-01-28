<?php
defined('BASEPATH') or exit('No direct script access allowed');

class backend extends CI_Controller
{
    public function index()
    {
        $this->load->view('/backend/404');
    }
    public function main()
    {
        $this->load->view('/backend/index');
    }
    public function notFound()
    {
        $this->load->view('/backend/404');
    }
    public function test()
    {
        $this->load->view('/backend/test');
    }
    public function blank()
    {
        $this->load->view('/backend/blank');
    }
    public function charts()
    {
        $this->load->database();
        $this->load->view('/backend/charts');
    }
    public function forgot()
    {
        $this->load->view('/backend/forgot-password');
    }
    public function resetPasswordReq()
    {
        $this->load->database();
        $this->load->view('/backend/includes/reset-request.inc.php');
    }
    public function resetPassword()
    {
        $this->load->database();
        $this->load->view('/backend/reset-password');
    }
    public function resetPasswordValidate()
    {
        $this->load->database();
        $this->load->view('/backend/includes/reset-password.inc.php');
    }
    public function login()
    {
        $this->load->view('/backend/login');
    }
    public function register()
    {
        $this->load->view('/backend/Session/User/register');
    }
    public function adminReg()
    {
        $this->load->view('/backend/Session/Admin/registerAdmin');
    }
    public function agentReg()
    {
        $this->load->view('/backend/Session/Agent/registerAgen');
    }

    public function upload()
    {
        $this->load->view('/backend/includes/dbHandler');
    }
    public function uploadProduct()
    {
        $this->load->view('/backend/upload-product', array('error' => ' '));

    }
    public function uploadProductReq()
    {
        $this->load->database();
        $this->load->view('/backend/includes/upload-product.inc.php');
        function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
        }
            $config['upload_path']          = 'C:\xampp\htdocs\CodeIgniter\gambar';
            $config['allowed_types']        = 'gif|jpg|png'; // file yang di perbolehkan 
            $config['max_size']             = 1000; // maksimal ukuran
            $config['max_width']            = 2000; //lebar maksimal
            $config['max_height']           = 1000;  //tinggi maksimal
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('berkas')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload-product', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('C:\xampp\htdocs\CodeIgniter\application\views\v_upload_sukses.php', $data);
            }
    }
    public function signup()
    {
        $this->load->database();
        $this->load->view('/backend/includes/signup.inc.php');
    }
    public function agentsignup()
    {
        $this->load->database();
        $this->load->view('/backend/Session/Agent/signup.inc.php');
    }
    public function adminsignup()
    {
        $this->load->database();
        $this->load->view('/backend/Session/Admin/signup.inc.php');
    }
    public function signin()
    {
        $this->load->database();
        $this->load->view('/backend/includes/login.inc.php');
    }
    public function logout()
    {
        $this->load->database();
        $this->load->view('/backend/includes/logout.inc.php');
    }
    public function userLogin()
    {
        $this->load->database();
        $this->load->view('/backend/includes/login.inc.php');
    }
    public function tables()
    {
        $this->load->view('/backend/tables');
    }
   
   
}
