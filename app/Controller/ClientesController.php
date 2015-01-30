<?php
class ClientesController extends AppController {
	
	public $paginate = array(
		'limit' => 20,
		'paramType' => 'querystring',
		'order' => array(
			'Cliente.nome' => 'ASC'
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
					'Cliente.nome LIKE' => '%' . $this->request->query['search'] . '%'
				)
			);
			$this->paginate['conditions'] = $conditions;
			$this->set('clientes', $this->paginate('Cliente'));
			$this->render('admin_index');
		}
	}
	
	public function admin_index() {
		$this->set('clientes', $this->paginate('Cliente'));
	}
	
	public function admin_edit($id=null) {
		$this->Cliente->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Cliente->read();
		} else {
			if ($this->Cliente->save($this->request->data)) {
				$this->setFlashMessage('Cliente alterado com sucesso!', 'success', array('action' => 'index'));
			} else {
				$this->setFlashMessage('Não foi possível alterar, tente novamente!', 'error');
			}
		}
	}
	
	public function admin_add() {
		if ($this->request->is('post') && !empty($this->request->data)) {
			if ($this->Cliente->save($this->request->data)) {
				$this->setFlashMessage('Cliente criado com sucesso!', 'success', array('action' => 'index'));
			}
		}
	}
	
	public function admin_del($id=null) {
		if ($this->request->is('get') || $this->request->is('delete')) {
			if ($this->Cliente->delete($id)) {
				$this->setFlashMessage('Usuário excluído com sucesso!', 'success', array('action' => 'index'));
			}
		}
	}

	public function admin_callclientes(){
		$this->autoRender = false;
		$arrClientes = $this->Cliente->listclients();
		foreach ($arrClientes as $key => $value) {
			$arr["label"] = $value;
			$arr["value"] = $key;
			$arrFinal[] = $arr;
		}
		echo json_encode( $arrFinal );
	}
}