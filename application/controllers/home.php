<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
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
}
