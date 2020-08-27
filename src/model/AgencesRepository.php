<?php
namespace src\model;

use libs\system\Model; 


class AgencesRepository extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAgenceById($id){
        if($this->db != null){
            $data = $this->db->getRepository("Agences")->find($id);
        }

        if($data!=null){
            return $data;
        }else{
            return null;
        }
    }

    public function getOneAgenceById($id){
        if($this->db != null){
            $data = $this->db->getRepository("Agences")->find($id);
        }

        // foreach($data as $d){
        //     $id = $d->getId();
        // }

        return $data;

    }
}













?>