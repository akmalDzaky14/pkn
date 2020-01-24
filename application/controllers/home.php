<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('model_home');
    }

    public function index()
    {
        $data['view_page'] = 'homepage';
        $this->load->view('site', $data);
    }
    public function about()
    {
        $this->load->view('about');
    }
    public function destination()
    {
        $this->load->view('travel_destination');
    }
    public function destination_details()
    {
        $this->load->view('destination_details');
    }
    public function elements()
    {
        $this->load->view('elements');
    }
    public function singleblog()
    {
        $this->load->view('single-blog');
    }
    public function contact()
    {
        $this->load->view('contact');
    }
    public function blog()
    {
        $this->load->view('blog');
    }
    public function upload()
    {
        $this->load->view('/Upload/form_upload');
    }
    public function koneksi()
    {
        $this->load->database();
        $this->load->view('/Upload/koneksi.php');
    }

    public function detail(){

        if ($this->input->post('simpan')) {


            $data = array(
                'Luas_tanah' => $this->input->post('Luas_tanah'),
                'Luas_bangunan' => $this->input->post('Luas_bangunan'),
                'Kamar_tidur' => $this->input->post('Kamar_tidur'),
                'Kamar_mandi' => $this->input->post('Kamar_mandi'),
                'Daya_listrik' => $this->input->post('Daya_listrik'),
                // 'foto' => $_FILES['foto']

                // 'date_created' => date('Y-m-d'),
            );
            $query = $this->model_home->insert($data);

            if ($query) {
                $message = array('status' => true, 'message' => 'Berhasil menambahkan Data');
            } else {
                $message = array('status' => false, 'message' => 'Gagal menambahkan Data');
            }

            $this->session->set_flashdata('message', $message);
            redirect('home/detail', 'refresh');
        }
        $this->load->database();
        $this->load->view('/Upload/detail.php');
       
    }
}
