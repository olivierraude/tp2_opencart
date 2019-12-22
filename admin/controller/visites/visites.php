<?php
    class ControllerVisites extends Controller {
        /**
         * index = affiche les 15 pages les plus visitées
         */

        /**
         * ajoute une visite
         */
        public function add(){
            # code ...
        }


        /**
         * affiche toutes les visites
         */
        public function afficherLesVisites(){
            # code ...
        }
        
        

        public function index() {
            
            /**
             * dans la cadre du tp2,
             * l'enregistrement de l'activité de l'utilisateur sera faites ici. Le fichier header étant appelé à chaque chargement, il est une bonne place pour 'surveiller' son activité
             * enregistrement :
             * 	- URL (adresse sans le nom de domaine)
             * 	- Titre : titre de la page
             * 	- Date : Date et heure de la visite
             * 	- adresse_ip : ip de l'utilisateur
             *  - user_id : id de l'utilisateur si il est connecté , null sinon
             */
            
                $donnees_navigation['url_page'] = $_SERVER['REQUEST_URI'];
                $donnees_navigation['titre'] = $this->document->getTitle();
                $donnees_navigation['adresse_ip'] = $_SERVER['REMOTE_ADDR'];
                $donnees_navigation['id_usager'] = ($this->customer->isLogged()) ? $this->customer->getId() : null; // $user_id = $this->customer->getId() si utilisateur connecté sinon null
    
                $this->load->model('report/visites');
                $visite_id = $this->model_report_visites->addVisite($donnees_navigation);
                
            // Analytics
            $this->load->model('setting/extension');
    
            $data['analytics'] = array();
    
            $analytics = $this->model_setting_extension->getExtensions('analytics');
            $distinctUris = $this->model_report_visites->getDistinctURIs($donnees_navigation);
		    $uris = $this->model_report_visites->getAllURIs($donnees_navigation);

		 //$array = json_decode(json_encode($uris), true);
		 //print_r($uris);
		 //var_dump($array);
		 //print_r(array_count_values($array));
    
            foreach ($analytics as $analytic) {
                if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
                    $data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
                }
            }
        }
    }