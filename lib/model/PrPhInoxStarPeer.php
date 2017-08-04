<?php

/**
 * Subclass for performing query and update operations on the 'pr_ph_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrPhInoxStarPeer extends BasePrPhInoxStarPeer
{
	public static function getByPrId($prId)
	{
		settype($prId, "integer");

		$criteria = new Criteria();
		$criteria->add(PrPhInoxStarPeer::PR_ID, $prId);
		return static::doSelectOne($criteria);
	}
}
