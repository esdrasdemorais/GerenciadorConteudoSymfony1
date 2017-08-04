<?php

/**
 * category actions.
 *
 * @package    inoxstar
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class categoryActions extends sfActions
{
	protected $sfWebRequest;
	protected $sfBasicSecurityUser;

	public function preExecute()
	{
		$this->sfWebRequest = $this->getRequest();
		$this->sfBasicSecurityUser = $this->getUser();
	}

	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex($request)
	{
		$this->forward('category', 'list');
	}

	public function executeNew()
	{
		$id 	       = $this->getRequestParameter('id');
		$categoryModel = CtInoxStarPeer::retrieveByPK($id);
		 
		$this->category = new CtInoxStar();
		if ($categoryModel instanceof CtInoxStar) {
			// Shorter version: $this->user = $this->userModel;
			$this->setVar('category', $categoryModel);
		}
		
		return sfView::SUCCESS;
	}
	
	public function handleErrorSave()
  	{
    		$this->forward('category', 'new');
 	}

	public function executeSave()
	{
		$categoryModel = null;
		$id			   = $this->sfWebRequest->getParameter('category');
		
		if ((integer) $id > 0) {
			$categoryModel = CtInoxStarPeer::retrieveByPK($id);
		} else {
			$categoryModel  = new CtInoxStar();
		}
		
		try {
			$categoryModel->setNam($this->sfWebRequest->getParameter('name'));
			$categoryModel->setEn(
			    $this->sfWebRequest->getParameter('enable') === '1' ?
				'1' : '0'
			);

			$ctId = $categoryModel->save();
		
			if (!$ctId) {
				$this->logMessage(
						'categoryActions->executeSave() : ' .
						'Erro ao salvar categoria.', 'error'
				);
				throw new PropelException('Erro ao salvar categoria.');
			}
	
			$this->setVar('message', 'Categoria salva com sucesso.');
			
			return sfView::SUCCESS;
		} catch (PropelException $pex) {
			$this->logMessage(
					'productActions->executeSave() : ' .
					$pex->getMessage(), 'error'
			);
			return sfView::ERROR;
		}
	}

	public function executeList()
	{
		$this->page = $this->getRequestParameter('page') > 0 ?
			      $this->getRequestParameter('page') : 1;
		settype($this->page, "integer");
		
		$this->pager = CtInoxStarPeer::getWithPager($this->page);
	}

}
