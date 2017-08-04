<?php

/**
 * product actions.
 *
 * @package    inoxstar
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class productActions extends sfActions
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
		$this->forward('product', 'list');
	}

	public function preExecute()
	{
		$this->sfWebRequest        = $this->getRequest();
		$this->sfBasicSecurityUser = $this->getUser();
	}

	public function executeNew()
	{
		$id 	       = $this->getRequestParameter('id');
		$productModel  = PrInoxStarPeer::retrieveByPK($id);
		
		$this->product = new PrInoxStar();
		$this->prTagIds = '';
		
		if ($productModel instanceof PrInoxStar) {
			// Shorter version: $this->user = $this->userModel;
			$this->setVar('product', $productModel);
			$prTags = PrTgInoxStarPeer::getByProduct($productModel);
			$this->prTags = '[';
			foreach ($prTags as $key => $tag) {
				$this->prTags .= '{';
				$this->prTags .= '"id":' . $tag->getId() . ',';
				$this->prTags .= '"tg":"' . $tag->getNam() . '"';
				$this->prTags .= '}';
				$this->prTags .= count($prTags) > (++$key) ?
					 ',' : '';
			}
			$this->prTags .= ']';
		}

		$keys 	    = CtInoxStarPeer::getAllCategories();
		$categories = CtInoxStarPeer::getAllCategoriesUnSerialized(
			$keys
		);
		$this->categories = array();
		foreach ($categories as $key => $category) {
			$keyArr = explode("_", $key);
			$categoryId = $keyArr[1];
			$this->categories[$categoryId] = $category->getNam();
			
			unset($category);
		}

		return sfView::SUCCESS;
	}
	
	public function handleErrorSave()
  	{
    		$this->forward('product', 'new');
 	}

	public function executeSave()
	{
		$id = $this->sfWebRequest->getParameter('product');
		if ((int) $id > 0) {
			$productModel = PrInoxStarPeer::retrieveByPK($id);
		} else {
			$productModel = new PrInoxStar();
		}

		$tagIds = json_decode($this->getRequestParameter('tags'),true);
		$productTagModel = new PrTgInoxStar();
		$productTagModel->setTagIds($tagIds);
		$productModel->setTag($productTagModel);

		$categoryIds = $this->sfWebRequest->getParameter('category');
		$productCategory = new PrCtInoxStar();
		$productCategory->setCategories($categoryIds);
		$productModel->setCategory($productCategory);

		$productModel->setNam($this->sfWebRequest
					   ->getParameter('name'));
		$productModel->setDescr($this->sfWebRequest
					     ->getParameter('descr'));
		$productModel->setUsId($this->sfBasicSecurityUser
					    ->getAttribute('id'));

		$productModel->setEn($this->sfWebRequest
					  ->getParameter('enable'));

   		$productPhotoModel = null;
		foreach ($this->sfWebRequest->getFileNames() as $uplFile) {
			if (0 < strlen($this->sfWebRequest->getFileType(
			    $uplFile))
			) {
 			    $productPhotoModel = new PrPhInoxStar();
                            $productPhotoModel->setFile($this->sfWebRequest);
			    $productModel->setPhoto($productPhotoModel);
			    break;
			}
		}
		// Validate Photo Just When New Product
		if (false === is_numeric($productModel->getId()) &&
		    false === is_object($productPhotoModel))
	   	{
			$this->getUser()->setFlash('message', 'Selecione uma foto.');
			return $this->handleErrorSave();
		}

		$productModel->saveProductWithDependencies();

		$this->setVar('message', 'Produto salvo com sucesso.');
		$this->product = $productModel;
		return sfView::SUCCESS;
	}
	
	public function executeList()
	{
		$this->page = (int) $this->getRequestParameter('page') > 0 ?
			      $this->getRequestParameter('page') : 1;
		$this->products = PrInoxStarPeer::getWithPager($this->page);
	}
}
