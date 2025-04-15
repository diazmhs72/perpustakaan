<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Perpustakaan';
        $this->load->view('template/header');
        $this->load->view('buku/index', $data);
        $this->load->view('template/footer');
    }
}
