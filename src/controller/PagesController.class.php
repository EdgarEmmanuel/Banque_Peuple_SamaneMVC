<?php
use libs\system\Controller;

use src\model\ClientsRepository;

class PagesController extends Controller
{
    private $enti;

    public function __construct(){
       parent::__construct();
       $this->enti = new ClientsRepository;
    }
    
    public function getPageCni()
    {
        session_start();
        $data["mat"]=$_SESSION["matricule"];
        $data["name"]=$_SESSION["nomEmp"];

        return $this->view->load('admin/cni',$data);
    }

    public function getPageIndependant(){
        $donnees["matricule_inde"] = $this->enti->getMatricule("I");
        return $this->view->load("clients/cNSalarie",$donnees);
    }

    public function getPageMoral(){
        $donnees["matriculeMoral"] = $this->enti->getMatricule("M");
        return $this->view->load("clients/cMoral",$donnees);
    }

    public function getPageInsertCS(){
            //put in the array to send 
            $donnees["matricules"] = $this->enti->getMatricule("S");
        return $this->view->load("clients/cSalarie",$donnees);
    }

    public function logout(){
        echo "test";
    }



    public function getPageInsertCompte(){
        session_start();
        //default min date 
        $data["min_date"] = \Date("Y-m-d");

        //default date deblocage 
        $data["date_debloc"] = \Date("Y-m-d",strtotime('+1 year'));

        $data["nomClient"] = $_SESSION["nomClient"];
        $data["idClient"] =  $_SESSION["idClient"];
        $data["nomAgence"]=$_SESSION["nameAgence"];
        $data["idEmploye"] = $_SESSION["idEmp"];
        $data["idAgence"] =  $_SESSION["idAgence"];

        return $this->view->load("comptes/addCompte",$data);
    }





}
