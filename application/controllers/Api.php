<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function jenis()
  {
    header("Content-Type: application/json");
    echo json_encode($this->db->get_where('jenis', ['id' => $this->input->get('id')])->result());
  }

  public function barang()
  {
    header("Content-Type: application/json");
    echo json_encode($this->db->get_where('barang', ['id' => $this->input->get('id')])->result());
  }

  public function user()
  {
    header("Content-Type: application/json");
    echo json_encode($this->db->get_where('user', ['id' => $this->input->get('id')])->result());
  }
}