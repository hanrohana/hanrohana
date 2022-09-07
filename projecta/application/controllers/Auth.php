<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }

    public function process()
    {
        $post = $this->input->post(null);
        if (isset($post['login'])) {
            $this->load->model('User_m');
            $query = $this->User_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->id,
                    'nama' => $row->nama,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                    alert('Selamat, Login Berhasil!');
                    window.location ='" . site_url('dashboard') . "';
                </script>";
            } else {
                echo "<script>
                    alert('Maaf, Gagal Login!');
                    window.location ='" . site_url('auth/login') . "';
                </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('userid', 'nama', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
