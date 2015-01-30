<?php
class TemplatesController extends AppController {
	
	public $paginate = array(
		'limit' => 20,
		'paramType' => 'querystring',
		'order' => array(
			'Template.id' => 'DESC'
		)
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		// $this->Auth->allow('create', 'contato');
	}
	
	public function admin_search() {
		$this->autoRender = false;
		$conditions = null;
		if (isset($this->request->query['search']) && !empty($this->request->query['search'])) {
			$conditions[] = array(
				'OR' => array(
					'Template.titulo LIKE' => '%' . $this->request->query['search'] . '%'
				)
			);
			$this->paginate['conditions'] = $conditions;
			$this->set('templates', $this->paginate('Template'));
			$this->render('admin_index');
		}
	}
	
	public function admin_index() {
		$this->Template->recursive = 1;
		$this->set('templates', $this->paginate('Template'));
	}

	public function admin_view($id=null) {
		$this->layout = false;
		$template = $this->Template->find('first', array('conditions' => array('id' => $id)));
		$this->set('template', $template);
	}
	
	public function admin_add() {
		$this->set('fields', array("0" => "Field")); // Init

		if ($this->request->is('post') && !empty($this->request->data)) {
			debug( $this->request->data );
			die();
			if ($this->Template->save($this->request->data)) {
				foreach ($this->request->data['Field'] as $key => $field) {
					$this->request->data['Field'][$key]['template_id'] = $this->Template->id;
				}

				$this->loadModel('Field');
				$this->Field->saveMany($this->request->data['Field']);

				$this->setFlashMessage('Template criado com sucesso!', 'success', array('action' => 'index'));
			}
		}
	}

	public function admin_edit($id=null) {
		$this->Template->id = $id;
		$this->Template->recursive = 1;
		if ($this->request->is('get')) {
			$this->request->data = $this->Template->read();
			$this->set('fields', $this->request->data['Field']);
		} else {
			if ($this->Template->save($this->request->data)) {
				foreach ($this->request->data['Field'] as $key => $field) {
					$this->request->data['Field'][$key]['template_id'] = $this->Template->id;
				}
				
				$this->loadModel('Field');
				$this->Field->deleteAll(array('Field.template_id' => $this->Template->id), false);
				$this->Field->saveMany($this->request->data['Field']);

				$this->setFlashMessage('Template alterado com sucesso!', 'success', array('action' => 'index'));
			} else {
				$this->setFlashMessage('Não foi possível alterar, tente novamente!', 'error');
			}
		}
	}
	
	public function admin_del($id=null) {
		$this->autoRender = false;
		if ($this->request->is('get') || $this->request->is('delete')) {
			if ($this->Template->delete($id, true)) {
				$this->Template->Field->delfields($id);
				$this->setFlashMessage('Template excluído com sucesso!', 'success', array('action' => 'index'));
			}
		}
	}

	public function admin_calltemplates($client_id){
		$this->autoRender = false;
		$arrTemplates = $this->Template->listtemplates($client_id);
		foreach ($arrTemplates as $key => $value) {
			$arr["label"] = $value;
			$arr["value"] = $key;
			$arrFinal[] = $arr;
		}
		echo json_encode( $arrFinal );
	}
}