<?php

/**
 * default actions.
 *
 * @package    inoxstar
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class defaultActions extends sfActions
{
	public function preExecute()
	{
		$responsive = new Responsive();
		$this->getUser()->setAttribute(
			"deviceClass", $responsive->getLayoutType()
		);

		$arr  	    = sfConfig::get("app_menus_mnt_menu");
		$this->menu = ioMenuItem::createFromArray($arr);
    
	    	$categoryKeys     = CtInoxStarPeer::getAllIds();
	    	$this->categories = CtInoxStarPeer::getAllCategoriesUnserialized($categoryKeys);
	}

	/**
	  * Executes index action
	  *
	  * @param sfRequest $request A request object
	  */
  	public function executeIndex($request)
  	{
		$this->contentPartialName = 'home';
		$this->paramObject = $this->categories;
		$this->message = null;
  	}

	public function executeShowProducts()
	{
	    $cat   = $this->getRequestParameter('category');
	    $tag   = $this->getRequestParameter('tag');
	    $page  = $this->getRequestParameter('page', 1);
	        
	    settype($page, "integer");

	    if (strlen(trim($cat))) {
	    	$pager = PrInoxStarPeer::getByCategoryWithPager($cat, $page);
	    	$this->url = '@home_category?categoria=' . $cat;
	    } elseif (strlen(trim($tag))) {
	    	$pager = PrInoxStarPeer::getByTagWithPager($tag, $page);
	    	$this->url = '@home_tag?tag=' . $tag;
	    } else {
	    	$pager = PrInoxStarPeer::getWithPager($page);
	    	$this->url = '@home_product';
	    }
	    
	    if (is_object($pager)) {
	    	$this->pager = $pager;
	    	$this->message = '';
	    } else {
	    	$this->message = 'N&atilde;o h&aacute; produtos';
 		$pager = null;
	    }
	
	    $tagKeys    = TgInoxStarPeer::getAllIds();
	    $this->tags = TgInoxStarPeer::getAllTagsUnserialized($tagKeys);
   
	    $this->paramObject = $pager; 
	    #$this->contentPartialName = 'products'; 
	    #$this->setTemplate($this->contentPartialName, "default");
	    sfView::SUCCESS;
	}

	public function executeShowProduct()
	{
		/*@ToDo*/
	}
	
	/*public function executeContact()
	{
		$this->paramObject = $this->message = null;
	}*/
}
