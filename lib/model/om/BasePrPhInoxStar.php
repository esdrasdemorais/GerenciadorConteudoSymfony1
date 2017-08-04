<?php


abstract class BasePrPhInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pr_id;


	
	protected $nam;


	
	protected $ext;


	
	protected $typ;

	
	protected $aPrInoxStar;

	
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

	
	public function getNam()
	{

		return $this->nam;
	}

	
	public function getExt()
	{

		return $this->ext;
	}

	
	public function getTyp()
	{

		return $this->typ;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PrPhInoxStarPeer::ID;
		}

	} 
	
	public function setPrId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pr_id !== $v) {
			$this->pr_id = $v;
			$this->modifiedColumns[] = PrPhInoxStarPeer::PR_ID;
		}

		if ($this->aPrInoxStar !== null && $this->aPrInoxStar->getId() !== $v) {
			$this->aPrInoxStar = null;
		}

	} 
	
	public function setNam($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nam !== $v) {
			$this->nam = $v;
			$this->modifiedColumns[] = PrPhInoxStarPeer::NAM;
		}

	} 
	
	public function setExt($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ext !== $v) {
			$this->ext = $v;
			$this->modifiedColumns[] = PrPhInoxStarPeer::EXT;
		}

	} 
	
	public function setTyp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->typ !== $v) {
			$this->typ = $v;
			$this->modifiedColumns[] = PrPhInoxStarPeer::TYP;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->pr_id = $rs->getInt($startcol + 1);

			$this->nam = $rs->getString($startcol + 2);

			$this->ext = $rs->getString($startcol + 3);

			$this->typ = $rs->getString($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PrPhInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStar:delete:pre') as $callable)
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
			$con = Propel::getConnection(PrPhInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PrPhInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePrPhInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePrPhInoxStar:save:pre') as $callable)
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
			$con = Propel::getConnection(PrPhInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePrPhInoxStar:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PrPhInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PrPhInoxStarPeer::doUpdate($this, $con);
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


			if (($retval = PrPhInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrPhInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNam();
				break;
			case 3:
				return $this->getExt();
				break;
			case 4:
				return $this->getTyp();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrPhInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPrId(),
			$keys[2] => $this->getNam(),
			$keys[3] => $this->getExt(),
			$keys[4] => $this->getTyp(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrPhInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNam($value);
				break;
			case 3:
				$this->setExt($value);
				break;
			case 4:
				$this->setTyp($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrPhInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPrId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setExt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTyp($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PrPhInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(PrPhInoxStarPeer::ID)) $criteria->add(PrPhInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(PrPhInoxStarPeer::PR_ID)) $criteria->add(PrPhInoxStarPeer::PR_ID, $this->pr_id);
		if ($this->isColumnModified(PrPhInoxStarPeer::NAM)) $criteria->add(PrPhInoxStarPeer::NAM, $this->nam);
		if ($this->isColumnModified(PrPhInoxStarPeer::EXT)) $criteria->add(PrPhInoxStarPeer::EXT, $this->ext);
		if ($this->isColumnModified(PrPhInoxStarPeer::TYP)) $criteria->add(PrPhInoxStarPeer::TYP, $this->typ);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PrPhInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrPhInoxStarPeer::ID, $this->id);

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

		$copyObj->setNam($this->nam);

		$copyObj->setExt($this->ext);

		$copyObj->setTyp($this->typ);


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
			self::$peer = new PrPhInoxStarPeer();
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


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasePrPhInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePrPhInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 