<?php

class Pinjam extends app\controllers\Controller {

  private $className = 'pinjam';
  private $classModel = 'Pinjam_model';
  private $layout = 'adminlte';
  private $data;

  public function __construct()
  {
    $this->data['title'] = 'List ' . $this->className;
  }

  public function index()
  {
    $data['data'] = $this->model($this->classModel)->getAllData($this->className);
    $data['model'] = new $this->classModel;
    $data['class'] = $this->className;
    $data['title'] = 'List ' . $this->className;
    $this->view($this->layout.'/header', $data);
    $this->view($this->className . '/index', $data);
    $this->view($this->layout.'/footer',$data);
  }

  public function search()
  {
    echo json_encode($this->model($this->classModel)->search_data($_POST['data_input']));
  }

  public function add()
  {
    $this->data['data'] = $this->model($this->classModel)->addData($_POST);
    if ($this->data['data'] > 0) {
      echo json_encode($this->data['data']);
    }
    else{
      return false;
    }
  }

  public function getdata()
  {
    $this->data['data'] = $this->model($this->classModel)->get_data_by_request($_POST['idAjax'], 'pinjam', 'id');
    if($this->data['data'] > 0){
      echo json_encode($this->data['data']);
    }else{
      return false;
    }
  }

  public function edit()
  {
    $this->data['data'] = $this->model($this->classModel)->editData($_POST);
    if($this->data['data'] > 0){
      echo json_encode($this->data['data']);
    }else{
      return false;
    }
  }

  public function delete()
  {
    $this->data['data'] = $this->model($this->classModel)->deleteData($_POST['id_ajax'], $_POST['table']);
    if($this->data['data'] > 0){
      echo json_encode($this->data['data']);
    }else{
      return false;
    }
  }

}
