<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  public function index()
  {
    if ($this->session->userdata('login')) {
      $id_user = $this->session->userdata('id');
      $header['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
      if (1 == $header['user']['role']) {
        $header['admin'] = true;
        $header['pelanggan'] = false;
        $body['jumlah_transaksi'] = $this->db->get_where('transaksi', ['status <>' => 0])->num_rows();
        $body['jumlah_today'] = $this->db->get_where('transaksi', ['status <>' => 0, 'tanggal >=' => strtotime('today'), 'tanggal <' => strtotime('tomorrow')])->num_rows();
      } else {
        $header['admin'] = false;
        $header['pelanggan'] = true;
        $body['jumlah_transaksi'] = $this->db->get_where('transaksi', ['id_user' => $id_user, 'status <>' => 0])->num_rows();
        $body['jumlah_today'] = $this->db->get_where('transaksi', ['id_user' => $id_user, 'status <>' => 0, 'tanggal >=' => strtotime('today'), 'tanggal <' => strtotime('tomorrow')])->num_rows();
      }
    } else {
      redirect('login');
    }
    $header['title'] = 'Dasbor';
    $body['jumlah_jenis'] = $this->db->get_where('jenis', ['status' => 1])->num_rows();
    $body['jumlah_barang'] = $this->db->get_where('barang', ['status' => 1])->num_rows();

    $this->load->view('header', $header);
    $this->load->view('index', $body);
    $this->load->view('footer');
  }
}
