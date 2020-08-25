<?php
namespace src\model;

use libs\system\Model;



class ResponsableCompteRepository extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getOneByParams($login,$mdp){
        $data=$this->db
            ->createQuery("SELECT cl from ResponsableCompte cl")
            ->getResult();

                if($data!=null){
                    return $data;
                }else{
                    return null;
                }
    }
}

?>