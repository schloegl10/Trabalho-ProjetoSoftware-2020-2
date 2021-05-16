<?php namespace App\Models;

use CodeIgniter\Model;

class oportunidadeModel extends Model{
  protected $table = 'Oportunidades';
  protected $allowedFields = ['curso','remuneracao','horas','habilidades','atividades','descricao','idemp','minintegralizacao','maxintegralizacao'];
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