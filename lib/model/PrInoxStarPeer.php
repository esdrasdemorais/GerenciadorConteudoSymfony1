<?php

/**
 * Subclass for performing query and update operations on the 'pr_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrInoxStarPeer extends BasePrInoxStarPeer
{
	public static function getWithPager($page)
	{
	    settype($page, "integer");

	    $criteria = new Criteria();
	    $criteria->add(PrInoxStarPeer::EN, true);
	    $pager = new sfPropelPager('PrInoxStar', 10);
	    $pager->setCriteria($criteria);
	    $pager->setPage($page);
	    $pager->init();
	    
	    return $pager;
	}

	public static function getByCategoryWithPager($category, $page)
	{
		settype($page, "integer");

		$criteria = new Criteria();
		$criteria->addJoin(CtInoxStarPeer::ID, PrCtInoxStarPeer::CT_ID);
		$criteria->addJoin(PrCtInoxStarPeer::PR_ID, PrInoxStarPeer::ID);
		$criteria->add(CtInoxStarPeer::NAM, $category);
		$criteria->add(CtInoxStarPeer::EN, true);
		$criteria->add(PrInoxStarPeer::EN, true);
		$pager = new sfPropelPager('PrInoxStar', 10);
		$pager->setCriteria($criteria);
		$pager->setPage($page);
		$pager->init();
		
		return $pager;
	}

	public static function getByTagWithPager($tag, $page)
	{
 		settype($page, "integer");

		$criteria = new Criteria();
		$criteria->addJoin(TgInoxStarPeer::ID, PrTgInoxStarPeer::TG_ID);
		$criteria->addJoin(PrTgInoxStarPeer::PR_ID, PrInoxStarPeer::ID);
		$criteria->add(TgInoxStarPeer::NAM, $tag);
		$criteria->add(TgInoxStarPeer::EN, true);
		$criteria->add(PrInoxStarPeer::EN, true);
		$pager = new sfPropelPager('PrInoxStar', 10);
		$pager->setCriteria($criteria);
		$pager->setPage($page);
		$pager->init();
		
		return $pager;
	}
}
