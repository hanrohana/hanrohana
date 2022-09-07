<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user_bk');
        $this->db->where('username', $post['username']);
        $this->db->where('password', SHA1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user_bk');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['username'] = $post['username'];
        $params['nama'] = $post['fullname'];
        $params['password'] = sha1($post['password']);
        $params['email'] = $post['email'] != "" ? $post['email'] : null;
        $params['telepon'] = $post['telepon'] != "" ? $post['telepon'] : null;
        $params['level'] = $post['level'];

        $this->db->insert('user_bk', $params);
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_bk');
    }

    public function edit($post)
    {
        $params['username'] = $post['username'];
        $params['nama'] = $post['fullname'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['email'] = $post['email'] != "" ? $post['email'] : null;
        $params['telepon'] = $post['telepon'] != "" ? $post['telepon'] : null;
        $params['level'] = $post['level'];
        $this->db->where('id', $post['user_id']);
        $this->db->update('user_bk', $params);
    }
}
