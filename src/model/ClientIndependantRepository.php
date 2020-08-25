<?php 
namespace src\model;

use libs\system\Model;


class ClientIndependantRepository extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function insertIndependant($independant){
        $this->db->persist($independant);
        $this->db->flush();

        return $independant->getId();
    }
}










?>