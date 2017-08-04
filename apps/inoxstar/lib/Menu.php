<?php

class Menu
{
	protected $menuItemsArr;
	private   $menu;
	
	public function __construct($menuType)
	{
		$this->menuItemsArr = sfConfig::get('app_menus_' . $menuType);
		#$this->menu = new ioMenuItem('MenuRoot', null, array('class' => 'root_menu'));
		#$this->createMenu(0);
		
	}
	
	public function loadMenu(sfUser $sfBasicUserSecurity)
	{
		$menu = ioMenuItem::createFromArray($this->menuItemsArr);
		$sfBasicUserSecurity->setAttribute('menu', $menu);
		unset($menu);;
	}

	private function createMenu($i)
	{
		if ($i == count($menuItemsArr) - 1) {
			$url = array_key_exists('url', $menuItemsArr[$i]) ? 
				$menuItemsArr[$i]['url'] :
					null;
			$parent = $menu->addChild($menuItemsArr[$i]['name'], $url);
			
			if (array_key_exists('children', $menuItemsArr[$i])) {
				$this->createItem(0, $parent, $menuItemsArr[$i]['children']);				
			}
			
			if (true === key_exists('Sair', $menuItemsArr[$i])) {
				$parent->setLinkOptions(
					array(
						'class' => 'logout',
						'confirm' => 'Deseja realmente sair?',
					)
				);
			}
			
			return $parent;
		} else {
			return $this->createMenu(++$i);
		}
	}
	
	private function createItem($i, $parent, $currentChildrenArr)
	{
		if ($i < count($currentChildrenArr)) {
			return $parent->createItem(++$i, $parent, $currentChildrenArr);
		} else {
			$children = $parent->addChild($this->menuItemsArr[$parent][$i]);
			
			if (true === key_exists('Usu&aacute;rio', $currentChildrenArr[$i])) {
				// setup children to be hidden since we won\'t be authorized (just admin)
				$children->setCredentials(array('admin'));
			}
			
			// setup child $i to be the current menu
			$children->setRoute($currentChildrenArr[$i]);

			if (array_key_exists('children', $currentChildrenArr[$i])) {
				$this->createItem(0, $children, $currentChildrenArr[$i]['children']);
			}
			
			return $children;
		}
	}
}
