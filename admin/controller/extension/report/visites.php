<?php
    class ControllerExtensionReportVisites extends Controller {
        
        public function index() {

            $this->load->language('extension/report/most_visited');
    
            $this->document->setTitle($this->language->get('heading_title'));
    
            $this->load->model('setting/setting');
    
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
    
            if (isset($this->request->post['report_visites_sort_order'])) {
                $data['report_visites_sort_order'] = $this->request->post['report_visites_sort_order'];
            } else {
                $data['report_visites_sort_order'] = $this->config->get('report_visites_sort_order');
            }
    
            $data['header'] = $this->load->controller('common/header');
            $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');
    
            $this->response->setOutput($this->load->view('extension/report/visites_info', $data));
        }
        
        protected function validate() {
            if (!$this->user->hasPermission('modify', 'extension/report/')) {
                $this->error['warning'] = $this->language->get('error_permission');
            }
    
            return !$this->error;
        }
            
        public function report() {
            $this->load->language('extension/report/visites');
            
            $data['reset'] = $this->url->link('extension/report/visites/reset', 'user_token=' . $this->session->data['user_token'] . '&page={page}', true);
    
            $this->load->model('extension/report/visites');

            //Ça se passe ici

            $data['visites'] = array();
    
            $results = $this->model_extension_report_visites->getAllURIs();

            foreach ($results as $result) {
                $data['visites'][] = array(
                    'url_page'      => $result['url_page'],
                    'titre'         => $result['titre'],
                    'vues'         => $result['nombreURL']
                );
            }
            $data['user_token'] = $this->session->data['user_token'];
    
            $url = '';
    
            return $this->load->view('extension/report/visites_info', $data);
        }
    
        public function reset() {
            $this->load->language('extension/report/visites');
    
            if (!$this->user->hasPermission('modify', 'extension/report/visites')) {
                $this->session->data['error'] = $this->language->get('error_permission');
            } else {
                $this->load->model('extension/report/visites');
    
                $this->model_extension_report_product->reset();
    
                $this->session->data['success'] = $this->language->get('text_success');
            }
    
            $this->response->redirect($this->url->link('report/report', 'user_token=' . $this->session->data['user_token'] . '&code=visites' . $url, true));
        }
    }