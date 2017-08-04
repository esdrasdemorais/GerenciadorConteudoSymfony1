<?php

/**
 * Subclass for performing query and update operations on the 'pr_ct_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrCtInoxStarPeer extends BasePrCtInoxStarPeer
{
	public static function getCategoriesByPrId($prId)
	{
		settype($prId, "integer");
	
		$criteria = new Criteria();
		$criteria->addJoin(PrCtInoxStarPeer::CT_ID, CtInoxStarPeer::ID);
		$criteria->add(static::PR_ID, $prId);
		return CtInoxStarPeer::doSelect($criteria);
	}

	public static function getByPrId($prId)
	{
		settype($prId, "integer");
	
		$criteria = new Criteria();
		$criteria->addJoin(PrCtInoxStarPeer::CT_ID, CtInoxStarPeer::ID);
		$criteria->add(static::PR_ID, $prId);
		return static::doSelect($criteria);
	}

}
