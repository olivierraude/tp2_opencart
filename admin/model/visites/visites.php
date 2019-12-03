<?php
class ModelVisites extends Model {
    /**
     * ajout d'une visite: chaque visite sur un page du site est ajoutée dans la DB
     * paramètre:
     *      $url (str)      : adresse internet du site web visité
     *      $titre (str)    : titre de la page
     *      $adresse_ip     : adresse ip de l'utilisateur
     *      $id_usager      : si l'utilisateur est connecté , on inscrit son identifiant (sinon null ou 0 ???)       
     *  
     */
    public function addVisite($url,$titre,$adresse_ip,$id_usager)
    {
        # code...
    }

    public function getAllVisites()
    {
        # code...
    }
    
    public function getVisite($id_visite)
    {
        # code...
    }

    public function getVisitesParDates($date_debut,$date_fin)
    {
        # code...
    }
}

?>