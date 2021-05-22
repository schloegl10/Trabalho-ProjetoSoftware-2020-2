<?php namespace App\Models;

use CodeIgniter\Model;

class empModel extends Model{
  protected $table = 'Curso';
  protected $allowedFields = ['nome','integralizacao'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
    return $data;
  }

  protected function beforeUpdate(array $data){
    return $data;
  }


}