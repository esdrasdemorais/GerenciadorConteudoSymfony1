<?php


abstract class BasePrInoxStarPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pr_inox_star_';

	
	const CLASS_DEFAULT = 'lib.model.PrInoxStar';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pr_inox_star_.ID';

	
	const NAM = 'pr_inox_star_.NAM';

	
	const PRICE = 'pr_inox_star_.PRICE';

	
	const US_ID = 'pr_inox_star_.US_ID';

	
	const EN = 'pr_inox_star_.EN';

	
	const DESCR = 'pr_inox_star_.DESCR';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nam', 'Price', 'UsId', 'En', 'Descr', ),
		BasePeer::TYPE_COLNAME => array (PrInoxStarPeer::ID, PrInoxStarPeer::NAM, PrInoxStarPeer::PRICE, PrInoxStarPeer::US_ID, PrInoxStarPeer::EN, PrInoxStarPeer::DESCR, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nam', 'price', 'us_id', 'en', 'descr', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nam' => 1, 'Price' => 2, 'UsId' => 3, 'En' => 4, 'Descr' => 5, ),
		BasePeer::TYPE_COLNAME => array (PrInoxStarPeer::ID => 0, PrInoxStarPeer::NAM => 1, PrInoxStarPeer::PRICE => 2, PrInoxStarPeer::US_ID => 3, PrInoxStarPeer::EN => 4, PrInoxStarPeer::DESCR => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nam' => 1, 'price' => 2, 'us_id' => 3, 'en' => 4, 'descr' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.PrInoxStarMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PrInoxStarPeer::getTableMap();
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
		return str_replace(PrInoxStarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PrInoxStarPeer::ID);

		$criteria->addSelectColumn(PrInoxStarPeer::NAM);

		$criteria->addSelectColumn(PrInoxStarPeer::PRICE);

		$criteria->addSelectColumn(PrInoxStarPeer::US_ID);

		$criteria->addSelectColumn(PrInoxStarPeer::EN);

		$criteria->addSelectColumn(PrInoxStarPeer::DESCR);

	}

	const COUNT = 'COUNT(pr_inox_star_.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pr_inox_star_.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PrInoxStarPeer::doSelectRS($criteria, $con);
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
		$objects = PrInoxStarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PrInoxStarPeer::populateObjects(PrInoxStarPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasePrInoxStarPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PrInoxStarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PrInoxStarPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinUsInoxStar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrInoxStarPeer::US_ID, UsInoxStarPeer::ID);

		$rs = PrInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinUsInoxStar(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePrInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrInoxStarPeer::addSelectColumns($c);
		$startcol = (PrInoxStarPeer::NUM_COLUMNS - PrInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsInoxStarPeer::addSelectColumns($c);

		$c->addJoin(PrInoxStarPeer::US_ID, UsInoxStarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUsInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPrInoxStar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPrInoxStars();
				$obj2->addPrInoxStar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrInoxStarPeer::US_ID, UsInoxStarPeer::ID);

		$rs = PrInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasePrInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrInoxStarPeer::addSelectColumns($c);
		$startcol2 = (PrInoxStarPeer::NUM_COLUMNS - PrInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UsInoxStarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UsInoxStarPeer::NUM_COLUMNS;

		$c->addJoin(PrInoxStarPeer::US_ID, UsInoxStarPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = UsInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUsInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPrInoxStar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPrInoxStars();
				$obj2->addPrInoxStar($obj1);
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
		return PrInoxStarPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePrInoxStarPeer', $values, $con);
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

		$criteria->remove(PrInoxStarPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasePrInoxStarPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePrInoxStarPeer', $values, $con);
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
			$comparison = $criteria->getComparison(PrInoxStarPeer::ID);
			$selectCriteria->add(PrInoxStarPeer::ID, $criteria->remove(PrInoxStarPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasePrInoxStarPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasePrInoxStarPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(PrInoxStarPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PrInoxStarPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PrInoxStar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PrInoxStarPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PrInoxStar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PrInoxStarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PrInoxStarPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PrInoxStarPeer::DATABASE_NAME, PrInoxStarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PrInoxStarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PrInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrInoxStarPeer::ID, $pk);


		$v = PrInoxStarPeer::doSelect($criteria, $con);

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
			$criteria->add(PrInoxStarPeer::ID, $pks, Criteria::IN);
			$objs = PrInoxStarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePrInoxStarPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.PrInoxStarMapBuilder');
}
