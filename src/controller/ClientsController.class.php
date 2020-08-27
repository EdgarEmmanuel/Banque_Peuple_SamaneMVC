<?php
use libs\system\Controller;

use src\model\ClientsRepository;

use src\model\ClientIndependantRepository;

use src\model\ClientSalarieRepository;

use src\model\ClientMoralRepository;


class ClientsController extends Controller
{  
    private $clientRepo ;
    private $IndeRepo;
    private $SalarieRespo;
    private $moralRepo;

    public function __construct(){
       parent::__construct();
        $this->clientRepo = new ClientsRepository();
        $this->IndeRepo = new ClientIndependantRepository();
        $this->SalarieRespo = new ClientSalarieRepository();
        $this->moralRepo= new ClientMoralRepository();
    }


    public function insertFirstINClient($mat,$mail,$tel){
        //insert in the client
        $client = new Clients();

        $client->setTelephone($tel);

        $client->setEmail($mail);

        $client->setMatricule($mat);

        return $this->clientRepo->addClient($client);
       
    }


    public function pageInsertMoral(){
        extract($_POST);
        $client_moral = new ClientMoral();

        $client_moral->setIdClient($this->insertFirstINClient($matricule,$email,$telephone));

        $client_moral->setActiviteEntreprise($activite);

        $client_moral->setAdresseEntreprise($adresse);

        $client_moral->setTypeEntreprise($type);

        $client_moral->setNomEntreprise($nom);

        $client_moral->setNinea($ninea);


        $res=$this->moralRepo->insertMoral($client_moral);

        if($res!=0){
            return $this->view->redirect('Pages/getPageCni');
        }

    }

    public function insertCIndependant(){
        extract($_POST);

        $client_independant = new ClientIndependant();

        $client_independant->setIdClient($this->insertFirstINClient($matricule,$email,$telephone));

        $client_independant->setNom($nom);

        $client_independant->setPrenom($prenom);

        $client_independant->setCni($cni);

        $client_independant->setActivite($activite);

        $client_independant->setAdresse($localisation);

        $data=$this->IndeRepo->insertIndependant($client_independant);


        if($data != 0){
            return $this->view->redirect('Pages/getPageCni');
        }
        
    }


   
    public function insertCSalarie()
    {
        //insert in client salarie
        extract($_POST);
        $CSalarie = new ClientSalarie();

        $CSalarie->setIdClient($this->insertFirstINClient($matricule,$email,$telephone));

        $CSalarie->setCni($cni);
        $CSalarie->setNom($nom);
        $CSalarie->setPrenom($prenom);
        $CSalarie->setProfession($profession);
        $CSalarie->setNomEntreprise($nom_Entreprise);
        $CSalarie->setAdresseEntreprise($adresseforCl);

        
        if(  $this->SalarieRespo->insertSalarie($CSalarie) != 0){
            return $this->view->redirect("Pages/getPageCni");
        }

    }
}
