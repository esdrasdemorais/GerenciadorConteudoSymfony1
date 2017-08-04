<?php


abstract class BasePrTgInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pr_id;


	
	protected $tg_id;

	
	protected $aPrInoxStar;

	
	protected $aTgInoxStar;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPrId()
	{

		return $this->pr_id;
	}

	
	public function getTgId()
	{

		return $this->tg_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PrTgInoxStarPeer::ID;
		}

	} 
	
	public function setPrId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pr_id !== $v) {
			$this->pr_id = $v;
			$this->modifiedColumns[] = PrTgInoxStarPeer::PR_ID;
		}

		if ($this->aPrInoxStar !== null && $this->aPrInoxStar->getId() !== $v) {
			$this->aPrInoxStar = null;
		}

	} 
	
	public function setTgId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tg_id !== $v) {
			$this->tg_id = $v;
			$this->modifiedColumns[] = PrTgInoxStarPeer::TG_ID;
		}

		if ($this->aTgInoxStar !== null && $this->aTgInoxStar->getId() !== $v) {
			$this->aTgInoxStar = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->pr_id = $rs->getInt($startcol + 1);

			$this->tg_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PrTgInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStar:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PrTgInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PrTgInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePrTgInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePrTgInoxStar:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PrTgInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePrTgInoxStar:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aPrInoxStar !== null) {
				if ($this->aPrInoxStar->isModified()) {
					$affectedRows += $this->aPrInoxStar->save($con);
				}
				$this->setPrInoxStar($this->aPrInoxStar);
			}

			if ($this->aTgInoxStar !== null) {
				if ($this->aTgInoxStar->isModified()) {
					$affectedRows += $this->aTgInoxStar->save($con);
				}
				$this->setTgInoxStar($this->aTgInoxStar);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PrTgInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PrTgInoxStarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aPrInoxStar !== null) {
				if (!$this->aPrInoxStar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPrInoxStar->getValidationFailures());
				}
			}

			if ($this->aTgInoxStar !== null) {
				if (!$this->aTgInoxStar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTgInoxStar->getValidationFailures());
				}
			}


			if (($retval = PrTgInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrTgInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPrId();
				break;
			case 2:
				return $this->getTgId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrTgInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPrId(),
			$keys[2] => $this->getTgId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrTgInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPrId($value);
				break;
			case 2:
				$this->setTgId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrTgInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPrId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTgId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PrTgInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(PrTgInoxStarPeer::ID)) $criteria->add(PrTgInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(PrTgInoxStarPeer::PR_ID)) $criteria->add(PrTgInoxStarPeer::PR_ID, $this->pr_id);
		if ($this->isColumnModified(PrTgInoxStarPeer::TG_ID)) $criteria->add(PrTgInoxStarPeer::TG_ID, $this->tg_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PrTgInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrTgInoxStarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setPrId($this->pr_id);

		$copyObj->setTgId($this->tg_id);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PrTgInoxStarPeer();
		}
		return self::$peer;
	}

	
	public function setPrInoxStar($v)
	{


		if ($v === null) {
			$this->setPrId(NULL);
		} else {
			$this->setPrId($v->getId());
		}


		$this->aPrInoxStar = $v;
	}


	
	public function getPrInoxStar($con = null)
	{
		if ($this->aPrInoxStar === null && ($this->pr_id !== null)) {
						$this->aPrInoxStar = PrInoxStarPeer::retrieveByPK($this->pr_id, $con);

			
		}
		return $this->aPrInoxStar;
	}

	
	public function setTgInoxStar($v)
	{


		if ($v === null) {
			$this->setTgId(NULL);
		} else {
			$this->setTgId($v->getId());
		}


		$this->aTgInoxStar = $v;
	}


	
	public function getTgInoxStar($con = null)
	{
		if ($this->aTgInoxStar === null && ($this->tg_id !== null)) {
						$this->aTgInoxStar = TgInoxStarPeer::retrieveByPK($this->tg_id, $con);

			
		}
		return $this->aTgInoxStar;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasePrTgInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePrTgInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 