<?php



class PrInoxStarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PrInoxStarMapBuilder';

	
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
		$tMap->setPhpName('PrInoxStar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAM', 'Nam', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('PRICE', 'Price', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('US_ID', 'UsId', 'int', CreoleTypes::INTEGER, 'us_inox_star_', 'ID', true, null);

		$tMap->addColumn('EN', 'En', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('DESCR', 'Descr', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 