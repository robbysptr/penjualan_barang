<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
    $data['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $data['user']['role']) {
      $data['admin'] = true;
      $data['pelanggan'] = false;
      $data['transaksi'] = $this->db->get_where('transaksi', ['status <>' => 0])->result_array();
    } elseif (2 == $data['user']['role']) {
      $data['admin'] = false;
      $data['pelanggan'] = true;
      $data['transaksi'] = $this->db->get_where('transaksi', ['id_user' => $id_user, 'status <>' => 0])->result_array();
    } else {
      redirect();
    }
    $data['title'] = 'Transaksi';
    $this->load->view('header', $data);
    $this->load->view('transaksi', $data);
    $this->load->view('footer');
  }

  public function hapus_transaksi($id_transaksi)
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['user']['role']) {
    } elseif (2 == $user['user']['role']) {
      if (1 > $this->db->get_where('transaksi', ['id' => $id_transaksi, 'id_user' => $id_user])->num_rows()) {
        redirect('transaksi');
      }
    }
    $this->db->update('transaksi', ['status' => 0], ['id' => $id_transaksi]);
    $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
    redirect('transaksi');
  }
}
