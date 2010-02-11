<?php 
/* SVN FILE: $Id$ */
/* Datatype Fixture generated on: 2008-12-19 16:12:36 : 1229722416*/

class DatatypeFixture extends CakeTestFixture {
	var $name = 'Datatype';
//  We cannot import our datatypes table because CakeTest has real issues with ENUM columns
//	var $import = array('table' => 'datatypes', 'records' => true);
	var $table = 'datatypes';	
	var $fields = array();	// fields is defined to keep me from having to implement a large number of functions
							// we are overriding the fields behavior by implementing our own create and drop functions
	var $records = array(array(
								'id'  => '494295bc-af58-4ac6-9849-0dae7f000101',
								'name'  => 'Default',
								'validation_proc'  => null,
								'format'  => null,
								'table' => 'VARCHAR'
								),
							array(
								'id'  => '49628f13-f940-46a6-b603-015ac0a80172',
								'name'  => 'Date',
								'validation_proc'  => null,
								'format'  => null,
								'table' => 'DATETIME'
								),
							array(
								'id'  => 'd2b851a4-1da8-102c-9eca-001aa0c930f8',
								'name'  => 'Serialized',
								'validation_proc'  => null,
								'format'  => null,
								'table' => 'TEXT'
								)
						);
	
	// CakeTest has real issues with ENUM columns.  So we provide custom create and drop functions for the datatype
	// table.  The datatype table also 'defines' which 'type' tables need to exist, so we create those tables
	// as part of this process.
	function create(&$db)
	{
		$sqlCreateCommand = "CREATE TABLE `datatypes` (`id` CHAR(36) NOT NULL, `name` VARCHAR(255) NOT NULL, `validation_proc` TEXT NULL, `format` VARCHAR(255) NULL, `table` ENUM('VARCHAR','INTEGER','DATETIME','TEXT','FILE') NOT NULL DEFAULT 'VARCHAR', PRIMARY KEY(`id`)) TYPE=InnoDB;";
		$createDatatypes = $db->execute($sqlCreateCommand);

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

		return (($createDatatypes and $createEavIntegers and $createEavText and $createEavVarchars and $createEavDatetimes and $createEavFiles) !== false);
	}
	
	function drop(&$db)
	{
		$sqlDropCommand = "DROP TABLE IF EXISTS datatypes;";
		$dropDatatypes = $db->execute($sqlDropCommand);
		 
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
		
		return (($dropDatatypes and $dropEavIntegers and $dropEavText and $dropEavVarchars and $dropEavDatetimes and $dropEavFiles) !== false);
	}
}
?>