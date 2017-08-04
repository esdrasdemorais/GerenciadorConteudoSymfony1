<?php

class InoxtarCategoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InoxtarCategoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ct_inox_tar_');
		$tMap->setPhpName('InoxtarCategory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('id', 'id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('nam', 'nam', 'string', CreoleTypes::VARCHAR, true, 255);
		
		$tMap->addColumn('en', 'en', 'string', CreoleTypes::VARCHAR, true, 1);
	}
} 
