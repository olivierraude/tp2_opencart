<?php
class ControllerExtensionModuleVisites extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/visites');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_visites', $this->request->post);

			$this->session->data['success'] = 'success'; //$this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
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
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/visites', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/visites', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_visites_admin'])) {
			$data['module_visites_admin'] = $this->request->post['module_visites_admin'];
		} else {
			$data['module_visites_admin'] = $this->config->get('module_visites_admin');
		}

		if (isset($this->request->post['module_visites_status'])) {
			$data['module_visites_status'] = $this->request->post['module_visites_status'];
		} else {
			$data['module_visites_status'] = $this->config->get('module_visites_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/visites', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/visites')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
    }
    
    public function install() {
        $this->load->model('extension/module/visites');
        $this->model_extension_module_visites->createTable();
       }
       
        public function uninstall(){
        $this->load->model('extension/module/visites');
        $this->model_extension_module_visites->dropTable();
       
       }
       
}
