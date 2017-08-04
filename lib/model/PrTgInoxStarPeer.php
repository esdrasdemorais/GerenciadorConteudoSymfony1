<?php

/**
 * Subclass for performing query and update operations on the 'pr_tg_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrTgInoxStarPeer extends BasePrTgInoxStarPeer
{
	public static function getByProduct(PrInoxStar $productModel)
	{
		$criteria = new Criteria();
		
		$criteria->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);
		$criteria->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);
		$criteria->add(PrInoxStarPeer::ID, $productModel->getId());
		$criteria->add(TgInoxStarPeer::EN, '1');
		
		return TgInoxStarPeer::doSelect($criteria);
	}

	public static function getByPrId($prId)
	{
		settype($prId, "integer");
	
		$criteria = new Criteria();
		$criteria->addJoin(PrTgInoxStarPeer::TG_ID, TgInoxStarPeer::ID);
		$criteria->add(static::PR_ID, $prId);
		$criteria->add(TgInoxStarPeer::EN, '1');
		return TgInoxStarPeer::doSelectOne($criteria);
	}
}
