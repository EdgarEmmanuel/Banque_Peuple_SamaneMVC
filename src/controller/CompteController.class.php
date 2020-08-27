<?php
use libs\system\Controller;

use src\model\ClientsRepository;

use src\model\ClientSalarieRepository;

use src\model\ComptesRepository;

use src\model\AgencesRepository;

use src\model\ResponsableCompteRepository;

use src\model\CompteCourantRepository;

class CompteController extends Controller
{
    private $ClientM;
    private $ClientI;
    private $agence;
    private $compte;
    private $respo;
    private $courant;

    public function __construct(){
        parent::__construct();
        $this->Client = new ClientsRepository;
        $this->clients = new ClientSalarieRepository;
        $this->compte = new ComptesRepository;
        $this->agence = new AgencesRepository;
        $this->respo = new ResponsableCompteRepository;
        $this->courant = new CompteCourantRepository;
    }
   
    public function verifyMatricule(){

        extract($_POST);

        //first verify the length
        if(strlen($matricule)<3){

            return $this->view->redirect("Pages/getPageCni");
            

        }else{
            
            $mat = $matricule[0].$matricule[1].$matricule[2];
            
            //if the length is good we verify the result of the fisrt three character
            if($mat!="BPS" && $mat!="BCI" && $mat!="BCM"){
               

                        //when it is different we return to the CNI page
                        return $this->view->redirect("Pages/getPageCni");

                    }else{
                       switch($mat){
                           case "BPS": 

                           $data = $this->Client->verifyMatBPS($matricule);

                           if($data==null){
                               
                               return $this->view->redirect("Pages/getPageCni");

                           }else{
                              
                              
                                    //fetch the id 
                                    foreach($data as $d){
                                        $id = $d->getId();
                                    }

                            //get the information about the client with the query 
                            $donnees = $this->Client->getInfoClientById($id,"S");

                            foreach($donnees as $d){
                                //get the name of the client 
                                $Nom_complet = $d->getNom()." ".$d->getPrenom();
                            }

                          
                                    
                            session_start();

                                //set the name for the name of the client 
                            $_SESSION["nomClient"]=$Nom_complet;


                            //set the session for the id of the client
                            $_SESSION["idClient"]=$id;

                            //redirection 
                            return $this->view->redirect("Pages/getPageInsertCompte");
                           }


                                    
                           break;
                           case "BCI": 
                            $data = $this->Client->verifyMatBCI($matricule);

                            if($data==null){
                               
                                return $this->view->redirect("Pages/getPageCni");
 
                            }else{


                                  //fetch the id 
                                  foreach($data as $d){
                                    $id = $d->getId();
                                }

                                //get the information about the client with the query 
                                $donnees = $this->Client->getInfoClientById($id,"I");

                                foreach($donnees as $d){
                                    //get the name of the client 
                                    $Nom_complet = $d->getNom()." ".$d->getPrenom();
                                }
                                        
                                session_start();

                                   //set the name for the name of the client 
                                    $_SESSION["nomClient"]=$Nom_complet;


                                    //set the session for the id of the client
                                    $_SESSION["idClient"]=$id;

                                    //redirection 
                                    return $this->view->redirect("Pages/getPageInsertCompte");

                            }

                            break;

                           case "BCM":
                                $data = $this->Client->verifyMatBCM($matricule);

                                if($data==null){
                                    return $this->view->redirect("Pages/getPageCni");
                                }else{
                                   
                                        //fetch the id
                                        foreach($data as $d){
                                            $id = $d->getId();
                                        }

                                          //get the information about the client with the query 
                                        $donnees = $this->Client->getInfoClientById($id,"M");

                                        foreach($donnees as $da){
                                            $Nom_complet = $da->getNomEntreprise();
                                        }
                                                
                                        session_start();

                                            //set the name for the name of the client 
                                        $_SESSION["nomClient"]=$Nom_complet;


                                        //set the session for the id of the client
                                        $_SESSION["idClient"]=$id;

                                        //redirection 
                                        return $this->view->redirect("Pages/getPageInsertCompte");
                                }


                                
                           break;
                       }
                    }
        }
    }

   

    //======================== the function to insert all the account ======================


    private  function insertInCompte($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc){
        $compte = new Comptes();

        $compte->setIdAgence($this->agence->getOneAgenceById($idAg));

        $compte->setIdClient($this->Client->find($idClient));

        $compte->setIdRespoCompte($this->respo->getRespoById($idEmp));

        $compte->setDateOuverture($dateOuv);

        $compte->setCleRib($cleRib);

        $compte->setNumCompte($numAcc);

       return  $this->compte->insertCompte($compte);
    }

    public  function insertBloque($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde,$dateDebloc){
        $bloque = new CompteBloque();

        $bloque->setIdCompte($this->insertInCompte($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc));

        $bloque->setSolde($solde);

        $bloque->setDateDeblocage($dateDebloc);

        $this->_entity->persist($bloque);
        $this->_entity->flush();

        return $bloque->getId();
    }


    public function insertCourant($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,
    $solde,$raison,$nomEnter,$adresseEnt){
        $courant = new CompteCourant();

        $courant->setIdCompte($this->insertInCompte($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc));

        $courant->setAdresseEmployeur($adresseEnt);

        $courant->setNomEntreprise($nomEnter);

        $courant->setRaisonSocial($raison);

        $courant->setSolde($solde);

        $id = $this->courant->insertCourant($courant);

        return $id;
    }


    public function InsertEpargne($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,
    $solde){
        $Epargne = new CompteEpargne();

        $Epargne->setCompteId($this->insertInCompte($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc));

        $Epargne->setSolde($solde);

        $this->_entity->persist($Epargne);
        $this->_entity->flush();

        return $Epargne->getId();
    }


    

    public function insertCompte( ){

        // var_dump($_POST);
        // die;
        extract($_POST);

        $id=0;

        //fetch the data 
        $idAg=$idAgence;

        $idClient=(int)$idClient;

        $idEmp=$idEmp;

        $dateOuv = $dateOuvert;

        $cleRib = $cle_rib;

        $solde = $montant;


        switch($typeCompte){
            case "Bloque": 
                //set the numero of the account 
                $numAcc =  $this->compte->getNumCompte("B");

                //fetch the data specific for Locked Account
                $dateDebloc = $dateDebloc;

                //insert in the account bloque 
                $id=$this->insertBloque($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde,$dateDebloc);
            break;

            case "Epargne": 
                //set the numero of the account
                $numAcc = $this->compte->getNumCompte("E");

                //insert in the Epargne account
                $id=$this->InsertEpargne($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde);
            break;

            case "Courant": 
                //set the numero of the account 
                $numAcc = $this->compte->getNumCompte("C");

                //fetch the specific field for epargne account
                $raison=$raison;
                $nomEnter=$Name_entreprise;
                $adresseEnt=$adresse_Entreprise;
               
                //insert into the courant account 
                $id=$this->insertCourant($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde,$raison,$nomEnter,$adresseEnt);               
            break;
        }

        if($id!=0){
            return $this->view->redirect("Pages/getPageCni");
        }else{
            return $this->view->redirect("Pages/getPageCni");
        }

       // return $this->redirectToRoute("cniPage");
    }







































}
