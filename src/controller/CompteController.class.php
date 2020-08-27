<?php
use libs\system\Controller;

use src\model\ClientsRepository;

use src\model\ClientSalarieRepository;

class CompteController extends Controller
{
    private $ClientM;
    private $ClientI;
    private $agence;
    private $clients;
    private $respo;

    public function __construct(){
        parent::__construct();
        $this->Client = new ClientsRepository;
        $this->clients = new ClientSalarieRepository;
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

        $compte->setIdAgence($this->agence->find($idAg));

        
        $compte->setIdClient($this->clients->find($idClient));


        $compte->setIdRespoCompte($this->respo->find($idEmp));

        $compte->setDateOuverture($dateOuv);

        $compte->setCleRib($cleRib);

        $compte->setNumCompte($numAcc);

        $this->_entity->persist($compte);

        $this->_entity->flush();

        return $compte;
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

        $this->_entity->persist($courant);
        $this->_entity->flush();

        return $courant->getId();
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


    private function getNumCompte($choix){
        switch($choix){
            case "E": 
                $num = $this->_entity
                ->createQuery("SELECT count(c.id) as numero from App\Entity\Comptes c where substring(c.num_compte,1,2)='CE' ")
                ->getResult();

                foreach($num as $n){
                    $numero = "CE".((int)$n["numero"] +1);
                }
            break;
            case "B": 
                $num = $this->_entity
                ->createQuery("SELECT count(c.id) as numero from App\Entity\Comptes c where substring(c.num_compte,1,2)='CE' ")
                ->getResult();
                
                foreach($num as $n){
                    $numero = "CB".((int)$n["numero"] +1);
                }
            break;
            case "C": 
                $num = $this->_entity
                ->createQuery("SELECT count(c.id) as numero from App\Entity\Comptes c where substring(c.num_compte,1,2)='CC' ")
                ->getResult();
                foreach($num as $n){
                    $numero = "CC".((int)$n["numero"] +1);
                }
            break;
        }
        return $numero;
    }

    public function insertCompte( ){

        var_dump($_POST);
        die;
        extract($_POST);

        $id=0;

        //fetch the data 
        $idAg=$request->request->get("idAgence");

        $idClient=(int)$request->request->get("idClient");

        $idEmp=$request->request->get("idEmp");

        $dateOuv = $request->request->get("dateOuvert");

        $cleRib = $request->request->get("cle_rib");

        $solde = $request->request->get("montant");


        switch($request->request->get("typeCompte")){
            case "Bloque": 
                //set the numero of the account 
                $numAcc = $this->getNumCompte("B");

                //fetch the data specific for Locked Account

                $dateDebloc = $request->request->get("dateDebloc");

                //insert in the account bloque 
                $id=$this->insertBloque($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde,$dateDebloc);
            break;

            case "Epargne": 
                //set the numero of the account
                $numAcc = $this->getNumCompte("E");

                //insert in the Epargne account
                $id=$this->InsertEpargne($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde);
            break;

            case "Courant": 
                //set the numero of the account 
                $numAcc = $this->getNumCompte("C");

                //fetch the specific field for epargne account
                $raison=$request->request->get("raison");
                $nomEnter=$request->request->get("Name_entreprise");
                $adresseEnt=$request->request->get("adresse_Entreprise");
               
                //insert into the courant account 
                $id=$this->insertCourant($idEmp,$idAg,$idClient,$dateOuv,$cleRib,$numAcc,$solde,$raison,$nomEnter,$adresseEnt);               
            break;
        }

        if($id!=0){
            return $this->redirectToRoute("cniPage");
        }else{
            return $this->redirectToRoute("cniPage");
        }

        return $this->redirectToRoute("cniPage");
    }







































}
