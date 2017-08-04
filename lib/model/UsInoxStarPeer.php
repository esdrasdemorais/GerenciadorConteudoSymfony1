<?php

/**
 * Subclass for performing query and update operations on the 'us_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class UsInoxStarPeer extends BaseUsInoxStarPeer
{
	public static function login(sfBasicSecurityUser $sfBasicSecurityUser)
	{
		$nam  = $sfBasicSecurityUser->getAttribute('login');
		$pass = $sfBasicSecurityUser->getAttribute('pass');
		$hash = $sfBasicSecurityUser->generatePasswordHash($pass);
		
		$criteria = new Criteria();
		$criteria->add(UsInoxStarPeer::NAM, $nam);
		$criteria->add(UsInoxStarPeer::EN, '1');
		#$criteria->add(UsInoxStarPeer::PAS, $hash['hash']);
		$userInoxtar = UsInoxStarPeer::doSelectOne($criteria);
		
		if (false === $userInoxtar instanceof UsInoxStar) {
			return false;
		}
		
		$userInoxtar->setBasicSecurityUser($sfBasicSecurityUser);

		if ($sfBasicSecurityUser->verifyPasswordHash(
			$pass, $userInoxtar->getPas() #, $hash['hash']
		)) {
			$userInoxtar->setPas($hash['hash']);
			$userInoxtar->setSal($hash['salt']);
			$userInoxtar->save();

			return $userInoxtar;
		}

		return false;
	}
}
