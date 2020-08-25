<?php

use Doctrine\ORM\EntityManagerInterface;
use libs\system\Controller;

use src\model\ResponsableCompteRepository;

class UserController extends Controller
{
   

    public function __construct(){
       parent::__construct();
    }

    
    public function handleUser()
    {  


        switch($_POST["type"]){
                case "responsable": 
                     //get the login
                         $login = $_POST["login"];

                         //get the password from the form 
                         $password = $_POST["password"];

                         $repository = new ResponsableCompteRepository();

                         //fetch with a request from the database 
                         $data = $repository->getOneByParams($login,$password);

                         //verify 
                         if($data==null){

                            return $this->view->load("welcome/index");

                         }else{

                            foreach($data as $d){
                                //fetch the ID
                                $idEmp=$d->getId();

                                //fetch the matricule 
                                $matricule = $d->getMatricule();
                            }

                            //fetch all the info about the Employee
                            $dataEmployee = $repository->getAllInfoEmp($idEmp);


                            //fetch all the name of the 
                            $NomComplet = $dataEmployee->getNom()."".$dataEmployee->getPrenom();


                            //fetch the id of the Agence 
                            $idAgence = $dataEmployee->getIdAgence();


                            //fetch all the Info by idAgence
                            $dataAgence = $repository-> getAgenceByEmploye($idAgence);


                            //get the name of the Agence 
                            $nameAgence = $dataAgence->getAgence();

    

                            //set all the session for the application 
                            session_start();

                            $_SESSION["matricule"] = $matricule;

                            $_SESSION["idEmp"] = $idEmp;

                            $_SESSION["idAgence"] = $idAgence;

                            $_SESSION["nomEmp"] =  $NomComplet;

                            $_SESSION["nameAgence"] = $nameAgence;



                            return $this->view->redirect("Pages/getPageCni");
                            
                         }



                        

                break;
                case "administrateur": 
                    echo "responsable";
                         break;
            
                        case "caissiere": 
                             echo "caissiere";
                         break;
                
        }
        
    }

}
