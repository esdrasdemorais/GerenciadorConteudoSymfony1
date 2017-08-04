<?php

class InoxtarProductMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InoxtarProductMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pr_inox_star_');
		$tMap->setPhpName('InoxtarProduct');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('id', 'id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('us_id', 'usId', 'int', CreoleTypes::INTEGER, 'us_inox_star_', 'id', true, null);

		$tMap->addForeignKey('ct_id', 'ctId', 'int', CreoleTypes::INTEGER, 'ct_inox_star_', 'id', true, null);

		$tMap->addColumn('nam', 'nam', 'string', CreoleTypes::VARCHAR, true, 255);
		
		$tMap->addColumn('price', 'price', 'string', CreoleTypes::FLOAT, true, 70);

		$tMap->addColumn('en', 'en', 'string', CreoleTypes::VARCHAR, true, 1);
	} 
} 

