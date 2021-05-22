<?php namespace App\Models;

use CodeIgniter\Model;

class listSegueEmp extends Model {
  protected $table = 'seguidoresEmpresas';
  protected $allowedFields = ['idEst','idEmp'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data) {
    return $data;
  }

  protected function beforeUpdate(array $data) {
    return $data;
  }


}