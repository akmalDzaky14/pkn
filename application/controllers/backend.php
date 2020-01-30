<?php
defined('BASEPATH') or exit('No direct script access allowed');
session_start();

class backend extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['userID'])) {
            if (isset($_SESSION['status']) == 'admin') {
                $this->load->view('/backend/index');
            } else {
                $this->load->view('/backend/404');
            }
        } else {
            $this->load->view('/backend/404');
        }
    }
    public function main()
    {
        if (isset($_SESSION['userID'])) {
            if (isset($_SESSION['status']) == 'admin') {
                $this->load->view('/backend/index');
            } else {
                $this->load->view('/backend/404');
            }
        } else {
            $this->load->view('/backend/404');
        }
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
        $this->load->view('/backend/upload-product');
    }
    public function uploadProductReq()
    {
        $this->load->database();
        $this->load->view('/backend/includes/upload-product.inc.php');
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
        $this->load->database();
        $this->load->view('/backend/tables');
    }
}
