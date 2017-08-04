<?php


abstract class BasePrPhInoxStarPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pr_ph_inox_star_';

	
	const CLASS_DEFAULT = 'lib.model.PrPhInoxStar';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pr_ph_inox_star_.ID';

	
	const PR_ID = 'pr_ph_inox_star_.PR_ID';

	
	const NAM = 'pr_ph_inox_star_.NAM';

	
	const EXT = 'pr_ph_inox_star_.EXT';

	
	const TYP = 'pr_ph_inox_star_.TYP';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PrId', 'Nam', 'Ext', 'Typ', ),
		BasePeer::TYPE_COLNAME => array (PrPhInoxStarPeer::ID, PrPhInoxStarPeer::PR_ID, PrPhInoxStarPeer::NAM, PrPhInoxStarPeer::EXT, PrPhInoxStarPeer::TYP, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'pr_id', 'nam', 'ext', 'typ', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PrId' => 1, 'Nam' => 2, 'Ext' => 3, 'Typ' => 4, ),
		BasePeer::TYPE_COLNAME => array (PrPhInoxStarPeer::ID => 0, PrPhInoxStarPeer::PR_ID => 1, PrPhInoxStarPeer::NAM => 2, PrPhInoxStarPeer::EXT => 3, PrPhInoxStarPeer::TYP => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'pr_id' => 1, 'nam' => 2, 'ext' => 3, 'typ' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.PrPhInoxStarMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PrPhInoxStarPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(PrPhInoxStarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PrPhInoxStarPeer::ID);

		$criteria->addSelectColumn(PrPhInoxStarPeer::PR_ID);

		$criteria->addSelectColumn(PrPhInoxStarPeer::NAM);

		$criteria->addSelectColumn(PrPhInoxStarPeer::EXT);

		$criteria->addSelectColumn(PrPhInoxStarPeer::TYP);

	}

	const COUNT = 'COUNT(pr_ph_inox_star_.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pr_ph_inox_star_.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrPhInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrPhInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PrPhInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PrPhInoxStarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PrPhInoxStarPeer::populateObjects(PrPhInoxStarPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasePrPhInoxStarPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PrPhInoxStarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PrPhInoxStarPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinPrInoxStar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrPhInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrPhInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrPhInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$rs = PrPhInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPrInoxStar(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePrPhInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrPhInoxStarPeer::addSelectColumns($c);
		$startcol = (PrPhInoxStarPeer::NUM_COLUMNS - PrPhInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PrInoxStarPeer::addSelectColumns($c);

		$c->addJoin(PrPhInoxStarPeer::PR_ID, PrInoxStarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrPhInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PrInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPrInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPrPhInoxStar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPrPhInoxStars();
				$obj2->addPrPhInoxStar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrPhInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrPhInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrPhInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$rs = PrPhInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasePrPhInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrPhInoxStarPeer::addSelectColumns($c);
		$startcol2 = (PrPhInoxStarPeer::NUM_COLUMNS - PrPhInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PrInoxStarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PrInoxStarPeer::NUM_COLUMNS;

		$c->addJoin(PrPhInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrPhInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = PrInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPrInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPrPhInoxStar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPrPhInoxStars();
				$obj2->addPrPhInoxStar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('nam'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return PrPhInoxStarPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePrPhInoxStarPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PrPhInoxStarPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasePrPhInoxStarPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePrPhInoxStarPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(PrPhInoxStarPeer::ID);
			$selectCriteria->add(PrPhInoxStarPeer::ID, $criteria->remove(PrPhInoxStarPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasePrPhInoxStarPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasePrPhInoxStarPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(PrPhInoxStarPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PrPhInoxStarPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PrPhInoxStar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PrPhInoxStarPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(PrPhInoxStar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PrPhInoxStarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PrPhInoxStarPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(PrPhInoxStarPeer::DATABASE_NAME, PrPhInoxStarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PrPhInoxStarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(PrPhInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrPhInoxStarPeer::ID, $pk);


		$v = PrPhInoxStarPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(PrPhInoxStarPeer::ID, $pks, Criteria::IN);
			$objs = PrPhInoxStarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePrPhInoxStarPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.PrPhInoxStarMapBuilder');
}
