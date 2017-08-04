<?php



class TgInoxStarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TgInoxStarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tg_inox_star_');
		$tMap->setPhpName('TgInoxStar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAM', 'Nam', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('EN', 'En', 'string', CreoleTypes::CHAR, false, 1);

	} 
} 