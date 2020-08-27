<?php 
namespace src\model;

use libs\system\Model;

class CompteBloqueRepository extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function addBloque($bloque){
        $this->db->persist($bloque);
        $this->db->flush($bloque);

        return $bloque->getId();

    }
}

?>