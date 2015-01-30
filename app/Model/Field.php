<?php
class Field extends AppModel {
	public $displayField = 'field';

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Preencha o texto dinâmico'
		),
		'type' => array(
			'rule' => 'notEmpty',
			'message' => 'Preencha o tipo dos campos'
		)
	);

	public $belongsTo = array(
        'Template' => array(
            'className' => 'Template',
            'foreignKey' => 'template_id'
        )
    );

    public function listfields($template_id){
        $fields = $this->find('all', array('conditions' => array('Field.template_id' => $template_id) ));
        return $fields;
    }

    public function delfields($template_id){
    	$this->deleteAll( array('template_id' => $template_id) );
    }
}