<?php
namespace app\models;
// membuat namespace untuk default_model

// interface
interface main_method{
  public function getAllData($tabel);
  public function get_data_by_request($id, $table_require, $column);
  public function update_relation_data($req, $table_require, $column, $data);
  public function prosedur_function();
}


class default_model implements main_method{

  // function untuk menampilkan data
  public function getAllData($tabel)
  {
    $sql = "SELECT * FROM $tabel";
    $result = $this->db->connect()->query($sql);
    $numRows = $result->num_rows;
    if($numRows > 0){
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }

  // function untuk mengambil data berdasarkan yang di minta
  public function get_data_by_request($req, $table, $column){
    $sql = "SELECT * FROM $table WHERE $column = '$req'";
    $result = $this->db->connect()->query($sql);
    $data = $result->fetch_assoc();
    return $data;
  }

  // function untuk update relasi data
  public function update_relation_data($req, $table, $column, $data){
    $sql = "UPDATE $table SET ".$data." WHERE $column = '$req'";
    $result = $this->db->connect()->query($sql);
    return $data;
  }


  public function prosedur_function(){
    echo "it all starts here";
  }

}
 ?>
