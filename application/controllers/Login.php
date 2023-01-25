<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('login')) {
      redirect();
    }
    $this->load->view('login');
  }

  public function login()
  {
    if (empty($this->input->post('email'))) {
      $this->session->set_flashdata('message', 'Email tidak boleh kosong!');
      redirect('login');
    }
    if (empty($this->input->post('password'))) {
      $this->session->set_flashdata('message', 'Password tidak boleh kosong!');
      redirect('login');
    }
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $sql = $this->db->query("SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'");
    if ($sql->num_rows() > 0) {
      $get = $sql->row_array();
      $session = array(
        'login' => TRUE,
        'id' => $get['id']
      );
      $this->session->set_userdata($session);
      redirect();
    } else {
      $this->session->set_flashdata('message', 'Email atau Password Salah!');
      redirect('login');
    }
  }
}
