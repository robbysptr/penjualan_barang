<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('login')) {
      redirect('login');
    }
  }

  public function jenis()
  {
    $id_user = $this->session->userdata('id');
    $header['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $header['user']['role']) {
      $header['admin'] = true;
      $header['pelanggan'] = false;
    } else {
      redirect();
    }
    $header['title'] = 'Data Jenis';
    $body['jenis'] = $this->db->get_where('jenis', ['status' => 1])->result_array();
    $this->load->view('header', $header);
    $this->load->view('data/jenis', $body);
    $this->load->view('footer');
  }

  public function tambah_jenis()
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['role']) {
    } else {
      redirect();
    }
    $this->db->insert('jenis', ['nama_jenis' => $this->input->post('nama_jenis'), 'status' => 1]);
    $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
    redirect('data/jenis');
  }

  public function edit_jenis($id_jenis)
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['role']) {
    } else {
      redirect();
    }
    $this->db->update('jenis', ['nama_jenis' => $this->input->post('nama_jenis')], ['id' => $id_jenis]);
    $this->session->set_flashdata('success', 'Data Berhasil Diperbarui!');
    redirect('data/jenis');
  }

  public function hapus_jenis($id_jenis)
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['role']) {
    } else {
      redirect();
    }
    $this->db->update('jenis', ['status' => 0], ['id' => $id_jenis]);
    $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
    redirect('data/jenis');
  }

  public function barang()
  {
    $id_user = $this->session->userdata('id');
    $header['user'] = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $header['user']['role']) {
      $header['admin'] = true;
      $header['pelanggan'] = false;
    } else {
      redirect();
    }
    $header['title'] = 'Data Barang';
    $body['barang'] = $this->db->get_where('barang', ['status' => 1])->result_array();
    $body['jenis'] = $this->db->get_where('jenis', ['status' => 1])->result_array();
    $this->load->view('header', $header);
    $this->load->view('data/barang', $body);
    $this->load->view('footer');
  }

  public function tambah_barang()
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['role']) {
    } else {
      redirect();
    }
    $this->db->insert('barang', ['id_jenis' => $this->input->post('id_jenis'), 'id_user' => $id_user, 'nama_barang' => $this->input->post('nama_barang'), 'harga_satuan' => $this->input->post('harga_satuan'), 'keterangan' => $this->input->post('keterangan'), 'stok' => $this->input->post('stok'), 'status' => 1]);
    $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan!');
    redirect('data/barang');
  }

  public function edit_barang($id_barang)
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['role']) {
    } else {
      redirect();
    }
    $this->db->update('barang', ['id_jenis' => $this->input->post('id_jenis'), 'nama_barang' => $this->input->post('nama_barang'), 'harga_satuan' => $this->input->post('harga_satuan'), 'keterangan' => $this->input->post('keterangan'), 'stok' => $this->input->post('stok')], ['id' => $id_barang]);
    $this->session->set_flashdata('success', 'Data Berhasil Diperbarui!');
    redirect('data/barang');
  }

  public function hapus_barang($id_barang)
  {
    $id_user = $this->session->userdata('id');
    $user = $this->db->get_where('user', ['id' => $id_user])->row_array();
    if (1 == $user['role']) {
    } else {
      redirect();
    }
    $this->db->update('barang', ['status' => 0], ['id' => $id_barang]);
    $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
    redirect('data/barang');
  }
}
