<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Master_m', 'Finna_model']);
    }

    public function master_store()
    {
        $data['row'] = $this->Master_m->get();
        $this->template->load('template', 'master/master_store', $data);
    }

    public function master_add()
    {
        $masterstore = new stdClass();
        $masterstore->id = null;
        $masterstore->kode = null;
        $masterstore->store = null;
        $masterstore->active = null;
        $data = array(
            'page' => 'Add',
            'row' => $masterstore
        );
        $this->template->load('template', 'master/master_store_form_add', $data);
    }

    public function master_edit($id)
    {
        $query = $this->Master_m->get($id);
        if ($query->num_rows() > 0) {
            $master_store = $query->row();
            $data = array(
                'page' => 'Edit',
                'row' => $master_store
            );
            $this->template->load('template', 'master/master_store_form_add', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan!');";
            redirect('config/store');
        }
    }

    public function master_process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            if ($this->Master_m->check_kodestore($post['kodestore'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Kode $post[kodestore] sudah pernah di pakai kode lain!");
                redirect('config/store/add');
            } else {
                $this->Master_m->master_add($post);
            }
        } elseif (isset($_POST['Edit'])) {
            if ($this->Master_m->check_kodestore($post['kodestore'], $post['storeid'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Kode $post[kodestore] sudah pernah di pakai kode lain!");
                redirect('config/store/edit/' . $post['storeid']);
            } else {
                $this->Master_m->master_edit($post);
            }
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Simpan!!');
        }
        redirect('config/store');
    }

    public function del($id)
    {
        $this->Master_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('warning', 'Data Berhasil Di Hapus!!');
        }
        redirect('config/store');
    }

    public function master_faktur()
    {
        $data = array(
            'row' => $this->Finna_model->select_faktur(),
            'store' => $this->Master_m->get()
        );
        $this->template->load('template', 'master/master_faktur', $data);
    }
}
