<?php
/* SVN FILE: $Id$ */

App::import('Model', 'Origami.OrigamiAppModel');
App::import('Model', 'Origami.Attribute');
App::import('Model', 'Origami.Datatype');
App::import('Behavior', 'Origami.DataStore');

/**
 * Base model that to load SoftDeletable behavior on every test model.
 *
 * @package app.tests
 * @subpackage app.tests.cases.behaviors
 */
class OrigamiDataStoreTestModel extends CakeTestModel {
	/**
	 * Behaviors for this model
	 *
	 * @var array
	 * @access public
	 */
	var $actsAs = array('Origami.DataStore');
}

/**
 * Model used in test case.
 *
 * @package	app.tests
 * @subpackage app.tests.cases.behaviors
 */
class OdsUser extends OrigamiDataStoreTestModel {
	/**
	 * Name for this model
	 *
	 * @var string
	 * @access public
	 */
	var $name = 'OdsUser';
}

class OrigamiDataStoreTestCase extends CakeTestCase {
	/**
	 * Fixtures associated with this test case
	 *
	 * @var array
	 * @access public
	 */
//	var $fixtures = array('user', 'app.ods_user'/*, 'app.attribute', 'app.datatype'/*, 'app.eav_data'*/);
//	'app.user', 'app.group', 'app.users_group', 'app.activity_log', 'app.charge', 'app.quick_link', 'app.cra_charge_state', 'app.attribute', 'app.datatype', 'app.eav_data'

	/**
	 * Method executed before each test
	 *
	 * @access public
	 */
	function startTest() {
		$this->create();
		$this->OdsUser =& new OdsUser();
	}

