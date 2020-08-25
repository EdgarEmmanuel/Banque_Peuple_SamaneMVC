<?php
use libs\system\Controller;

use src\model\ClientsRepository;

use src\model\ClientIndependantRepository;


class ClientsController extends Controller
{  
    private $clientRepo ;
    private $IndeRepo;

    public function __construct(){
       parent::__construct();
        $this->clientRepo = new ClientsRepository();
        $this->IndeRepo = new ClientIndependantRepository();
    }


    public function insertFirstINClient($mat,$mail,$tel){
        //insert in the client
        $client = new Clients();

        $client->setTelephone($tel);

        $client->setEmail($mail);

        $client->setMatricule($mat);

        return $this->clientRepo->addClient($client);
       
    }


    // public function insertCMoral(Request $request){
    //     $client_moral = new ClientMoral();

    //     $client_moral->setIdClient($this->insertFirstINClient($request->request->get("matricule"),
    //     $request->request->get("email"),$request->request->get("telephone")));

    //     $client_moral->setActiviteEntreprise($request->request->get("activite"));

    //     $client_moral->setAdresseEntreprise($request->request->get("adresse"));

    //     $client_moral->setTypeEntreprise($request->request->get("type"));

    //     $client_moral->setNomEntreprise($request->request->get("nom"));

    //     $client_moral->setNinea($request->request->get("ninea"));


    //     $this->f_entity->persist($client_moral);
    //     $this->f_entity->flush();

    //     if($client_moral->getId()!=0){
    //         $data["message"]="INSERTION CLIENT MORAL REUSSIE !!!";
    //         return $this->redirectToRoute('cniPage',$data);
    //     }else{
    //         $data["message"]=" INSERTION NON REUSSIE !!!";
    //         return $this->redirectToRoute('cniPage',$data);
    //     }

    // }

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


        if( $data != 0){
            return $this->view->redirect('Pages/getPageCni');
        }else{
            return $this->view->redirect("clients/cNSalarie");
        }
    }


   
    // public function insertCSalarie(Request $request)
    // {
    //     //insert in client salarie
    //     $CSalarie = new ClientSalarie();

    //     $CSalarie->setIdClient($this->insertFirstINClient($request->request->get("matricule"),$request->request->get("email"),$request->request->get("telephone")));

    //     $CSalarie->setCni($request->request->get("cni"));
    //     $CSalarie->setNom($request->request->get("nom"));
    //     $CSalarie->setPrenom($request->request->get("prenom"));
    //     $CSalarie->setProfession($request->request->get("profession"));
    //     $CSalarie->setNomEntreprise($request->request->get("nom_Entreprise"));
    //     $CSalarie->setAdresseEntreprise($request->request->get("adresseforCl"));

    //     //insertion
    //     $this->f_entity->persist($CSalarie);
    //     $this->f_entity->flush();


    //     $res = $CSalarie->getId();
    //     if( $res!=0){
    //         return $this->redirectToRoute("cniPage");
    //     }

    // }
}
