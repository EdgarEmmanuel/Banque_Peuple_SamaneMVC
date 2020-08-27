<?php
namespace src\model;

use libs\system\Model;



class ClientSalarieRepository extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertSalarie($salarie){
        $this->db->persist($salarie);
        $this->db->flush();

        return $salarie->getId();
    }


    
}















?>