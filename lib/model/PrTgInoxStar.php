<?php

/**
 * Subclass for representing a row from the 'pr_tg_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrTgInoxStar extends BasePrTgInoxStar
{
	protected $tagIds = array();

	public function getTagIds()
	{
		return $this->tagIds;
	}

	public function setTagIds($tagIds)
	{
		$this->tagIds = $tagIds;
		//Works with get_object_vars($tagIds);
		$this->tagIds = json_decode(
			json_encode($this->tagIds), true
		);
	}

	public function saveTags(PrInoxStar $productModel)
	{
		$prTgCount = 0;

		$this->removeByPrId($productModel->getId());

		foreach ($this->tagIds as $tagId) {
			$productTagModel = new PrTgInoxStar();
			$productTagModel->setPrId($productModel->getId());
			$productTagModel->setTgId($tagId);
			$prTgId = $productTagModel->save();
			$prTgCount = ($prTgId > 0) ? ++$prTgCount : $prTgCount;
			unset($productTagModel);
		}
	
		return $prTgCount;
	}

	/*public function doDelete(PrTgInoxStar $productTagModel)
	{
	     	$r = PrTgInoxStarPeer::doDelete($productTagModel);
        	$productTagModel->setDeleted(true);
		var_dump($productTagModel);die;
		return $r;
	}*/

	private function removeByPrId($prId)
	{
		$criteria = new Criteria();
		$criteria->add(PrTgInoxStarPeer::PR_ID, $prId);
		$productTagModels = PrTgInoxStarPeer::doSelect($criteria);
		
		try {
			$count = 0;
			foreach ($productTagModels as $productTagModel) {
				$productTagModel->delete();
			}
		
		} catch (PropelException $pex) {
			//@ToDo log and refactory possible
			throw new PropelException(
				'Nao foi possivel remover. ' . 
				$pex->getMessage()
			);
		}
		
		return count($productTagModels);
	}
}
