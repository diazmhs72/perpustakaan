<?php
class Buku_model extends CI_Model
{
    public function getAll($keyword = null, $kategori = null, $limit = null, $start = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('pengarang', $keyword);
        }

        if ($kategori) {
            $this->db->where('kategori_id', $kategori);
        }

        if ($limit && $start !== null) {
            $this->db->limit($limit, $start);
        }

        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        return $this->db->get('buku')->result();
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

    public function countAll($keyword = null, $kategori = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('pengarang', $keyword);
        }

        if ($kategori) {
            $this->db->where('id_kategori', $kategori);
        }

        return $this->db->count_all_results('buku');
    }
}
