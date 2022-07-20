<?php

class Member_model extends app\models\default_model{

  protected $tb_main;
  protected $db;
  protected $formData;

  public function __construct()
  {
    $this->tb_main = 'member';

    $this->db = new database;
  }

  public function search_data($search_data)
  {
    $sql ="SELECT * FROM $this->tb_main WHERE judul LIKE '%".$search_data."%' OR noisbn LIKE '%".$search_data."%' OR penulis LIKE '%".$search_data."%'";
    $result = $this->db->connect()->query($sql);
    $numRows = $result->num_rows;
    if($numRows > 0){
      while ($row = $result->fetch_assoc()){
        $data[] = $row;
      }
      return $data;
    }
  }

  public function addData()
  {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO $this->tb_main VALUES(
      '',
      '$nama',
      '$nis',
      '$alamat',
      '$no_hp',
      '0'
    )";
    $result = $this->db->connect()->query($sql);

    if($result){
      return $this->getAllData($this->tb_main);
    }else{
      return false;
    }
  }

  public function editData()
  {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $getId = $_POST['id'];

    $sql = "UPDATE $this->tb_main SET
      nama = '$nama',
      nis = '$nis',
      alamat = '$alamat',
      no_hp = '$no_hp' WHERE id = '$getId'";

    $result = $this->db->connect()->query($sql);

    if($result){
      return $this->getAllData($this->tb_main);
    }else{
      return false;
    }
  }

  public function deleteData($id,$table)
  {
    $sql = "DELETE FROM $table WHERE id = '$id'";
    $result = $this->db->connect()->query($sql);

    if($result){
      return $this->getAllData($this->tb_main);
    }else{
      return false;
    }
  }


}
