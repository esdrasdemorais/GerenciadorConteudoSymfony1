<?php



class InoxtarProductPhotoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InoxtarProductPhotoMapBuilder';

	
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
		$tMap->setPhpName('InoxtarProductPhoto');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('id', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('pr_id', 'prId', 'int', CreoleTypes::INTEGER, 'pr_inox_star_', 'id', true, null);

		$tMap->addColumn('nam', 'nam', 'string', CreoleTypes::VARCHAR, true, 170);
	
		$tMap->addColumn('ext', 'ext', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('typ', 'typ', 'string', CreoleTypes::VARCHAR, true, 10);
	} 
}
