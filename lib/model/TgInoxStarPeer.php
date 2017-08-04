<?php

/**
 * Subclass for performing query and update operations on the 'tg_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TgInoxStarPeer extends BaseTgInoxStarPeer
{
	const _keyPrefix = 'tg_';

	public static function getWithPager($page)
	{
	    settype($page, "integer");

	    $criteria = new Criteria();
	    $criteria->addAscendingOrderByColumn(TgInoxStarPeer::NAM);
	    $pager = new sfPropelPager('TgInoxStar', 10);
	    $pager->setCriteria($criteria);
	    $pager->setPage($page);
	    $pager->init();
	    
	    return $pager;
	}

	public static function getAllTags()
	{
		$criteria = new Criteria();
		$criteria->add(TgInoxStarPeer::EN, '1');
	    	$criteria->addAscendingOrderByColumn(TgInoxStarPeer::NAM);
		$tags = static::doSelect($criteria);
		
		$sfMemcacheCache = MemcacheSingleton::getInstance();
		$keys = array();
		foreach ($tags as $tag) {
			$key = static::_keyPrefix . $tag->getId();
			
			if(!$sfMemcacheCache->get($key)) {
				$sfMemcacheCache->set(
					$key, serialize($tag)
				);
			}

			$keys[] = $key;
		}
		
		unset($tags);
		return $keys;
	}

	public static function getAllTagsSerialized($keys = null)
	{
		$sfMemcacheCache = MemcacheSingleton::getInstance();
		if (is_null($keys)) {
			$keys = static::getAllIds();
		}
		
		$serializedObjs = $sfMemcacheCache->getMany($keys); 
		if (count($serializedObjs) === 0) {
			$keys = static::getAllTags();
		}
		
		return $sfMemcacheCache->getMany($keys);
	}

	public static function getAllIds()
	{
		$connection = Propel::getConnection();
		$query = "SELECT " .  TgInoxStarPeer::ID . " AS id " . 
			 "FROM " . TgInoxStarPeer::TABLE_NAME . " " .
			 "WHERE " . TgInoxStarPeer::EN . " = ?";
		$statement = $connection->prepareStatement($query);
		$statement->setString(1, '1');
		$resultset = $statement->executeQuery();
	
		$keys = array();
		while ($resultset->next()) {
			$keys[] = static::_keyPrefix . $resultset->getInt("id");
		}

		return $keys;
	}

	public static function getAllTagsUnserialized($keys)
	{
		$serializedObjs = static::getAllTagsSerialized($keys);
		
		$tags = array();
		foreach ($serializedObjs as $key => $object) {
			$tags[$key] = unserialize($object);
		}
		
		return $tags;
	}

	public static function getLike($tag)
	{
	 	$criteria = new Criteria();
		$criteria->add(TgInoxStarPeer::NAM, '%' . $tag . '%', Criteria::LIKE);
		$criteria->addAscendingOrderByColumn(TgInoxStarPeer::NAM);
		
		return static::doSelect($criteria);
	}
}
