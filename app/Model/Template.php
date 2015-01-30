<?php
class Template extends AppModel {
	public $displayField = 'titulo';
	public $validate = array(
		'content' => array(
			'rule' => 'notEmpty',
			'message' => 'O template deve possuir conteúdo'
		)
	);

	public $hasMany = array(
        'Field' => array(
            'className' => 'Field',
            'conditions' => array('Field.template_id' => 'Template.id'),
            'order' => 'Field.id ASC',
            'foreignKey' => 'template_id',
            'dependent' => true,
            'exclusive' => true
        )
    );

    public $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id'
        )
    );

    public function listtemplates($client_id){
        $templates = $this->find('list', array( 'conditions' => array('Template.cliente_id' => $client_id) ));
        return $templates;
    }
}