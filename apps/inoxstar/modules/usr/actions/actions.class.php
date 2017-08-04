<?php

/**
 * usr actions.
 *
 * @package    jobeet
 * @subpackage usr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class usrActions extends sfActions
{
  	protected $sfWebRequest;
	protected $sfBasicSecurityUser;

	public function preExecute()
	{
		$this->sfWebRequest 	   = $this->getRequest();
		$this->sfBasicSecurityUser = $this->getUser();
		if (false === $this->sfBasicSecurityUser->isAuthenticated()) {
			$this->menu = null;
		}
	}

	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex($request)
	{
		if (true === $this->sfBasicSecurityUser->isAuthenticated()) {
			$uri = ('/index.php/index_usr_mnt' !== $_SERVER['REQUEST_URI']) ?
				$_SERVER['REQUEST_URI'] : '/usr/showHome';
			$uri = explode("/", substr($uri, 1, strlen($uri)));
			return $this->redirect($uri[0].'/'.$uri[1]);
			#return $this->forward($uri[0], $uri[1]);
		}

		$g = new Captcha();
		$this->sfBasicSecurityUser->setAttribute(
			'captcha', $g->generate()
		);
	}
	
  	public function handleErrorLogin()
  	{
    		$this->forward('usr', 'index');
 	}

	public function executeLogin()
	{
		if (true === $this->sfBasicSecurityUser->isAuthenticated()) {
	 		return $this->forward("usr", "showHome");
		}

		$this->sfBasicSecurityUser->setAttribute(
			'login',
			$this->sfWebRequest->getParameterHolder()->get('login')
		);
		$this->sfBasicSecurityUser->setAttribute(
			'pass',
			$this->sfWebRequest->getParameterHolder()->get('pass')
		);

		$userModel = $this->sfBasicSecurityUser->autenticate();

		if (true === $userModel instanceof UsInoxStar) {
			$this->sfBasicSecurityUser->setAttribute(
				'id', $userModel->getId()
			);
			return $this->forward("usr", "showHome");
		}
		
		/*$this->redirect(
			(true === $this->sfWebRequest()->getReferer()) ? 
				$this->sfWebRequest->getReferer() : 
				'usr/index'
		);*/
		$this->forward('usr', 'index');
	}

	public function executeShowHome()
	{
		$login = explode(
			"@", 
			$this->sfBasicSecurityUser->getAttribute('login')
		);
		$login = $login[0];

		if (true === $this->sfBasicSecurityUser->isAuthenticated()) {
			$this->message = 'Ol&aacute; ' . $login;
			
			sfView::SUCCESS;
		} else {
			$this->redirect('/usr/index');
		}
	}

	public function executeLogout()
	{
		$this->sfBasicSecurityUser->getAttributeHolder()->clear();
		$this->sfBasicSecurityUser->removeCredential('admin');
		$this->sfBasicSecurityUser->shutdown();
		$this->sfBasicSecurityUser->setAuthenticated(false);

		if (!session_start()) {
			session_start();
		}
		session_destroy();
 		session_unset();

		setcookie("symfony", "", time() - 70);
		unset($_COOKIE["symfony"]);
		
		$this->redirect("/usr/index");
	}

	public function executeAlterCurrentUser()
	{
		$id 	   = $this->sfBasicSecurityUser->getAttribute('id');
		$userModel = UsInoxStarPeer::retrieveByPK($id);
    		
		if ($userModel instanceof UsInoxStar) {
			// Shorter version: $this->user = $this->userModel;
			$this->setVar('userModel', $userModel);
			return sfView::SUCCESS;
		}

		return sfView::ERROR;
	}

	public function executeChangePass()
	{
		$id = $this->sfBasicSecurityUser->getAttribute('id');
		$oldPass = $this->sfWebRequest->getParameter('oldpass');
		$newPass = $this->sfWebRequest->getParameter('newPass');
		$cnfPass = $this->sfWebRequest->getParameter('cnfPass');

		try {
			$userModel = UsInoxStarPeer::retrieveByPK($id);

			if ($userModel instanceof UsInoxStar) {
				$this->sfBasicSecurityUser = $userModel->changePass($oldPass, $newPass, $cnfPass);
				$this->sfBasicSecurityUser->getAttributeHolder()->clear();
				return $this->redirect('/usr/index');
			}
		} catch (sfStopException $sfSEx) {
			$this->logMessage(
				'usrActions->executeChangePass()' . 
				$sfSEx->getMessage(), 'warning'
			);

			return sfView::ERROR;
		}
	}
	
	public function executeNew()
	{
	    $id        = $this->getRequestParameter('id');
	    $userModel = UsInoxStarPeer::retriveByPk($id);
	    
	    if ($userModel instanceof UsInoxStar) {
	        // Shorter version: $this->user = $this->userModel;
	        $this->setVar('user', $userModel);
	    }
	    
	    return sfView::SUCCESS;
	}
	
	public function validateSave()
	{
	    $newPass = $this->sfWebRequest->getParameter('pass');
	    $cnfPass = $this->sfWebRequest->getParameter('conf');
	    
	    if ($newPass != $cnfPass) {
	        $this->setVar('message', 'A senha e a confirma&ccedil;&atilde;
	                devem ser iguais.');
	        return sfView::ALERT;
	    }
	}
	    
    public function executeSave()
    {
        $id    = $this->sfWebRequest->getParameter('id');
        $login = $this->sfWebRequest->getParameter('login');
        $newPass = $this->sfWebRequest->getParameter('pass');
        $enable = $this->sfWebRequest->getParameter('enable');
        
        $userModel = UsInoxStarPeer::retriveByLogin($login);
        
        if ($userModel instanceof UsInoxStar) {
            $this->logMessage(
                'usrActions->executeSave() Novo Login Duplicado. $login = ' . 
                    $login, 'warning'
            );
            $this->setVar('message', 'Usu&aacute j&aacute; existe.');
            return sfView::ALERT;
        }
        
        try {
            if (is_numeric($id)) {
                $userModel = UsInoxStarPeer::retriveByPk($id);
                $userModel->setPass($newPass);
                $userModel->setEn($enable);
            } else {
                $userModel = new UsInoxStar();
                $userModel->setLogin($login);
                $userModel->setPass($newPass);
                $userModel->setEn($enable);
            }
            
            $userModel->save();
            
            return sfView::SUCCESS;
        } catch (PropelException $pex) {
            $this->logMessage(
                'usrActions->executeSave() Erro ao salvar usuario. ' .
                $pex->getMessage(), 'err'
            );
        }
    }
}
