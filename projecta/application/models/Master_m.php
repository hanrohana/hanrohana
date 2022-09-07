<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('store_bk');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('store_bk');
    }

    public function master_add($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d H:i:s");
        $params =  [
            'kode' => $post['kodestore'],
            'store' => $post['namastore'],
            'active' => $post['active'],
            'created' => $today,
            'last_update' => $today
        ];
        $this->db->insert('store_bk', $params);
    }

    public function master_edit($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d H:i:s");
        $params =  [
            'kode' => $post['kodestore'],
            'store' => $post['namastore'],
            'active' => $post['active'],
            'last_update' => $today
        ];
        $this->db->where('id', $post['storeid']);
        $this->db->update('store_bk', $params);
    }

    function check_kodestore($code, $id = null)
    {
        $this->db->from('store_bk');
        $this->db->where('kode', $code);
        if ($id != null) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
