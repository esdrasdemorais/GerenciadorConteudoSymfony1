<?php

/**
 * Subclass for performing query and update operations on the 'ct_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CtInoxStarPeer extends BaseCtInoxStarPeer
{
	const _keyPrefix = 'ct_';

	public static function getWithPager($page = 1)
	{
	    settype($page, "integer");

	    $criteria = new Criteria();
	    $criteria->addAscendingOrderByColumn(CtInoxStarPeer::NAM);
	    $pager = new sfPropelPager("CtInoxStar", 10);
	    $pager->setCriteria($criteria);
	    $pager->setPage($page);
	    $pager->init();
	    
	    return $pager;
	}

	public static function getAllCategories()
	{
		$criteria = new Criteria();
		$criteria->add(CtInoxStarPeer::EN, '1');
		$criteria->add(CtInoxStarPeer::PAR, NULL);
		$categories = static::doSelect($criteria);
	
		$sfMemcacheCache = MemcacheSingleton::getInstance();
		$keys = array();
		foreach ($categories as $category) {
			$key = static::_keyPrefix . $category->getId();
			
			if(!$sfMemcacheCache->get($key)) {
				$sfMemcacheCache->set(
					$key, serialize($category)
				);
			}

			$keys[] = $key;
		}

		unset($categories);
		return $keys;
	}

	public static function getAllCategoriesSerialized($keys = null)
	{
		$sfMemcacheCache = MemcacheSingleton::getInstance();
		if (is_null($keys)) {
			$keys = static::getAllIds();
		}
		
		$serializedObjs = $sfMemcacheCache->getMany($keys); 
		if (count($serializedObjs) === 0) {
			$keys = static::getAllCategories();
		}
		
		return $sfMemcacheCache->getMany($keys);
	}

	public static function getAllIds()
	{
		$connection = Propel::getConnection();
		$query = "SELECT " .  CtInoxStarPeer::ID . " AS id " . 
			 "FROM " . CtInoxStarPeer::TABLE_NAME . " " .
			 "WHERE " . CtInoxStarPeer::EN . " = ?";
		$statement = $connection->prepareStatement($query);
		$statement->setString(1, '1');
		$resultset = $statement->executeQuery();
	
		$keys = array();
		while ($resultset->next()) {
			$keys[] = static::_keyPrefix . $resultset->getInt("id");
		}

		return $keys;
	}

	public static function getAllCategoriesUnserialized($keys)
	{
		$serializedObjs = static::getAllCategoriesSerialized($keys);
		
		$categories = array();
		foreach ($serializedObjs as $key => $object) {
			$categories[$key] = unserialize($object);
		}
		
		return $categories;				
	}
}
