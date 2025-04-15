<?php
class Buku_model extends CI_Model
{
    public function getAll($keyword = null, $id_kategori = null)
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');

        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('pengarang', $keyword);
        }

        if ($id_kategori) {
            $this->db->where('buku.id_kategori', $id_kategori);
        }

        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->where('id_buku', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert('buku', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_buku', $id)->update('buku', $data);
    }

    public function delete($id)
    {
        $this->db->delete('buku', ['id_buku' => $id]);
    }
}
