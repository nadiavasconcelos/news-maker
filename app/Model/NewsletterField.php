<?php
class NewsletterField extends AppModel {
	public $displayField = 'value';

	public $validate = array(
		'value' => array(
			'rule' => 'notEmpty',
			'message' => 'Preencha o texto dinâmico'
		)
	);

	public $belongsTo = array(
        'Newsletter' => array(
            'className' => 'Newsletter',
            'foreignKey' => 'newsletter_id'
        ),
        'Field' => array(
            'className' => 'Field',
            'foreignKey' => 'field_id'
        )
    );
}