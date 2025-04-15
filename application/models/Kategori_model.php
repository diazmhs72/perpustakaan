<?php
class Kategori_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('kategori')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row();
    }

    public function insert($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_kategori', $id)->update('kategori', $data);
    }

    public function delete($id)
    {
        $this->db->delete('kategori', ['id_kategori' => $id]);
    }
}
