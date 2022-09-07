<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukarfaktur extends CI_Controller
{

    public function index()
    {
        $this->template->load('template', 'bk/TF_Rekap');
    }
}
