<?php

/**
 * Subclass for representing a row from the 'us_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class UsInoxStar extends BaseUsInoxStar
{
	protected $sfBasicSecurityUser;

	public function setBasicSecurityUser(sfBasicSecurityUser $user)
	{
		$this->sfBasicSecurityUser = $user;
	}

	public function getPass($pass = null)
	{
		if (is_null($pass)) {
			$hash = $this->pas;
		} elseif ($this->sfBasicSecurityUser instanceof User) {
			$hash = $this->sfBasicSecurityUser
				     ->generatePasswordHash($pass);
			$hash = $hash['hash'];
		}
		return $hash;
	}

	public function changePass($oldPass, $newPass, $cnfPass)
	{
		if ($this->getPass() == $this->getPass($oldPass)
		    && 	    $cnfPass == $newPass
		) {
			try {
				$hash = $this->sfBasicSecurityUser
					     ->generatePasswordHash($newPass);
				$this->setPassSalt($hash['salt']);
				$this->setPass($hash['pass']);
				$this->save();
				return $sfBasicSecurityUser;
			} catch (PropelException $pex) {
				$this->logMessage(
					'InoxtarUser->changePass' . 
					$sfSEx->getMessage(), 'err'
				);
			}
		} else {
			throw new sfStopException(
				join(
					'Nao foi possivel alterar a senha.',
					'Confirme e tente novamente',
					' '
				)
			);
		}
	}
}
