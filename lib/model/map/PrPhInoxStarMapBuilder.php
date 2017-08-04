<?php



class PrPhInoxStarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PrPhInoxStarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pr_ph_inox_star_');
		$tMap->setPhpName('PrPhInoxStar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('PR_ID', 'PrId', 'int', CreoleTypes::INTEGER, 'pr_inox_star_', 'ID', true, null);

		$tMap->addColumn('NAM', 'Nam', 'string', CreoleTypes::VARCHAR, true, 170);

		$tMap->addColumn('EXT', 'Ext', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('TYP', 'Typ', 'string', CreoleTypes::VARCHAR, true, 10);

	} 
} 