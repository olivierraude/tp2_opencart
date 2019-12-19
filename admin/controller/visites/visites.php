<?php
    class ControllerVisitesVisites extends Controller {

        /**
         * index = affiche les 15 pages les plus visitées
         */
        public function voir_olivier(){
            # code
        }
        
        public function ajaxAfficherLesVisites(){
            $this->load->model('visites/visites');
            $lesVisites = $this->model_visites_visites->getAllVisites();
            //var_dump($lesVisites);
            $this->reponse->set(Output(json_encode($lesVisites)));
            
        }

    }

?>