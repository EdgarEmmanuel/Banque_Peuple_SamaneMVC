<?php
namespace src\model;

use libs\system\Model;



class ClientMoralRepository extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertMoral($Moral){
        $this->db->persist($Moral);
        $this->db->flush();

        return $Moral->getId();
    }
}















?>