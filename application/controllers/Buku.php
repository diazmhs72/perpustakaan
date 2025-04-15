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
        $this->load->library('pagination');

        $keyword = $this->input->get('keyword');
        $kategori = $this->input->get('kategori');

        $total_rows = $this->Buku_model->countAll($keyword, $kategori);

        $config['base_url'] = site_url('buku/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        $start = $this->input->get('page') ?? 0;
        $data['buku'] = $this->Buku_model->getAll($keyword, $kategori, $config['per_page'], $start);
        $data['kategori'] = $this->Kategori_model->getAll();
        $data['pagination'] = $this->pagination->create_links();

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
