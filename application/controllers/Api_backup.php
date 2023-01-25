<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function jenis($id_jenis)
  {
    header("Content-Type: application/json");
    echo json_encode($this->db->get_where('jenis', ['id' => $id_jenis])->result());
  }

  public function barang($id_barang)
  {
    header("Content-Type: application/json");
    echo json_encode($this->db->get_where('barang', ['id' => $id_barang])->result());
  }

  public function user($id_user)
  {
    header("Content-Type: application/json");
    echo json_encode($this->db->get_where('user', ['id' => $id_user])->result());
  }
}
