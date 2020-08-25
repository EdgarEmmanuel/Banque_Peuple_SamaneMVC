<?php 

namespace src\model;

use libs\system\Model;

class EmployesRepository extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getEmployeById($id){
        if($this->db != null){
            $data = $this->db->getRepository("Employes")->find($id);
        }

        if($data!=null){
            return $data;
        }else{
            return null;
        }
    }
}











?>