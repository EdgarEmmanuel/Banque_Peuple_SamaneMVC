<?php 
namespace src\model;

use Doctrine\ORM\EntityManager;
use libs\system\Model;


class ClientsRepository extends Model{ 

    public function __construct(){
        parent::__construct();
    }


    public function addClient($client){
        $this->db->persist($client);
        $this->db->flush();

        return $client;
    }


    public function find($id){
        return $this->db->getRepository("Clients")->find($id);
    }

    

    public function getMatricule($params){
        switch($params){
            case "I":
                $data= $this->db
                ->createQuery("SELECT count(ci.id) as num from Clients ci where substring(ci.matricule,1,3)='BCI' ")
                ->getResult();

                foreach($data as $d){
                    $matricule = "BCI".((int)$d["num"]+1);
                }
            break;
            case "S" : 
                //query from the database 
                $data = $this->db
                ->createQuery("SELECT count(cl.id) as num from Clients cl where substring(cl.matricule,1,3)='BPS'")
                ->getResult();

                //set the matricule 
                foreach($data as $d){
                    $matricule = "BPS".((int)$d["num"] + 1);
                }
            break;

            case "M" : 
                $data = $this->db
                ->createQuery("SELECT count(cm.id) as num from Clients cm where substring(cm.matricule,1,3)='BCM' ")
                ->getResult();
        
                foreach($data as $d){
                    $matricule = "BCM".((int)$d["num"] +1);
                }
            break;

        }

        return $matricule;

    }




    public function verifyMatBPS($matricule){
        $data = $this->db->getRepository("Clients")->findBy(array
        (
            "matricule" => $matricule
        )
    );
       
        if($data!=null){
            return $data;
        }else{
            return null;
        }
    }


    public function verifyMatBCI($matricule){
        $data = $this->db->getRepository("Clients")->findBy(array
        (
            "matricule" => $matricule
        )
    );
       
        if($data!=null){
            return $data;
        }else{ 
            return null;
        }
    }



    public function verifyMatBCM($matricule){
        $data = $this->db->getRepository("Clients")->findBy(array
        (
            "matricule" => $matricule
        )
    );
       
        if($data!=null){
            return $data;
        }else{
            return null;
        }
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