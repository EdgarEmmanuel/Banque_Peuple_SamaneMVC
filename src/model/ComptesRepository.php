<?php
namespace src\model;

use Doctrine\ORM\EntityManager;
use libs\system\Model;


class ComptesRepository extends Model{
    public function __construct(){
        parent::__construct();
    }


    public function insertCompte($compte){
        $this->db->persist($compte);
        $this->db->flush();

        return $compte;
    }

    public function getNumCompte($choix){
        switch($choix){
            case "E": 
                $num = $this->db
                ->createQuery("SELECT count(c.id) as numero from Comptes c where substring(c.num_compte,1,2)='CE' ")
                ->getResult();

                foreach($num as $n){
                    $numero = "CE".((int)$n["numero"] +1);
                }
            break;
            case "B": 
                $num = $this->db
                ->createQuery("SELECT count(c.id) as numero from Comptes c where substring(c.num_compte,1,2)='CE' ")
                ->getResult();
                
                foreach($num as $n){
                    $numero = "CB".((int)$n["numero"] +1);
                }
            break;
            case "C": 
                $num = $this->db
                ->createQuery("SELECT count(c.id) as numero from Comptes c where substring(c.num_compte,1,2)='CC' ")
                ->getResult();
                foreach($num as $n){
                    $numero = "CC".((int)$n["numero"] +1);
                }
            break;
        }
        return $numero;
    }
}