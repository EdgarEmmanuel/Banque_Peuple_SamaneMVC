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

        // var_dump($_POST);
        // die();

        switch($_POST["type"]){
                case "responsable": 
                     //get the login
                         $login = $_POST["login"];

                         $password = $_POST["password"];

                         $repository = new ResponsableCompteRepository();

                         $data = $repository->getOneByParams($login,$password);

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

                            var_dump($nameAgence);

    
                            die;
                            
                         }



                        

                break;
        }
        //     case "responsable": 
        //                 //get the login
        //                 $login = $req->request->get("login");

        //                 //get the password
        //                 $password = $req->request->get("password");

        //                 $data = $this->ResponsableCompteRepository->findOneBy([
        //                     'login' => $login,
        //                     'password' => $password
        //                 ]);

        //                 $emp = new ResponsableCompte();

        //                 if($data==null){
        //                     return $this->redirectToRoute('index');
        //                 }else{
        //                         //get the  matricule
        //                         $matricule = $this->ResponsableCompteRepository->findOneBy([
        //                             'login' => $login,
        //                             'password' => $password
        //                         ])->getMatricule();

        //                         //get the id of the employe 
        //                         $id_employe = $this->ResponsableCompteRepository->findOneBy([
        //                             'login' => $login,
        //                             'password' => $password
        //                         ])->getIdEmploye();
                                
        //                         //set the complete name of the employe by  his ID
        //                         $nomComplet =$this->employes->findOneBy([
        //                             'id' => $id_employe
        //                         ])->getNom() ." ".$this->employes->findOneBy([
        //                             'id' => $id_employe
        //                         ])->getPrenom();


        //                         $id_agences =$this->agenceEntity->findOneBy([
        //                             'id' =>  $this->employes->findOneBy([
        //                                 'id' => $id_employe
        //                             ])->getIdAgence()
        //                         ])->getId();

        //                         $nom_agence = $this->agenceEntity->findOneBy([
        //                             'id' =>  $this->employes->findOneBy([
        //                                 'id' => $id_employe
        //                             ])->getIdAgence()
        //                         ])->getAgence();

        //                         $session = new Session(); 
        //                         $session->start();

        //                         //set the session for the respo 
        //                         $session->set("idEmploye",$id_employe);

        //                         //set the session for the name of the agence
        //                         $session->set("nomAgence",$nom_agence);
                                
        //                         //set the session for the id of the agence 
        //                         $session->set("idAgence",$id_agences);

        //                         //session for the matricule 
        //                         $session->set("matricule",$matricule);

        //                         //session for the name of the employee
        //                         $session->set("nomComplet",$nomComplet);

        //                         return $this->redirectToRoute("cniPage");
        //                 }
        //     break;

        //     case "administrateur": 
        //         echo "responsable";
        //     break;

        //     case "caissiere": 
        //         echo "caissiere";
        //     break;
        // }
        
    }

}
