<?php
    class ControllerExtensionReportVisites extends Controller {
        
        public function index() {

            //À commenter
            $this->load->language('extension/report/most_visited');
    
            $this->document->setTitle($this->language->get('heading_title'));
    
            $this->load->model('setting/setting');
    
            //À commenter
            if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
                $this->model_setting_setting->editSetting('report_product_viewed', $this->request->post);
    
                $this->session->data['success'] = $this->language->get('text_success');
    
                $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=report', true));
            }
    
            if (isset($this->error['warning'])) {
                $data['error_warning'] = $this->error['warning'];
            } else {
                $data['error_warning'] = '';
            }
    
            $data['breadcrumbs'] = array();
    
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
            );
    
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_extension'),
                'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=report', true)
            );
    
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/report/visites', 'user_token=' . $this->session->data['user_token'], true)
            );
    
            $data['action'] = $this->url->link('extension/report/visites', 'user_token=' . $this->session->data['user_token'], true);
    
            $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=report', true);
    
            if (isset($this->request->post['report_visites_status'])) {
                $data['report_visites_status'] = $this->request->post['report_visites_status'];
            } else {
                $data['report_visites_status'] = $this->config->get('report_visites_status');
            }
    
            if (isset($this->request->post['report_product_viewed_sort_order'])) {
                $data['report_visites_sort_order'] = $this->request->post['report_visites_sort_order'];
            } else {
                $data['report_visites_sort_order'] = $this->config->get('report_visites_sort_order');
            }
    
            $data['header'] = $this->load->controller('common/header');
            $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');
    
            $this->response->setOutput($this->load->view('extension/report/visites_form', $data));
        }
        
        protected function validate() {
            if (!$this->user->hasPermission('modify', 'extension/report/')) {
                $this->error['warning'] = $this->language->get('error_permission');
            }
    
            return !$this->error;
        }
            
        public function report() {
            $this->load->language('extension/report/visites');
    
            if (isset($this->request->get['page'])) {
                $page = $this->request->get['page'];
            } else {
                $page = 1;
            }
            
            $data['reset'] = $this->url->link('extension/report/visites/reset', 'user_token=' . $this->session->data['user_token'] . '&page={page}', true);
    
            $this->load->model('extension/report/visites');

//Ça se passe ici

            $filter_data = array(
                'start' => ($page - 1) * $this->config->get('config_limit_admin'),
                'limit' => $this->config->get('config_limit_admin')
            );
    
            $data['visites'] = array();
    
            $product_viewed_total = $this->model_extension_report_product->getTotalProductViews();
    
            $product_total = $this->model_extension_report_product->getTotalProductsViewed();
    
            $results = $this->model_extension_report_product->getProductsViewed($filter_data);
    
            $data['visites'][] = array(
                'name'    => $result['name'],
                'model'   => $result['model'],
                'viewed'  => $result['viewed'],
                'percent' => $percent . '%'
            );

            $donnees_navigation['url_page'] = $_SERVER['REQUEST_URI'];
            $donnees_navigation['titre'] = $this->document->getTitle();
            $donnees_navigation['adresse_ip'] = $_SERVER['REMOTE_ADDR'];
            $donnees_navigation['id_usager'] = ($this->customer->isLogged()) ? $this->customer->getId() : null; 
            
            $data['user_token'] = $this->session->data['user_token'];
    
            $url = '';
    
            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }
    
            $pagination = new Pagination();
            $pagination->total = $product_total;
            $pagination->page = $page;
            $pagination->limit = $this->config->get('config_limit_admin');
            $pagination->url = $this->url->link('report/report', 'user_token=' . $this->session->data['user_token'] . '&code=product_viewed&page={page}', true);
    
            $data['pagination'] = $pagination->render();
    
            $data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($product_total - $this->config->get('config_limit_admin'))) ? $product_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $product_total, ceil($product_total / $this->config->get('config_limit_admin')));
            
            return $this->load->view('extension/report/product_viewed_info', $data);
        }
    
        public function reset() {
            $this->load->language('extension/report/product_viewed');
    
            if (!$this->user->hasPermission('modify', 'extension/report/product_viewed')) {
                $this->session->data['error'] = $this->language->get('error_permission');
            } else {
                $this->load->model('extension/report/product');
    
                $this->model_extension_report_product->reset();
    
                $this->session->data['success'] = $this->language->get('text_success');
            }
    
            $this->response->redirect($this->url->link('report/report', 'user_token=' . $this->session->data['user_token'] . '&code=product_viewed' . $url, true));
        }
    }
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
    
                $this->load->model('extension/report/visites');
                $visite_id = $this->model_report_visites->addVisite($donnees_navigation);
               
            // Analytics
            $this->load->model('setting/extension');
    
            $data['analytics'] = array();
    
            $analytics = $this->model_setting_extension->getExtensions('analytics');
            //$distinctUris = $this->model_report_visites->getDistinctURIs($donnees_navigation);
            //$uris = $this->model_report_visites->getAllURIs($donnees_navigation);
/*
            //$array = json_decode(json_encode($uris), true);
            //print_r($uris);
            //var_dump($array);
            //print_r(array_count_values($array));
    
            foreach ($analytics as $analytic) {
                if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
                    $data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
                }
            }*/
        }
    
        /**
         * index = affiche les 15 pages les plus visitées
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
        
        

    }