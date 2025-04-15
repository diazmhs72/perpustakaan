<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Kategori_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $kategori = $this->input->get('kategori');
        $data['buku'] = $this->Buku_model->getAll($keyword, $kategori);
        $data['kategori'] = $this->Kategori_model->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->getAll();
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('cover')) {
                $cover = $this->upload->data('file_name');
            } else {
                $cover = null;
            }

            $data = [
                'judul' => $this->input->post('judul'),
                'sinopsis' => $this->input->post('sinopsis'),
                'pengarang' => $this->input->post('pengarang'),
                'cover' => $cover,
                'id_kategori' => $this->input->post('id_kategori')
            ];

            $this->Buku_model->insert($data);
            redirect('buku');
        }

        $this->load->view('template/header');
        $this->load->view('buku/form', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->Kategori_model->getAll();
        $data['buku'] = $this->Buku_model->getById($id);

        if ($this->input->post()) {
            $cover = $data['buku']->cover;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('cover')) {
                $cover = $this->upload->data('file_name');
            }

            $update = [
                'judul' => $this->input->post('judul'),
                'sinopsis' => $this->input->post('sinopsis'),
                'pengarang' => $this->input->post('pengarang'),
                'cover' => $cover,
                'id_kategori' => $this->input->post('id_kategori')
            ];

            $this->Buku_model->update($id, $update);
            redirect('buku');
        }

        $this->load->view('template/header');
        $this->load->view('buku/form', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['buku'] = $this->Buku_model->getById($id);
        $this->load->view('template/header');
        $this->load->view('buku/detail', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Buku_model->delete($id);
        redirect('buku');
    }
}
