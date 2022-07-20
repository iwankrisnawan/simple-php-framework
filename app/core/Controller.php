<?php
namespace app\controllers;
// membuat namespace untuk controller

class Controller{
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require '../app/models/default_model.php';
    require '../app/models/' . $model . '.php';
    return new $model;
  }

}
