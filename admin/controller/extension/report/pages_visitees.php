<?php
class ControllerExtensionReportPagesVisitees extends Controller {

		
	public function report() {
		$this->load->language('extension/report/pages_visitees');

		$this->load->model('extension/report/visites');

		$results = $this->model_extension_report_visites->getAllVisites();

		foreach ($results as $result) {
			$data['pages'][] = array(
				'titre'         => $result['titre'],
				'date_visite'   => $result['date_visite'],
				'url_page'      => $result['url_page'],
                'id_usager'     => $result['id_usager'],
                'adresse_ip'    => $result['adresse_ip']
			);
		}
		
		$data['user_token'] = $this->session->data['user_token'];

		return $this->load->view('extension/report/pages_visitees', $data);
	}
}