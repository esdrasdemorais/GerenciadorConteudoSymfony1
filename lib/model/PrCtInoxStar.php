<?php

/**
 * Subclass for representing a row from the 'pr_ct_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrCtInoxStar extends BasePrCtInoxStar
{
	protected $categoryIds;

	public function setCategories($categoryIds)
	{
		$this->categoryIds = $categoryIds;
	}

	public function getCategories()
	{
		return $this->categoryIds;
	}

	private function deleteCategories(PrInoxStar $productModel)
	{
		$productCategoriesModel = PrCtInoxStarPeer::getByPrId(
			$productModel->getId()
		);
		
		foreach ($productCategoriesModel as $productCategoryModel) {
			$productCategoryModel->delete();
		}
	}

	public function saveCategories(PrInoxStar $productModel)
	{
		$categIdCount = 0;
		
		$this->deleteCategories($productModel);

		foreach ($this->categoryIds as $categoryId) {
			$categoryModel = new PrCtInoxStar();
			$categoryModel->setPrId($productModel->getId());
			$categoryModel->setCtId($categoryId);
			$prCtId = $categoryModel->save();
			$categIdCount = ($prCtId > 0) ? 
					 ++$categIdCount : 
					 $categIdCount;
			unset($categoryModel);
		}

		return $categIdCount;
	}
}
