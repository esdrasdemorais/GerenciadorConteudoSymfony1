<?php

class InoxtarProductTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InoxtarProductTagMapBuilder';

	
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
		$tMap->setPhpName('InoxtarProductTag');

		$tMap->setUseIdGenerator(true);
	
		$tMap->addPrimaryKey('id', 'id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('pr_id', 'prId', 'int', CreoleTypes::INTEGER, 'pr_inox_star_', 'id', true, null);

		$tMap->addForeignKey('td_id', 'tgId', 'int', CreoleTypes::INTEGER, 'pr_tg_inox_star_', 'id', true, null);
	}
	
}