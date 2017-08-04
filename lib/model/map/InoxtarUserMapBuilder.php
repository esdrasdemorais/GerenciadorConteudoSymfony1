<?php

class InoxtarUserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InoxtarUserMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('us_inox_tar_');
		$tMap->setPhpName('InoxtarUser');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('id', 'id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('nam', 'nam', 'string', CreoleTypes::VARCHAR, true, 170);
		
		$tMap->addColumn('pas', 'pas', 'string', CreoleTypes::VARCHAR, true, 70);

		$tMap->addColumn('sal', 'sal', 'string', CreoleTypes::VARCHAR, true, 70);
		
		$tMap->addColumn('en', 'en', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('admin', 'admin', 'string', CreoleTypes::VARCHAR, true, 1);
	}
} 
