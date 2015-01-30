<?php
App::uses('AppController', 'Controller');

class FilesController extends AppController {
	
	public $scaffold = 'admin';
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('home');
	}
	
	public function admin_add($parent_id = null) {
		if ($this->request->is('post') && !empty($this->request->data)) {
			
			if ($this->File->multipleUpload($this->request->data)) {
				$this->Session->setFlash('Imagem adicionada com sucesso!', '', array('class' => 'alert alert-success'), 'success');
			} else {
				$this->Session->setFlash('Imagem inválida!', '', array('class' => 'alert alert-error'), 'error');
			}
			
			$this->request->data = null;
			$this->redirect(array('action' => 'index', $parent_id));
		}
	}
	
	public function admin_update() {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			$this->File->id = $this->request->data['key'];
			if (!empty($this->request->data['new_value'])) {
				$this->File->saveField('legend', $this->request->data['new_value'], false);
			}
			print json_encode( array(
				"is_error"		=> false,
				"error_text"	=> "Ocorreu um erro no servidor, tente novamente mais tarde!",
				"html"			=> $this->data['new_value']
			));
		}
	}
	
	public function admin_del($id, $redirect = false) {
		if ($this->request->is('get') || $this->request->is('delete')) {
			if ($this->File->delete($id)) {
				
				if ($redirect) {
					$this->redirect(array('controller' => 'stages', 'action' => 'edit', $redirect));
				}
				
				$this->Session->setFlash('Imagem excluída com sucesso!', '', array('class' => 'alert alert-success'), 'success');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}