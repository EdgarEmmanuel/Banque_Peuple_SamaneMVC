<?php
namespace src\model;

use libs\system\Model;

class ResponsableCompteRepository extends Model{

    private $agenceRepo;
    private $employesRepo;

    public function __construct(){
        parent::__construct();
        $this->agenceRepo = new AgencesRepository();
        $this->employesRepo = new EmployesRepository();
    }


    public function getAgenceByEmploye($id){
        if($this->db != null)
		{
			$data = $this->agenceRepo->getAgenceById($id);
        }
        
        return $data;
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


    public function getAllInfoEmp($id){
        if($this->db != null){
            $data = $this->employesRepo-> getEmployeById($id);
        }

        return $data;
    }
}

?>