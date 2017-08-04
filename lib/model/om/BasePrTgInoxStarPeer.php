<?php


abstract class BasePrTgInoxStarPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pr_tg_inox_star_';

	
	const CLASS_DEFAULT = 'lib.model.PrTgInoxStar';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pr_tg_inox_star_.ID';

	
	const PR_ID = 'pr_tg_inox_star_.PR_ID';

	
	const TG_ID = 'pr_tg_inox_star_.TG_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PrId', 'TgId', ),
		BasePeer::TYPE_COLNAME => array (PrTgInoxStarPeer::ID, PrTgInoxStarPeer::PR_ID, PrTgInoxStarPeer::TG_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'pr_id', 'tg_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PrId' => 1, 'TgId' => 2, ),
		BasePeer::TYPE_COLNAME => array (PrTgInoxStarPeer::ID => 0, PrTgInoxStarPeer::PR_ID => 1, PrTgInoxStarPeer::TG_ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'pr_id' => 1, 'tg_id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.PrTgInoxStarMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PrTgInoxStarPeer::getTableMap();
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
		return str_replace(PrTgInoxStarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PrTgInoxStarPeer::ID);

		$criteria->addSelectColumn(PrTgInoxStarPeer::PR_ID);

		$criteria->addSelectColumn(PrTgInoxStarPeer::TG_ID);

	}

	const COUNT = 'COUNT(pr_tg_inox_star_.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pr_tg_inox_star_.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PrTgInoxStarPeer::doSelectRS($criteria, $con);
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
		$objects = PrTgInoxStarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PrTgInoxStarPeer::populateObjects(PrTgInoxStarPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doSelectRS:doSelectRS') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PrTgInoxStarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PrTgInoxStarPeer::getOMClass();
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
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$rs = PrTgInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTgInoxStar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);

		$rs = PrTgInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPrInoxStar(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrTgInoxStarPeer::addSelectColumns($c);
		$startcol = (PrTgInoxStarPeer::NUM_COLUMNS - PrTgInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PrInoxStarPeer::addSelectColumns($c);

		$c->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrTgInoxStarPeer::getOMClass();

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
										$temp_obj2->addPrTgInoxStar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPrTgInoxStars();
				$obj2->addPrTgInoxStar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTgInoxStar(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doSelectJoin:doSelectJoin') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrTgInoxStarPeer::addSelectColumns($c);
		$startcol = (PrTgInoxStarPeer::NUM_COLUMNS - PrTgInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TgInoxStarPeer::addSelectColumns($c);

		$c->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrTgInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TgInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTgInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPrTgInoxStar($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPrTgInoxStars();
				$obj2->addPrTgInoxStar($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$criteria->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);

		$rs = PrTgInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doSelectJoinAll:doSelectJoinAll') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $c, $con);
    }


		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrTgInoxStarPeer::addSelectColumns($c);
		$startcol2 = (PrTgInoxStarPeer::NUM_COLUMNS - PrTgInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PrInoxStarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PrInoxStarPeer::NUM_COLUMNS;

		TgInoxStarPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TgInoxStarPeer::NUM_COLUMNS;

		$c->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$c->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrTgInoxStarPeer::getOMClass();


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
					$temp_obj2->addPrTgInoxStar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPrTgInoxStars();
				$obj2->addPrTgInoxStar($obj1);
			}


					
			$omClass = TgInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTgInoxStar(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPrTgInoxStar($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initPrTgInoxStars();
				$obj3->addPrTgInoxStar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptPrInoxStar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);

		$rs = PrTgInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTgInoxStar(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PrTgInoxStarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);

		$rs = PrTgInoxStarPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptPrInoxStar(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrTgInoxStarPeer::addSelectColumns($c);
		$startcol2 = (PrTgInoxStarPeer::NUM_COLUMNS - PrTgInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TgInoxStarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TgInoxStarPeer::NUM_COLUMNS;

		$c->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrTgInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TgInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTgInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPrTgInoxStar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPrTgInoxStars();
				$obj2->addPrTgInoxStar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTgInoxStar(Criteria $c, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doSelectJoinAllExcept:doSelectJoinAllExcept') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $c, $con);
    }


		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PrTgInoxStarPeer::addSelectColumns($c);
		$startcol2 = (PrTgInoxStarPeer::NUM_COLUMNS - PrTgInoxStarPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PrInoxStarPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PrInoxStarPeer::NUM_COLUMNS;

		$c->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PrTgInoxStarPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PrInoxStarPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPrInoxStar(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPrTgInoxStar($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPrTgInoxStars();
				$obj2->addPrTgInoxStar($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('pr_id', 'tg_id'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return PrTgInoxStarPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePrTgInoxStarPeer', $values, $con);
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

		$criteria->remove(PrTgInoxStarPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasePrTgInoxStarPeer', $values, $con);
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
			$comparison = $criteria->getComparison(PrTgInoxStarPeer::ID);
			$selectCriteria->add(PrTgInoxStarPeer::ID, $criteria->remove(PrTgInoxStarPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasePrTgInoxStarPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasePrTgInoxStarPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(PrTgInoxStarPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PrTgInoxStarPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PrTgInoxStar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PrTgInoxStarPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PrTgInoxStar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PrTgInoxStarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PrTgInoxStarPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PrTgInoxStarPeer::DATABASE_NAME, PrTgInoxStarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PrTgInoxStarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PrTgInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrTgInoxStarPeer::ID, $pk);


		$v = PrTgInoxStarPeer::doSelect($criteria, $con);

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
			$criteria->add(PrTgInoxStarPeer::ID, $pks, Criteria::IN);
			$objs = PrTgInoxStarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePrTgInoxStarPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.PrTgInoxStarMapBuilder');
}
