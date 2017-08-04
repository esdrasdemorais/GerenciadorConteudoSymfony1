<?php



class PrCtInoxStarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PrCtInoxStarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pr_ct_inox_star_');
		$tMap->setPhpName('PrCtInoxStar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('PR_ID', 'PrId', 'int', CreoleTypes::INTEGER, 'pr_inox_star_', 'ID', true, null);

		$tMap->addForeignKey('CT_ID', 'CtId', 'int', CreoleTypes::INTEGER, 'ct_inox_star_', 'ID', true, null);

	} 
} 