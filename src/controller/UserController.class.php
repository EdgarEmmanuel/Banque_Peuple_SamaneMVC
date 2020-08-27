<?php

use Doctrine\ORM\EntityManagerInterface;
use libs\system\Controller;

use src\model\ResponsableCompteRepository;

class UserController extends Controller
{
   private  $repository;

    public function __construct(){
       parent::__construct();
       $this->repository = new ResponsableCompteRepository();
    }

    
    public function handleUser()
    {  


        switch($_POST["type"]){
                case "responsable": 
                     //get the login
                         $login = $_POST["login"];

                         //get the password from the form 
                         $password = $_POST["password"];

                        

                         //fetch with a request from the database 
                         $data =  $this->repository->getOneByParams($login,$password);

                         //verify 
                         if($data==null){

                            return $this->view->load("welcome/index");

                         }else{

                            foreach($data as $d){
                                //fetch the ID
                                $idEmp=$d->getIdEmploye();

                                $idResp = $d->getId();

                                //fetch the matricule 
                                $matricule = $d->getMatricule();
                            }

                            // var_dump($idEmp);
                            // die;

                           
                            //fetch all the info about the Employee
                            $dataEmployee =  $this->repository->getAllInfoEmp($idEmp);
                            

                            //fetch all the name of the 
                            $NomComplet = $dataEmployee->getNom()."".$dataEmployee->getPrenom();


                            //fetch the id of the Agence 
                            $idAgence = $dataEmployee->getIdAgence();


                            //fetch all the Info by idAgence
                            $dataAgence =  $this->repository->getAgenceByEmploye($idAgence);


                            //get the name of the Agence 
                            $nameAgence = $dataAgence->getAgence();

    

                            //set all the session for the application 
                            session_start();

                            $_SESSION["matricule"] = $matricule;

                            $_SESSION["idEmp"] = $idEmp;

                            $_SESSION["idAgence"] = $idAgence;

                            $_SESSION["nomEmp"] =  $NomComplet;

                            $_SESSION["idRespo"] = $idResp;

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
