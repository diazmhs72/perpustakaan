<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->Kategori_model->getAll();
        $this->load->view('template/header');
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $this->Kategori_model->insert(['nama_kategori' => $this->input->post('nama_kategori')]);
            redirect('kategori');
        }

        $this->load->view('template/header');
        $this->load->view('kategori/form');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->Kategori_model->getById($id);
        if ($this->input->post()) {
            $this->Kategori_model->update($id, ['nama_kategori' => $this->input->post('nama_kategori')]);
            redirect('kategori');
        }

        $this->load->view('template/header');
        $this->load->view('kategori/form', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }
}
