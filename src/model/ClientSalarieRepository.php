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


    public function getInfoClientById($id,$string){
        switch($string){
            case "S": 
                $data = $this->db->getRepository("ClientSalarie")->findBy([
                    'idClient' => $id
                ]);
            break;
            case "M": 
                $data = $this->db->getRepository("ClientMoral")->findBy([
                    'idClient' => $id
                ]);
            break;
            case "I": 
                    $data = $this->db->getRepository("ClientIndependant")->findBy([
                        'idClient' => $id
                    ]);
            break;
        }
        

       return $data;
    }
}















?>