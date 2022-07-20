<?php

class User_model {

  private $tb_main;

  private $db;
  private $formData;

  public function __construct()
  {
    $this->db = new database;
    $this->tb_main = 'admin';
  }

  public function select_user()
  {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM $this->tb_main WHERE username = '$username' && password = '$password'";
    $result = $this->db->connect()->query($sql);
    $data = $result->fetch_assoc();

    return $_SESSION['id_user'] = $data['id'];
  }

  public function create_user()
  {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $sql = "INSERT INTO $this->tb_main VALUES(
      '',
      '$nama',
      '$username',
      '$password',
      '1'
    )";
    $result = $this->db->connect()->query($sql);
    return $result;
  }

}
