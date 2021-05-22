<?php namespace App\Models;

use CodeIgniter\Model;

class estModel extends Model{
  protected $table = 'Estagiario';
  protected $allowedFields = ['nome','email','senha','curso','ano','curriculo','autenticado'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
    return $data;
  }

  protected function beforeUpdate(array $data){
    return $data;
  }


}