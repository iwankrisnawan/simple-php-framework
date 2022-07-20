<?php
class Buku_model extends app\models\default_model{

  protected $tb_main;
  protected $db;
  protected $formData;

  public function __construct()
  {
    $this->tb_main = 'buku';

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
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
    $sql = "INSERT INTO $this->tb_main VALUES(
      '',
      '$judul',
      '$jumlah'
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
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
    $getId = $_POST['id'];
    $sql = "UPDATE $this->tb_main SET judul = '$judul', jumlah = '$jumlah' WHERE id = '$getId'";
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
