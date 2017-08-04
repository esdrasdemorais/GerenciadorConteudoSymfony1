<?php


abstract class BasePrCtInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pr_id;


	
	protected $ct_id;

	
	protected $aPrInoxStar;

	
	protected $aCtInoxStar;

	
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

	
	public function getCtId()
	{

		return $this->ct_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PrCtInoxStarPeer::ID;
		}

	} 
	
	public function setPrId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pr_id !== $v) {
			$this->pr_id = $v;
			$this->modifiedColumns[] = PrCtInoxStarPeer::PR_ID;
		}

		if ($this->aPrInoxStar !== null && $this->aPrInoxStar->getId() !== $v) {
			$this->aPrInoxStar = null;
		}

	} 
	
	public function setCtId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ct_id !== $v) {
			$this->ct_id = $v;
			$this->modifiedColumns[] = PrCtInoxStarPeer::CT_ID;
		}

		if ($this->aCtInoxStar !== null && $this->aCtInoxStar->getId() !== $v) {
			$this->aCtInoxStar = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->pr_id = $rs->getInt($startcol + 1);

			$this->ct_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PrCtInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePrCtInoxStar:delete:pre') as $callable)
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
			$con = Propel::getConnection(PrCtInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PrCtInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePrCtInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePrCtInoxStar:save:pre') as $callable)
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
			$con = Propel::getConnection(PrCtInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePrCtInoxStar:save:post') as $callable)
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

			if ($this->aCtInoxStar !== null) {
				if ($this->aCtInoxStar->isModified()) {
					$affectedRows += $this->aCtInoxStar->save($con);
				}
				$this->setCtInoxStar($this->aCtInoxStar);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PrCtInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PrCtInoxStarPeer::doUpdate($this, $con);
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

			if ($this->aCtInoxStar !== null) {
				if (!$this->aCtInoxStar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCtInoxStar->getValidationFailures());
				}
			}


			if (($retval = PrCtInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrCtInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCtId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrCtInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPrId(),
			$keys[2] => $this->getCtId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrCtInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCtId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrCtInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPrId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PrCtInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(PrCtInoxStarPeer::ID)) $criteria->add(PrCtInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(PrCtInoxStarPeer::PR_ID)) $criteria->add(PrCtInoxStarPeer::PR_ID, $this->pr_id);
		if ($this->isColumnModified(PrCtInoxStarPeer::CT_ID)) $criteria->add(PrCtInoxStarPeer::CT_ID, $this->ct_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PrCtInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrCtInoxStarPeer::ID, $this->id);

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

		$copyObj->setCtId($this->ct_id);


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
			self::$peer = new PrCtInoxStarPeer();
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

	
	public function setCtInoxStar($v)
	{


		if ($v === null) {
			$this->setCtId(NULL);
		} else {
			$this->setCtId($v->getId());
		}


		$this->aCtInoxStar = $v;
	}


	
	public function getCtInoxStar($con = null)
	{
		if ($this->aCtInoxStar === null && ($this->ct_id !== null)) {
						$this->aCtInoxStar = CtInoxStarPeer::retrieveByPK($this->ct_id, $con);

			
		}
		return $this->aCtInoxStar;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasePrCtInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePrCtInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 