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
            'order' => 'NewsletterField.id DESC'
        )
    );

    public $belongsTo = array(
        'Template' => array(
            'className' => 'Template',
            'foreignKey' => 'template_id'
        )
    );

    public function afterSave($created = true){
        $this->Template->recursive = 1;
        $template = $this->Template->find('first', array('conditions' => array('Template.id' => $this->data['Newsletter']['template_id'])));
        $content = $template['Template']['content'];
        // Pega os fields
        foreach ($template['Field'] as $key => $field) {
            $fields[$key]['id'] = $field['id'];
            $fields[$key]['name'] = $field['name'];
        }
        // Substitui no content
        foreach ($this->data['NewsletterField'] as $key => $newsfield) {
            $content = str_replace($fields[$key]['name'], $newsfield['value'], $content);
        }
        // Atualiza
        $this->data['Newsletter']['content'] = $content;
        $this->save();
    }
}