<?php



class UsInoxStarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UsInoxStarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('us_inox_star_');
		$tMap->setPhpName('UsInoxStar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAM', 'Nam', 'string', CreoleTypes::VARCHAR, true, 170);

		$tMap->addColumn('PAS', 'Pas', 'string', CreoleTypes::VARCHAR, true, 70);

		$tMap->addColumn('EN', 'En', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('ADMIN', 'Admin', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('SAL', 'Sal', 'string', CreoleTypes::VARCHAR, true, 70);

	} 
} 