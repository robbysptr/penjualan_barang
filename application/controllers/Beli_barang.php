<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beli_barang extends CI_Controller
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
    if (2 == $header['user']['role']) {
      $header['admin'] = false;
      $header['pelanggan'] = true;
    } else {
      redirect();
    }
    $header['title'] = 'Beli Barang';
    $body['barang'] = $this->db->get_where('barang', ['status' => 1])->result_array();
    $this->load->view('header', $header);
    $this->load->view('beli_barang', $body);
    $this->load->view('footer');
  }

  public function beli_barang()
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (2 == $user['role']) {
    } else {
      redirect();
    }
    $id_barang = $this->input->post('id_barang');
    $barang = $this->db->get_where('barang', ['id' => $id_barang])->row_array();
    $kuantitas = $this->input->post('kuantitas');
    if ($kuantitas > $barang['stok']) {
      $this->session->set_flashdata('danger', 'Maaf, Anda membeli barang dengan jumlah ' . rupiah($kuantitas) . ', sedangkan stok yang tersedia cuma ' . rupiah($barang['stok']) . '!');
      redirect('beli_barang');
    }
    $total_harga = $barang['harga_satuan'] * $kuantitas;
    $this->db->insert('transaksi', ['id_barang' => $id_barang, 'id_jenis' => $barang['id_jenis'], 'id_user' => $id_user, 'kuantitas' => $kuantitas, 'total_harga' => $total_harga, 'tanggal' => time(), 'status' => 1]);
    $this->db->update('barang', ['stok' => $barang['stok'] - $kuantitas], ['id' => $id_barang]);
    $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
    redirect('beli_barang');
  }
}
