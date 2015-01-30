<?php
class Cliente extends AppModel {
	public $displayField = 'nome';
	public $validate = array(
		'nome' => array(
			'rule' => 'notEmpty',
			'message' => 'O nome deve ser preenchido'
		)
	);

	public $hasMany = array(
        'Template' => array(
            'className' => 'Template',
            'conditions' => array('Template.cliente_id' => 'Cliente.id'),
            'order' => 'Template.id DESC'
        )
    );
    public $cascade = true;

    public function listclients(){
    	$clientes = $this->find('list');
    	return $clientes;
    }
}