<?php
class S extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'clientes' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'nome' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'id'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'fields' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'field' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'id'),
					'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'field'),
					'type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'name'),
					'value' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'type'),
					'newsletters_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'after' => 'value'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'fk_fields_newsletters1_idx' => array('column' => 'newsletters_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'newsletters' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'assunto' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'id'),
					'data' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'after' => 'assunto'),
					'templates_idtemplates' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'after' => 'data'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'fk_newsletters_templates1_idx' => array('column' => 'templates_idtemplates', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'templates' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'titulo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'id'),
					'clientes_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'after' => 'titulo'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'fk_templates_clientes_idx' => array('column' => 'clientes_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'clientes', 'fields', 'newsletters', 'templates'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
