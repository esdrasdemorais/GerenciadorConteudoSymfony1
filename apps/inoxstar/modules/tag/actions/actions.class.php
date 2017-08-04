<?php

/**
 * tag actions.
 *
 * @package    inoxstar
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class tagActions extends sfActions
{
	protected $sfWebRequest;
	protected $sfBasicSecurityUser;

	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex($request)
	{
		$this->forward('tag', 'list');
	}

	public function preExecute()
	{
		$this->sfWebRequest = $this->getRequest();
		$this->sfBasicSecurityUser = $this->getUser();
	}

	public function executeNew()
	{
		$id 	  	   = $this->getRequestParameter('id');
		$tagModel 	   = TgInoxStarPeer::retrieveByPK($id);
		 
		if ($tagModel instanceof TgInoxStar) {
			// Shorter version: $this->user = $this->userModel;
			$this->setVar('tag', $tagModel);
		} else {
			$this->tag = new TgInoxStar();
		}
		
		return sfView::SUCCESS;
	}
	
	public function executeSave()
	{
		$tagModel = null;
		$id	  = $this->sfWebRequest->getParameter('tag');
		
		if ((int) $id > 0) {
			$tagModel = TgInoxStarPeer::retrieveByPK($id);
		} else {
			$tagModel  = new TgInoxStar();
		}
		
		try {
			$nam = $this->sfWebRequest->getParameter('name');
			
			$tagModel->setNam($nam);
			$tagModel->setEn(
			    "1" === $this->sfWebRequest->getParameter("enable") ?
				'1' : '0'
			);
			$tgId = $tagModel->save();
		
			if (!$tgId) {
				$this->logMessage(
						'tagActions->executeSave() : ' .
						'Erro ao salvar tag ' . $nam . '.', 'error'
				);
				throw new PropelException('Erro ao salvar tag ' . $nam . '.');
			}
	
			$this->setVar('message', 'Tag salva com sucesso.');
			
			return sfView::SUCCESS;
		} catch (PropelException $pex) {
			$this->logMessage(
					'productActions->executeSave() : ' .
					$pex->getMessage(), 'error'
			);
			return sfView::ERROR;
		}
	}
	
	public function executeSearchTag()
	{
		$tag = $this->getRequestParameter("term");
		
		if (strlen(trim($tag)) >= 3) {
			$tags = TgInoxStarPeer::getLike($tag);
			if (count($tags) > 0) {
				$tagArr = array();
				foreach ($tags as $tag) {
					$t = new StdClass();
					$t->id = $tag->getId();
					$t->label = $tag->getNam();
					$t->value = $tag->getNam();
					$tagArr[] = $t;
				}
				echo json_encode($tagArr);
			} else {
				$keys = TgInoxStarPeer::getAllTags();
				$tags = TgInoxStarPeer::getAllTagsUnSerialized(
					$keys
				);

				$tagArr = array();
				foreach ($tags as $key => $tag) {
					$arrayKey = explode("_", $key);
					$tagId = $arrayKey[1];
				
					$t = new StdClass();
					$t->id = $tagId;
					$t->label = $tag->getNam();
					$t->value = $tag->getNam();
					$tagArr[] = $t;
				}
				echo json_encode($tagArr);
			}
		}

		return sfView::NONE;
	}

	public function executeList()
	{
		$this->page = $this->getRequestParameter('page') > 0 ?
			      $this->getRequestParameter('page') : 1;
		settype($this->page, "integer");
		
		$this->pager = TgInoxStarPeer::getWithPager($this->page);
	}
}
