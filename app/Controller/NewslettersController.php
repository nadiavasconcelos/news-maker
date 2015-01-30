<?php
class NewslettersController extends AppController {
	public $paginate = array(
		'limit' => 20,
		'paramType' => 'querystring',
		'order' => array(
			'Newsletter.id' => 'DESC'
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
					'Newsletter.assunto LIKE' => '%' . $this->request->query['search'] . '%'
				)
			);
			$this->paginate['conditions'] = $conditions;
			$this->set('newsletters', $this->paginate('Newsletter'));
			$this->render('admin_index');
		}
	}
	
	public function admin_index() {
		$this->Newsletter->recursive = 2;
		$this->set('newsletters', $this->paginate('Newsletter'));
	}

	public function admin_view($id=null) {
		$this->layout = false;
		$newsletter = $this->Newsletter->find('first', array('conditions' => array('id' => $id)));
		$this->set('newsletter', $newsletter);
	}
	
	public function admin_add() {
		if ($this->request->is('post') && !empty($this->request->data)) {
			if ($this->Newsletter->save($this->request->data)) {
				foreach ($this->request->data['NewsletterField'] as $key => $field) {
					$this->request->data['NewsletterField'][$key]['newsletter_id'] = $this->Newsletter->id;
				}

				$this->loadModel('NewsletterField');
				$this->NewsletterField->saveMany($this->request->data['NewsletterField']);

				$this->setFlashMessage('Newsletter criada com sucesso!', 'success', array('action' => 'index'));
			}
		}
	}

	public function admin_edit($id=null) {
		$this->Newsletter->id = $id;
		$this->Newsletter->recursive = 2;
		if ($this->request->is('get')) {
			$this->request->data = $this->Newsletter->read();
			$this->set('fields', $this->request->data['NewsletterField']);
		} else {
			if ($this->Newsletter->save($this->request->data)) {
				foreach ($this->request->data['NewsletterField'] as $key => $field) {
					$this->request->data['NewsletterField'][$key]['template_id'] = $this->Newsletter->id;
				}
				
				$this->loadModel('NewsletterField');
				$this->NewsletterField->deleteAll(array('NewsletterField.newsletter_id' => $this->Newsletter->id), false);
				$this->NewsletterField->saveMany($this->request->data['NewsletterField']);

				$this->setFlashMessage('Newsletter alterado com sucesso!', 'success', array('action' => 'index'));
			} else {
				$this->setFlashMessage('Não foi possível alterar, tente novamente!', 'error');
			}
		}
	}
	
	public function admin_del($id=null) {
		if ($this->request->is('get') || $this->request->is('delete')) {
			if ($this->Newsletter->delete($id)) {
				$this->setFlashMessage('Newsletter excluída com sucesso!', 'success', array('action' => 'index'));
			}
		}
	}
}