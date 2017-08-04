<?php

/**
 * Subclass for representing a row from the 'pr_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrInoxStar extends BasePrInoxStar
{
	protected $connection;
	protected $productTagModel;
	protected $categoryModel;
	protected $productPhotoModel;
	
	public function __construct()
	{
		$this->connection = Propel::getConnection();
	}

	public function setPhoto($photoModel)
	{
		$this->productPhotoModel = $photoModel;
	}

	public function getPhoto()
	{
		return PrPhInoxStarPeer::getByPrId($this->getId());
	}

	public function setCategory($categoryModel)
	{
		$this->categoryModel = $categoryModel;
	}

	public function getCategories()
	{
		return PrCtInoxStarPeer::getCategoriesByPrId($this->getId());
	}

	public function setTag($tagModel)
	{
		$this->productTagModel = $tagModel;
	}

	public function getTags()
	{
		#return PrTgInoxStarPeer::getByPrId($this0>getId());
		return PrTgInoxStarPeer::getByProduct($this);
	}

	private function saveCategories()
	{
		$prCtIdCount = $this->categoryModel->saveCategories($this);
		$prCtIdsArr  = $this->categoryModel->getCategories();
		
		if ($prCtIdCount != count($prCtIdsArr)) {
			$this->connection->rollback();
			$this->logMessage(
				'productActions->executeSave() : ' . 
				'Erro ao salvar tags.', 'error'
			);
			throw new PropelException('Erro ao salvar tags. ');
		}
	}

	private function saveTags()
	{
		$prTgIdCount = $this->productTagModel->saveTags($this);
		
		if ($prTgIdCount != count($this->productTagModel->getTagIds())) {
			$this->connection->rollback();
			$this->logMessage(
				'productActions->executeSave() : ' . 
				'Erro ao salvar tags.', 'error'
			);
			throw new PropelException('Erro ao salvar tags. ');
		}
	}

	private function savePhoto()
	{
		$prPhId = $this->productPhotoModel->savePhoto($this);
		
		if (!$prPhId) {
			$this->connection->rollback();
			$this->logMessage(
				'productActions->executeSave() : ' .
				'Erro ao salvar foto.', 'error'
			);
			throw new PropelException('Erro ao salvar foto.');
		}
	}

	public function saveProductWithDependencies()
	{
		$prId = $this->save($this->connection);
		
		$this->connection->begin();

		if ($prId <= 0) {
			$this->connection->rollback();
			/*$this->logMessage(
				'productActions->executeSave() : ' .
				'Erro ao salvar produto.', 'error'
			);*/
			throw new PropelException('Erro ao salvar produto.' . 
			    'PrInoxStar->saveProductWithDependencies');
		}

		$this->saveTags();
		$this->saveCategories();

		if (true === ($this->productPhotoModel instanceof PrPhInoxStar)) {
		    $this->savePhoto();
		}
	
		$this->connection->commit();
	}
}
