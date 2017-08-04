<?php

class User extends sfBasicSecurityUser
{
	public function autenticate()
	{
		$isLoginValid = UsInoxStarPeer::login($this);
		
		if (false !== $isLoginValid && 
		    $isLoginValid instanceof UsInoxStar
		) {
			$this->setAuthenticated(true);
			
			$credential = ('1' == $isLoginValid->getAdmin()) ? 
					'admin' : 'publisher';
			$this->addCredential($credential);

			$this->loadMenu();
	
			return $isLoginValid;
		}

		return false;
	}

	private function loadMenu()
	{
 		$menu = new Menu('mnt_menu');
		$menu->loadMenu($this);		
	}

	public function generatePasswordHash($pass)
	{
		/**
		 *  Similar password_hash() (PHP 5 >= 5.5.0)
		$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
		$salt = base64_encode($salt);
		$salt = str_replace('+', '.', $salt);
		$hash = crypt(hash('sha256', $pass), '$2y$10$' . $salt . '$');
		*/		
		$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
		$salt = mcrypt_create_iv($size, MCRYPT_DEV_URANDOM);
		$salt = base64_encode($salt);
		// we have to replace any '+' in the base64 string with '.'
		$salt = str_replace('+', '.', '$2y$10$' . $salt . '$');
		#Refactor
		#$hash = crypt(hash('sha256', $pass), $salt);
		$hash = crypt(hash('sha256', $pass));

		return array('hash' => $hash, 'salt' => $salt);
	}

	public function verifyPasswordHash($pass, $hash)
	{
		return $hash === crypt(hash('sha256', $pass), $hash);
	}
}
