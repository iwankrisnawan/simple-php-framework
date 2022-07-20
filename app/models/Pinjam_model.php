<?php

class Pinjam_model extends app\models\default_model{

  protected $tb_main;
  protected $db;
  protected $formData;

  public function __construct()
  {
    $this->tb_main = 'pinjam';

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

  public function relation_data($raw_data){
    $result = $raw_data;
    foreach ($result as $number => $value) {
      $result[$number]['id_buku'] = $this->get_data_by_request($result[$number]['id_buku'], 'buku', 'id')['judul'];
      $result[$number]['id_member'] = $this->get_data_by_request($result[$number]['id_member'], 'member', 'id')['nama'];
    }
    return $result;
  }

  public function addData()
  {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = date('Y-m-d H:i:s');
    $tgl_kembali = $_POST['tgl_kembali'];

    $status = $this->get_data_by_request($id_member, 'member', 'id')['status'];
    if($status == 0){

      $this->update_relation_data($id_member, 'member', 'id', "status = '1'");

      $sql = "INSERT INTO $this->tb_main VALUES(
        '',
        '$id_member',
        '$id_buku',
        '$tgl_pinjam',
        '$tgl_kembali'
      )";
      $result = $this->db->connect()->query($sql);

      if($result){
        $raw_data = $this->getAllData($this->tb_main);
        $finish_data = $this->relation_data($raw_data);

        if($finish_data){
          return $finish_data;
        }
      }else{
        return false;
      }
    }
    else{
      return false;
    }
  }

  public function editData()
  {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $getId = $_POST['id'];
    $sql = "UPDATE $this->tb_main SET
      id_member = '$id_member',
      id_buku = '$id_buku',
      tgl_kembali = '$tgl_kembali' WHERE id = '$getId'";
    $result = $this->db->connect()->query($sql);

    if($result){
      $raw_data = $this->getAllData($this->tb_main);
      $finish_data = $this->relation_data($raw_data);

      if($finish_data){
        return $finish_data;
      }
    }else{
      return false;
    }
  }


  public function deleteData($id,$table)
  {
    $member = $this->get_data_by_request($id, 'pinjam', 'id')['id_member'];
    $this->update_relation_data($member, 'member', 'id', "status = '0'");

    $sql = "DELETE FROM $table WHERE id = '$id'";
    $result = $this->db->connect()->query($sql);

    if($result){
      $raw_data = $this->getAllData($this->tb_main);
      $finish_data = $this->relation_data($raw_data);

      if($finish_data){
        return $finish_data;
      }
    }else{
      return false;
    }
  }


}
