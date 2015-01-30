<?php
App::uses('AppModel', 'Model');

class File extends AppModel {
	
	public $displayField = 'name';
	public $actsAs = array(
		'Upload.Upload' => array(
			'name' => array(
				'maxSize' => 2048000,
				'path' => '{ROOT}webroot{DS}img{DS}{model}{DS}{field}{DS}',
				'mimetypes' => array('image/jpeg','image/pjpeg', 'image/png'),
				'extensions' => array('jpg', 'jpeg', 'png'),
				'fields' => array(
					'dir' => 'id'
				),
				/*
				'thumbnailMethod' => 'php',
				'thumbnailQuality' => 100,
				'thumbnailSizes' => array(
					'xvga' => '198x273',
					'vga' => '160x140',
					'thumb' => '80x80'
				),
				*/
				'deleteOnUpdate' => true
			)
		)
	);
	
	public $validate = array(
		'name' => array(
			'photoExt' => array(
					'rule' => array('isValidExtension', array('jpeg', 'jpg', 'png'), false),
					'message' => 'Extensão inválida!'
			),
			'photoMime' => array(
				'rule' => array('isValidMimeType', array('image/jpeg', array('image/pjpeg'))),
				'message' => 'Arquivo jpg inválido!'
			),
			'photo' => array(
				'rule' => array('isAboveMaxSize', 2097152),
				'message' => 'Arquivo maior que 2mb'
			)
		)
	);
	
	/*
	public $belongsTo = array(
		'User' => array(
			'className' => 'Venture',
			'foreignKey' => 'user_id'
		)
	);
	*/
	
	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $result) {
			if (!empty($result[$this->alias]['name']) && !empty($result[$this->alias]['id'])) {
				$results[$key][$this->alias]['dir'] = WWW_ROOT . 'img' . DS . 'file' . DS . 'name' . DS . $result[$this->alias]['id'] . DS;
				$results[$key][$this->alias]['path'] = 'file/name/' . $result[$this->alias]['id'] . '/';
			}
		}
		return $results;
	}
	
	public function multipleUpload($data = null) {
		$success = 0;
		$error = 0;
		
		if (count($data['File']['name']) > 1) {
			foreach ($data['File']['name'] as $value) {
				$save = array(
					'File' => array(
						'extension' => '',
						'is' => $data['File']['type'],
						'type' => 'image',
						'venture_id' => $data['File']['venture_id'],
						'main' => $data['File']['main']
					)
				);
				$save['File']['name'] = $value;
				
				if (isset($data['File']['stage_id'])) {
					$save['File']['stage_id'] = $data['File']['stage_id'];
				}
				
				$this->create();
				if ($this->save($save)) {
					$success++;
				} else {
					$error++;
				}
			}
		} else {
			$save = array(
				'File' => array(
					'extension' => '',
					'is' => $data['File']['type'],
					'type' => 'image',
					'venture_id' => $data['File']['venture_id'],
					'name' => current($data['File']['name']),
					'main' => $data['File']['main'],
					'logo' => (isset($data['File']['logo']) && !empty($data['File']['logo'])) ? $data['File']['logo'] : 0,
				)
			);
			
			if (isset($data['File']['stage_id'])) {
				$save['File']['stage_id'] = $data['File']['stage_id'];
			}
			$this->create();
			if ($this->save($save)) {
				return true;
			} else {
				return false;
			}
		}
		if ($success) {
			return true;
		}
		return false;
	}
}