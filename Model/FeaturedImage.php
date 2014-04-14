<?php
App::uses('FeaturedImageAppModel', 'FeaturedImage.Model');
/**
 * FeaturedImage Model
 *
 * @property Node $Node
 */
class FeaturedImage extends FeaturedImageAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Node' => array(
			'className' => 'Node',
			'foreignKey' => 'node_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
