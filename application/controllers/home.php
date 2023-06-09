<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        $this->load->view('home_view');

    }

    public function tanim()
    {
        $this->load->view('tanim_view');

    }

    public function contact()
    {
        $this->load->view('contact_view');
    }

}