	/**
	 * Method executed after each test
	 *
	 * @access public
	 */
	function endTest() {
		unset($this->OdsUser);
		ClassRegistry::flush();
//		$this->drop();
	}
/*
	function testMultipleObjects() {
		debug($this->OdsUser);
		$this->OdsUser->save();
		
		$odsu = new OdsUser();
		debug($odsu);
		
	}
*/	
	function testOrigamiTypes() {
		echo '<br>-----------------Testing Origami Data Store-------------------------<br>';
//		$Db =& ConnectionManager::getDataSource($this->OdsUser->useDbConfig);
//		$OrigamiDataStore =& new OrigamiDataStoreBehavior();
//		$OrigamiDataStore->setup($this->OdsUser);
		$this->OdsUser->create();
		
		$testData = array(
							'id' => '4b137b00-d111-11dd-a129-0002a5d5c51b',
							'email' => 'admin@clearmyrecord.com',
							'password' => 'admin',
							'endOfWorld' => '12 Dec 2012',
							'currentZipCode' => '40503',
							'intentionallyUndefinedAttribute' => 'make sure this attribute is undefined'
					);
		$this->OdsUser->save($testData);

		debug($this->OdsUser->read());
/*		
		$this->assertFalse($this->OdsUser->isOrigamiColumn('id'));
		$this->assertFalse($this->OdsUser->isOrigamiColumn('email'));
		$this->assertFalse($this->OdsUser->isOrigamiColumn('password'));
		$this->assertTrue($this->OdsUser->isOrigamiColumn('endOfWorld'));
		$this->assertTrue($this->OdsUser->isOrigamiColumn('currentZipCode'));
		$this->assertTrue($this->OdsUser->isOrigamiColumn('socailSecurityNumber'));
		$this->assertTrue($this->OdsUser->isOrigamiColumn('currentPhoneNumber'));
		$this->assertTrue($this->OdsUser->isOrigamiColumn('name'));
		$this->assertTrue($this->OdsUser->isOrigamiColumn('dob'));
*/		
//		$this->assertEqual($this->OdsUser->getOrigamiColumnType('id'), null);
//		$this->assertEqual($this->OdsUser->getOrigamiColumnType('endOfWorld'), 'origami_date');
//		$this->assertEqual($this->OdsUser->getOrigamiColumnType('currentPhoneNumber'), 'origami_phone');
//		$this->assertEqual($this->OdsUser->getOrigamiColumnType('socialSecurityNumber'), 'origami_ssn');
//		$this->assertEqual($this->OdsUser->getOrigamiColumnType('currentZipCode'), 'origami_postal');
/*		
		$value = array('areaCode'=>'859', 'prefix' => '301', 'suffix' => '1234');
		$this->assertEqual($this->OdsUser->formatData($value, 'origami_phone'), '8593011234');		
		$value = array('areaNumber'=>'859', 'groupNumber' => '30', 'serialNumber' => '1234');
		$this->assertEqual($this->OdsUser->formatData($value, 'origami_ssn'), '859301234');
		$value = array('zipCode'=>'85930', 'plusFour' => '3011');
		$this->assertEqual($this->OdsUser->formatData($value, 'origami_postal'), '859303011');
		$value = array('zipCode'=>'85930', 'plusFour' => '3011');

		$value = array('month' => '12', 'day' => '12', 'year' => '2008');
		$compareValue = strftime('%Y%m%dT%H%M%S', strtotime('12/12/2008'));
		$this->assertEqual($this->OdsUser->formatData($value, 'origami_date'), $compareValue);
		$value = array('hour' => '10', 'min' => '45');
		$compareValue = strftime('%Y%m%dT%H%M%S', strtotime('11/30/1999 10:45:00'));
		$this->assertEqual($this->OdsUser->formatData($value, 'origami_time'), $compareValue);
		$value = array('month' => '8', 'day' => '5', 'year' => '2008', 'hour' => '1', 'min' => '25', 'second' => '30');
		$compareValue = strftime('%Y%m%dT%H%M%S', strtotime('8/5/2008 1:25:30'));
		$this->assertEqual($this->OdsUser->formatData($value, 'origami_datetime'), $compareValue);		
*/		
		unset($OrigamiDataStore);
	}
	
	
	// CakeTest has real issues with ENUM columns.  So we provide custom create and drop functions for the datatype
	// table.  The datatype table also 'defines' which 'type' tables need to exist, so we create those tables
	// as part of this process.
	function create()
	{
		$db = ConnectionManager::getDataSource('test_suite');	
		$this->drop();
		
		$sqlCreateCommand = "CREATE TABLE `ods_users` (`id` CHAR(36) NOT NULL, `email` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL, PRIMARY KEY(`id`)) TYPE=InnoDB;";
		$createOdsUsers = $db->execute($sqlCreateCommand);
		
		$sqlCreateCommand = "CREATE TABLE `datatypes` (`id` CHAR(36) NOT NULL, `name` VARCHAR(255) NOT NULL, `validation_proc` TEXT NULL, `format` VARCHAR(255) NULL, `table` ENUM('VARCHAR','INTEGER','DATETIME','TEXT','FILE') NOT NULL DEFAULT 'VARCHAR', PRIMARY KEY(`id`)) TYPE=InnoDB;";
		$createDatatypes = $db->execute($sqlCreateCommand);

		$sqlInsertCommand = "INSERT INTO `datatypes` (`id`, `name`, `validation_proc`, `format`, `table`) VALUES ('494295bc-af58-4ac6-9849-0dae7f000101', 'Default', null, null, 'VARCHAR');";
		$insertDatatypes = $db->execute($sqlInsertCommand);
		$sqlInsertCommand = "INSERT INTO `datatypes` (`id`, `name`, `validation_proc`, `format`, `table`) VALUES ('49628f13-f940-46a6-b603-015ac0a80172', 'Date', null, null, 'DATETIME');";								
		$insertDatatypes = $db->execute($sqlInsertCommand);						
		
		$sqlCreateCommand = "CREATE TABLE `attributes` (`id` CHAR(36) NOT NULL, `datatype_id` CHAR(36) NOT NULL, `name` VARCHAR(255) NOT NULL, `multiple` INTEGER NOT NULL DEFAULT 0, PRIMARY KEY(`id`)) TYPE=InnoDB;";
		$createAttributes = $db->execute($sqlCreateCommand);

		$sqlCreateCommand = "CREATE TABLE `eav_data` (`id` CHAR(36) NOT NULL, `entity_id` CHAR(36) NOT NULL, `attribute_id` CHAR(36) NOT NULL, `value_id` CHAR(36) NOT NULL, PRIMARY KEY(`id`)) TYPE=InnoDB;";
		$createEavData = $db->execute($sqlCreateCommand);
				
		$sqlCreateCommand = "CREATE TABLE eav_integers (id CHAR(36) NOT NULL, value INTEGER UNSIGNED NOT NULL, PRIMARY KEY(id)) TYPE=InnoDB;";
		$createEavIntegers = $db->execute($sqlCreateCommand);
		
		$sqlCreateCommand = "CREATE TABLE eav_text (id CHAR(36) NOT NULL, value TEXT NOT NULL, PRIMARY KEY(id)) TYPE=InnoDB;";
		$createEavText = $db->execute($sqlCreateCommand);
		
		$sqlCreateCommand = "CREATE TABLE eav_varchars (id CHAR(36) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) TYPE=InnoDB;";
		$createEavVarchars = $db->execute($sqlCreateCommand);
		
		$sqlCreateCommand = "CREATE TABLE eav_datetimes (id CHAR(36) NOT NULL, value DATETIME NOT NULL, PRIMARY KEY(id)) TYPE=InnoDB;";
		$createEavDatetimes = $db->execute($sqlCreateCommand);
		
		$sqlCreateCommand = "CREATE TABLE eav_files (id CHAR(36) NOT NULL, value BLOB NOT NULL, PRIMARY KEY(id)) TYPE=InnoDB;";
		$createEavFiles = $db->execute($sqlCreateCommand);

		return (($createOdsUsers and $createDatatypes and $createAttributes and $createEavData and $createEavIntegers and $createEavText and $createEavVarchars and $createEavDatetimes and $createEavFiles) !== false);		
	}
	
