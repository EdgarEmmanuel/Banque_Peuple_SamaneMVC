<?php
namespace src\model;

use libs\system\Model;

class ResponsableCompteRepository extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getOneByParams($login,$mdp){
        if($this->db != null)
		{
			$data=$this->db->getRepository('ResponsableCompte')->findBy(array(
                'login' => $login,
                'password' => $mdp
            ));
		}

                if($data!=null){
                    return $data;
                }else{
                    return null;
                }
    }
}

?>