<?php
class Newsletter extends AppModel {
	public $displayField = 'titulo';
	public $validate = array(
		'assunto' => array(
			'rule' => 'notEmpty',
			'message' => 'Assunto obrigatório'
		),
        'content' => array(
            'rule' => 'notEmpty',
            'message' => 'A news deve possuir conteúdo'
        )
	);

	public $hasMany = array(
        'NewsletterField' => array(
            'className' => 'NewsletterField',
            'conditions' => array('NewsletterField.newsletter_id' => 'Newsletter.id'),
            'order' => 'NewsletterField.id ASC'
        )
    );

    public $belongsTo = array(
        'Template' => array(
            'className' => 'Template',
            'foreignKey' => 'template_id'
        )
    );
}