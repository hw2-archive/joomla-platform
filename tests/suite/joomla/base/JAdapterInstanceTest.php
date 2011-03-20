<?php
/**
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @package     Joomla.UnitTest
 */

defined('JPATH_PLATFORM') or die;

require_once JPATH_PLATFORM.'/joomla/base/adapterinstance.php';

/**
 * Test class for JAdapterInstance.
 * Generated by PHPUnit on 2009-10-08 at 11:43:00.
 */
class JAdapterInstanceTest extends JoomlaDatabaseTestCase {
	/**
	 * @var	JAdapterInstance
	 * @access protected
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @access protected
	 */
	protected function setUp() {

	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @access protected
	 */
	protected function tearDown() {
	}

	/**
	 * @todo Decide how to Implement.
	 */
	public function testGetParent() {
		$this->object = new JAdapter(JUnitHelper::normalize(dirname(__FILE__)), 'Test', 'TestAdapters');

		$this->assertThat(
			$this->object->getAdapter('Testadapter3')->getParent(),
			$this->identicalTo($this->object)
		);
	}
}
