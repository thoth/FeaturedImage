<?php
App::uses('FeaturedImage', 'FeaturedImage.Model');

/**
 * FeaturedImage Test Case
 *
 */
class FeaturedImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.featured_image.featured_image',
		'plugin.featured_image.node'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FeaturedImage = ClassRegistry::init('FeaturedImage.FeaturedImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FeaturedImage);

		parent::tearDown();
	}

}
