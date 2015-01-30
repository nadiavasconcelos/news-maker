<?php
class FieldsController extends AppController {
	
	public $paginate = array(
		'limit' => 20,
		'paramType' => 'querystring',
		'order' => array(
			'Field.id' => 'DESC'
		)
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		// $this->Auth->allow('create', 'contato');
	}
	
	public function admin_index($id=null) {
		$this->set('fields', $this->paginate('Field'));
	}
	
	// public function admin_edit($id=null) {
	// 	$this->Template->id = $id;
	// 	if ($this->request->is('get')) {
	// 		$this->request->data = $this->Template->read();
	// 	} else {
	// 		if ($this->Template->save($this->request->data)) {
	// 			$this->setFlashMessage('Template alterado com sucesso!', 'success', array('action' => 'index'));
	// 		} else {
	// 			$this->setFlashMessage('Não foi possível alterar, tente novamente!', 'error');
	// 		}
	// 	}
	// }
	
	// public function admin_add() {
	// 	if ($this->request->is('post') && !empty($this->request->data)) {
	// 		if ($this->Template->save($this->request->data)) {
	// 			$this->setFlashMessage('Template criado com sucesso!', 'success', array('action' => 'index'));
	// 		}
	// 	}
	// }
	
	// public function admin_del($id=null) {
	// 	if ($this->request->is('get') || $this->request->is('delete')) {
	// 		if ($this->Template->delete($id)) {
	// 			$this->setFlashMessage('Template excluído com sucesso!', 'success', array('action' => 'index'));
	// 		}
	// 	}
	// }

	public function admin_callfields($template_id){
		$this->autoRender = false;
		$arrFields = $this->Field->listfields($template_id);
		// foreach ($arrFields as $key => $value) {
		// 	// $arr["key"] = $value;
		// 	$arr["key"] = $key;
		// 	$arrFinal[] = $arr;
		// }
		echo json_encode( $arrFields );
	}
	
}