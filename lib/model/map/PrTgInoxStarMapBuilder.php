<?php



class PrTgInoxStarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PrTgInoxStarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pr_tg_inox_star_');
		$tMap->setPhpName('PrTgInoxStar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('PR_ID', 'PrId', 'int', CreoleTypes::INTEGER, 'pr_inox_star_', 'ID', true, null);

		$tMap->addForeignKey('TG_ID', 'TgId', 'int', CreoleTypes::INTEGER, 'tg_inox_star_', 'ID', true, null);

	} 
} 