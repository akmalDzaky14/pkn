<?php
defined('BASEPATH') or exit('No direct script access allowed');

class backend extends CI_Controller
{
    public function index()
    {
        $this->load->database();
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
        $this->load->view('/backend/includes/reset-request.inc.php');
    }
    public function resetPassword()
    {
        $this->load->view('/backend/reset-password');
    }
    public function login()
    {
        $this->load->view('/backend/login');
    }
    public function register()
    {
        $this->load->view('/backend/register');
    }
    public function upload()
    {
        $this->load->view('/backend/includes/dbHandler');
    }
    public function signup()
    {
        $this->load->database();
        $this->load->view('/backend/includes/signup.inc.php');
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
