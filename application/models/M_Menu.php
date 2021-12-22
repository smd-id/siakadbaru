<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Menu extends CI_Model
{

    // START DATATABLE QUERY
    private $table = 'menu';

    // Proses Modal
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query;
    }

    public function insert($data)
    {
        $payload = $this->db->insert($this->table, $data);
        return $payload;
    }

    public function update($where, $data)
    {
        $this->db->where('id', $where);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function getparent()
    {
        $this->db->order_by('menu_sequence', 'asc');
        $parent = $this->db->get_where($this->table, ['menu_parent_id' => null])->result_array();
        return $parent;
    }

    // Proses Untuk Position
    public function getMenu()
    {
        $parent = $this->db->order_by('menu_sequence', 'asc')
            ->get_where($this->table, ['menu_parent_id' => null]);
        $menu = $parent->result();
        $i = 0;

        foreach ($menu as $mn) {
            $menu[$i]->child = $this->getChildMenu($mn->id);
            $i++;
        }

        return $menu;
    }

    public function getChildMenu($menu_parent_id)
    {
        $child = $this->db->order_by('menu_sequence', 'asc')
            ->get_where($this->table, ['menu_parent_id' => $menu_parent_id]);
        $menu = $child->result();
        $i = 0;

        foreach ($menu as $mn) {
            $menu[$i]->child = $this->getChildMenu($mn->id);
            $i++;
        }

        return $menu;
    }

    public function updateMenu($where, $update_data)
    {
        $this->db->update($this->table, $update_data, $where);
    }

}
