<?php

class User extends app\controllers\Controller {
  private $className = 'user';
  private $classModel = 'User_model';
  private $layout = 'adminlte';

  public function index()
  {
    return $this->login();
  }

  public function login()
  {
    $data['class'] = $this->className;
    $data['title'] = 'List ' . $this->className;
    $this->view($this->className . '/login', $data);
  }

  public function register()
  {
    $data['class'] = $this->className;
    $data['title'] = 'List ' . $this->className;
    $this->view($this->className . '/register', $data);
  }

  public function proses_login()
  {
    if($this->model($this->classModel)->select_user($_POST) > 0){
      header('Location: ' . BASEURL . '/buku');
      exit;
    }else{
      header('Location: ' . BASEURL . '/'.$this->className.'/user/login');
      exit;
    }
  }

  public function proses_register()
  {
    if($this->model($this->classModel)->create_user($_POST) > 0){
      header('Location: ' . BASEURL . '/'.$this->className.'/user/login');
      exit;
    }
  }

  public function log_out()
  {
    session_destroy();
    header('Location: ' . BASEURL . '/'.$this->className);
    exit;
  }



}
