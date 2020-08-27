<?php 
namespace src\model;

use libs\system\Model; 

class CompteCourantRepository extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertCourant($courant){
        $this->db->persist($courant);
        $this->db->flush();

        return $courant->getId();
    }
}