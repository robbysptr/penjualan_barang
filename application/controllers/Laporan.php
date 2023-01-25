<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('login')) {
      redirect('login');
    }
  }

  public function index()
  {
    $id_user = $this->session->userdata('id');
    $header['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $header['user']['role']) {
      $header['admin'] = true;
      $header['pelanggan'] = false;
    } else {
      redirect();
    }
    $header['title'] = 'Laporan';
    $body['jenis'] = $this->db->get_where('jenis', ['status' => 1])->result_array();
    $this->load->view('header', $header);
    $this->load->view('laporan', $body);
    $this->load->view('footer');
  }
}
