<?php
use libs\system\Controller;

class PagesController extends Controller
{
    private $enti;
    private $clients;

    public function __construct(){
       parent::__construct();
    }

    public function getMatricule($params){
        switch($params){
            case "I":
                $data= $this->enti
                ->createQuery("SELECT count(ci.id) as num from App\Entity\Clients ci where substring(ci.matricule,1,3)='BCI' ")
                ->getResult();

                foreach($data as $d){
                    $matricule = "BCI".((int)$d["num"]+1);
                }
            break;
            case "S" : 
                //query from the database 
                $data = $this->enti
                ->createQuery("SELECT count(cl.id) as num from App\Entity\Clients cl where substring(cl.matricule,1,3)='BPS'")
                ->getResult();

                //set the matricule 
                foreach($data as $d){
                    $matricule = "BPS".((int)$d["num"] + 1);
                }
            break;

            case "M" : 
                $data = $this->enti
                ->createQuery("SELECT count(cm.id) as num from App\Entity\Clients cm where substring(cm.matricule,1,3)='BCM' ")
                ->getResult();
        
                foreach($data as $d){
                    $matricule = "BCM".((int)$d["num"] +1);
                }
            break;

        }
        return $matricule;
    }
    
    public function getPageCni()
    {
        return $this->render('admin/cni.html.twig');
    }

    public function getPageIndependant(){
        $donnees["matricule_inde"] = $this->getMatricule("I");
        return $this->render("clients/cNSalarie.html.twig",$donnees);
    }

    public function getPageMoral(){
        $donnees["matriculeMoral"] = $this->getMatricule("M");
        return $this->render("clients/cMoral.html.twig",$donnees);
    }

    
    public function logout(){
        return $this->render("test/index.html.twig");
    }

    public function getPageInsertCS(){
            //put in the array to send 
            $donnees["matricules"] = $this->getMatricule("S");
          
        return $this->render("clients/cSalarie.html.twig",$donnees);
    }


    public function getPageInsertCompte(){
        //default min date 
        $data["min_date"] = \Date("Y-m-d");

        //default date deblocage 
        $data["date_debloc"] = \Date("Y-m-d",strtotime('+1 year'));

        return $this->render("comptes/addCompte.html.twig",$data);
    }





}