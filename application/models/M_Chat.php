<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Chat extends CI_Model
{

    // START DATATABLE QUERY
    public $table = 'chat';

    
    public function get_pending()
    {
        $this->db->from($this->table);
        $this->db->where('status_proses', 'pending');
        return $this->db->get();
    }

    public function get_sended()
    {
        $this->db->from($this->table);
        $this->db->where('status_proses', 'sended');
        return $this->db->get();
    }

    public function get_fail()
    {
        $this->db->from($this->table);
        $this->db->where('status_proses', 'fail');
        return $this->db->get();
    }
    
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_chat_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('chat_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function insert($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }

    public function get_to_send($limit)
    {
        $this->db->from($this->table);
        $this->db->where('status_proses', 'pending');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

}