	function drop()
	{
		$db = ConnectionManager::getDataSource('test_suite');

		$sqlDropCommand = "DROP TABLE IF EXISTS ods_users;";
		$dropOdsUsers = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS datatypes;";
		$dropDatatypes = $db->execute($sqlDropCommand);

		$sqlDropCommand = "DROP TABLE IF EXISTS attributes;";
		$dropAttributes = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS eav_data;";
		$dropEavData = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS eav_integers;";
		$dropEavIntegers = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS eav_text;";
		$dropEavText = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS eav_varchars;";
		$dropEavVarchars = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS eav_datetimes;";
		$dropEavDatetimes = $db->execute($sqlDropCommand);
		
		$sqlDropCommand = "DROP TABLE IF EXISTS eav_files;";
		$dropEavFiles = $db->execute($sqlDropCommand);
		
		return (($dropOdsUsers and $dropDatatypes and $dropAttributes and $dropEavData and $dropEavIntegers and $dropEavText and $dropEavVarchars and $dropEavDatetimes and $dropEavFiles) !== false);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * Test beforeFind callback
	 *
	 * @access public
	 */
/*
	function testBeforeFind() {
		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array());
		$expected = array('conditions' => array('DeletableArticle.deleted !=' => '1'));
		$this->assertEqual($result, $expected);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => array('DeletableArticle.deleted' => 0)));
		$expected = array('conditions' => array('DeletableArticle.deleted' => 0));
		$this->assertEqual($result, $expected);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => array('DeletableArticle.deleted' => array(0, 1))));
		$expected = array('conditions' => array('DeletableArticle.deleted' => array(0, 1)));
		$this->assertEqual($result, $expected);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => array('DeletableArticle.id' => '> 0', 'or' => array('DeletableArticle.title' => 'Title', 'DeletableArticle.id' => '5'))));
		$expected = array('conditions' => array('DeletableArticle.id' => '> 0', 'or' => array('DeletableArticle.title' => 'Title', 'DeletableArticle.id' => '5'), 'DeletableArticle.deleted !=' => '1'));
		$this->assertEqual($result, $expected);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => array('DeletableArticle.id' => '> 0', 'or' => array('DeletableArticle.title' => 'Title', 'DeletableArticle.id' => '5'), 'deleted' => 1)));
		$expected = array('conditions' => array('DeletableArticle.id' => '> 0', 'or' => array('DeletableArticle.title' => 'Title', 'DeletableArticle.id' => '5'), 'deleted' => 1));
		$this->assertEqual($result, $expected);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => 'id=1'));
		$this->assertPattern('/^' . preg_quote($Db->name('DeletableArticle') . '.' . $Db->name('deleted')) . '\s*!=\s*1\s+AND\s+id\s*=\s*1$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => '1=1 LEFT JOIN table ON (table.column=DeletableArticle.id)'));
		$this->assertPattern('/^' . preg_quote($Db->name('DeletableArticle') . '.' . $Db->name('deleted')) . '\s*!=\s*1\s+AND\s+1\s*=\s*1\s+LEFT JOIN table ON ' . preg_quote('(table.column=DeletableArticle.id)') . '$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => 'deleted=1'));
		$this->assertPattern('/^' . preg_quote('deleted') . '\s*=\s*1$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => 'deleted  = 1'));
		$this->assertPattern('/^' . preg_quote('deleted') . '\s*=\s*1$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => $Db->name('deleted') . '=1'));
		$this->assertPattern('/^' . preg_quote($Db->name('deleted')) . '\s*=\s*1$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => 'id > 0 AND deleted =1'));
		$this->assertPattern('/^id > 0 AND deleted\s*=\s*1$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => 'mydeleted=1'));
		$this->assertPattern('/^' . preg_quote($Db->name('DeletableArticle') . '.' . $Db->name('deleted')) . '\s*!=\s*1\s+AND\s+mydeleted\s*=\s*1$/', $result['conditions']);

		$result = $SoftDeletable->beforeFind($this->DeletableArticle, array('conditions' => 'title = \'record is not deleted\''));
		$this->assertPattern('/^' . preg_quote($Db->name('DeletableArticle') . '.' . $Db->name('deleted')) . '\s*!=\s*1\s+AND\s+title\s*=\s*\'' . preg_quote('record is not deleted') . '\'$/', $result['conditions']);

		unset($OrigamiDataStore);
	}
*/
	/**
	 * Test soft delete
	 *
	 * @access public
	 */
/*
	function testFind() {
		$this->DeletableArticle->delete(2);
		$this->DeletableArticle->delete(3);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => array('DeletableArticle.deleted' => 0), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => array('DeletableArticle.deleted' => 1), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => array('DeletableArticle.deleted' => array(0, 1)), 'fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article', 'deleted' => 1
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 1
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->enableSoftDeletable(false);
		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article', 'deleted' => 1
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 1
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->enableSoftDeletable(true);
	}
*/

	/**
	 * Test soft delete
	 *
	 * @access public
	 */
/*
	function testFindStringConditions() {		
		$Db =& ConnectionManager::getDataSource($this->DeletableArticle->useDbConfig);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'title LIKE ' . $Db->value('%Article%'), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'id > 0 AND title LIKE ' . $Db->value('%ir%'), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->delete(2);
		$this->DeletableArticle->delete(3);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'title LIKE ' . $Db->value('%Article%'), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'title LIKE ' . $Db->value('%Article%') . ' AND deleted=0', 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'DeletableArticle.deleted = 0 AND title LIKE ' . $Db->value('%Article%'), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'title LIKE ' . $Db->value('%Article%') . ' AND deleted=1', 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'DeletableArticle.deleted = 1 AND title LIKE ' . $Db->value('%Article%'), 'fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'title LIKE ' . $Db->value('%Article%') . ' AND (deleted=0 OR deleted = 1)', 'fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article', 'deleted' => 1
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 1
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('conditions' => 'title LIKE ' . $Db->value('%ir%') . ' AND DeletableArticle.deleted IN (0,1)', 'fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 1
			))
		);
		$this->assertEqual($result, $expected);
	}
*/
	/**
	 * Test soft delete
	 *
	 * @access public
	 */
/*
	function testSoftDelete() {
		$this->DeletableArticle->delete(2);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->enableSoftDeletable(false);
		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article', 'deleted' => 1
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 0
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->enableSoftDeletable(true);
	}
*/
	
	/**
	 * Test hard delete
	 *
	 * @access public
	 */
/*
	function testHardDelete() {
		$result = $this->DeletableArticle->hardDelete(2);
		$this->assertTrue($result);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->enableSoftDeletable(false);
		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 0
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->enableSoftDeletable(true);
	}
*/
	/**
	 * Test soft delete
	 *
	 * @access public
	 */
/*
	function testPurge() {
		$this->DeletableArticle->delete(2);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->enableSoftDeletable(false);
		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article', 'deleted' => 1
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 0
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->enableSoftDeletable(true);

		$this->DeletableArticle->delete(3);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->enableSoftDeletable(false);
		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article', 'deleted' => 1
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article', 'deleted' => 1
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->enableSoftDeletable(true);

		$result = $this->DeletableArticle->purge();
		$this->assertTrue($result);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->enableSoftDeletable(false);
		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title', 'deleted')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article', 'deleted' => 0
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->enableSoftDeletable(true);
	}
*/
	/**
	 * Test undelete
	 *
	 * @access public
	 */
/*
	function testUndelete() {
		$this->DeletableArticle->delete(2);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$result = $this->DeletableArticle->undelete(2);
		$this->assertTrue($result);

		$this->DeletableArticle->unbindModel(array('hasMany' => array('DeletableComment')));
		$result = $this->DeletableArticle->find('all', array('fields' => array('id', 'title')));
		$expected = array(
			array('DeletableArticle' => array(
				'id' => 1, 'title' => 'First Article'
			)),
			array('DeletableArticle' => array(
				'id' => 2, 'title' => 'Second Article'
			)),
			array('DeletableArticle' => array(
				'id' => 3, 'title' => 'Third Article'
			))
		);
		$this->assertEqual($result, $expected);
	}
*/
	/**
	 * Test recursivity when soft deleting records
	 *
	 * @access public
	 */
/*
	function testRecursive() {
		$result = $this->DeletableArticle->DeletableComment->find('all', array('fields' => array('id', 'comment')));
		$expected = array(
			array('DeletableComment' => array(
				'id' => 1, 'comment' => 'First Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 2, 'comment' => 'Second Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 3, 'comment' => 'Third Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 4, 'comment' => 'Fourth Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 5, 'comment' => 'First Comment for Second Article'
			)),
			array('DeletableComment' => array(
				'id' => 6, 'comment' => 'Second Comment for Second Article'
			)),
			array('DeletableComment' => array(
				'id' => 7, 'comment' => 'First Comment for Third Article'
			)),
			array('DeletableComment' => array(
				'id' => 8, 'comment' => 'Second Comment for Third Article'
			)),
			array('DeletableComment' => array(
				'id' => 9, 'comment' => 'Third Comment for Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->delete(2);

		$result = $this->DeletableArticle->DeletableComment->find('all', array('fields' => array('id', 'comment')));
		$expected = array(
			array('DeletableComment' => array(
				'id' => 1, 'comment' => 'First Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 2, 'comment' => 'Second Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 3, 'comment' => 'Third Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 4, 'comment' => 'Fourth Comment for First Article'
			)),
			array('DeletableComment' => array(
				'id' => 7, 'comment' => 'First Comment for Third Article'
			)),
			array('DeletableComment' => array(
				'id' => 8, 'comment' => 'Second Comment for Third Article'
			)),
			array('DeletableComment' => array(
				'id' => 9, 'comment' => 'Third Comment for Third Article'
			))
		);
		$this->assertEqual($result, $expected);

		$this->DeletableArticle->DeletableComment->enableSoftDeletable(false);
		$result = $this->DeletableArticle->DeletableComment->find('all', array('fields' => array('id', 'comment', 'deleted')));
		$expected = array(
			array('DeletableComment' => array(
				'id' => 1, 'comment' => 'First Comment for First Article', 'deleted' => 0
			)),
			array('DeletableComment' => array(
				'id' => 2, 'comment' => 'Second Comment for First Article', 'deleted' => 0
			)),
			array('DeletableComment' => array(
				'id' => 3, 'comment' => 'Third Comment for First Article', 'deleted' => 0
			)),
			array('DeletableComment' => array(
				'id' => 4, 'comment' => 'Fourth Comment for First Article', 'deleted' => 0
			)),
			array('DeletableComment' => array(
				'id' => 5, 'comment' => 'First Comment for Second Article', 'deleted' => 1
			)),
			array('DeletableComment' => array(
				'id' => 6, 'comment' => 'Second Comment for Second Article', 'deleted' => 1
			)),
			array('DeletableComment' => array(
				'id' => 7, 'comment' => 'First Comment for Third Article', 'deleted' => 0
			)),
			array('DeletableComment' => array(
				'id' => 8, 'comment' => 'Second Comment for Third Article', 'deleted' => 0
			)),
			array('DeletableComment' => array(
				'id' => 9, 'comment' => 'Third Comment for Third Article', 'deleted' => 0
			))
		);
		$this->assertEqual($result, $expected);
		$this->DeletableArticle->DeletableComment->enableSoftDeletable(true);
	}
*/
}

?>