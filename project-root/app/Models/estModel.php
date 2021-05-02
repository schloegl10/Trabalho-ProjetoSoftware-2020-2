<?php namespace App\Models;

use CodeIgniter\Model;

class estModel extends Model{
  protected $table = 'Estagiario';
  protected $allowedFields = ['nome','email','senha','curso','ano','curriculo'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  //'curso','ano','curriculo'
  protected function beforeInsert(array $data){
    return $data;
  }

  protected function beforeUpdate(array $data){
    return $data;
  }


}