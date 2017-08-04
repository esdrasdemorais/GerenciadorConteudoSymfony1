<?php


abstract class BaseTgInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nam;


	
	protected $en = '0';

	
	protected $collPrTgInoxStars;

	
	protected $lastPrTgInoxStarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNam()
	{

		return $this->nam;
	}

	
	public function getEn()
	{

		return $this->en;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TgInoxStarPeer::ID;
		}

	} 
	
	public function setNam($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nam !== $v) {
			$this->nam = $v;
			$this->modifiedColumns[] = TgInoxStarPeer::NAM;
		}

	} 
	
	public function setEn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->en !== $v || $v === '0') {
			$this->en = $v;
			$this->modifiedColumns[] = TgInoxStarPeer::EN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nam = $rs->getString($startcol + 1);

			$this->en = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TgInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTgInoxStar:delete:pre') as $callable)
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
			$con = Propel::getConnection(TgInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TgInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTgInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTgInoxStar:save:pre') as $callable)
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
			$con = Propel::getConnection(TgInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTgInoxStar:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TgInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TgInoxStarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPrTgInoxStars !== null) {
				foreach($this->collPrTgInoxStars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = TgInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPrTgInoxStars !== null) {
					foreach($this->collPrTgInoxStars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TgInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNam();
				break;
			case 2:
				return $this->getEn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TgInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNam(),
			$keys[2] => $this->getEn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TgInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNam($value);
				break;
			case 2:
				$this->setEn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TgInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEn($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TgInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(TgInoxStarPeer::ID)) $criteria->add(TgInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(TgInoxStarPeer::NAM)) $criteria->add(TgInoxStarPeer::NAM, $this->nam);
		if ($this->isColumnModified(TgInoxStarPeer::EN)) $criteria->add(TgInoxStarPeer::EN, $this->en);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TgInoxStarPeer::DATABASE_NAME);

		$criteria->add(TgInoxStarPeer::ID, $this->id);

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

		$copyObj->setNam($this->nam);

		$copyObj->setEn($this->en);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPrTgInoxStars() as $relObj) {
				$copyObj->addPrTgInoxStar($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new TgInoxStarPeer();
		}
		return self::$peer;
	}

	
	public function initPrTgInoxStars()
	{
		if ($this->collPrTgInoxStars === null) {
			$this->collPrTgInoxStars = array();
		}
	}

	
	public function getPrTgInoxStars($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrTgInoxStars === null) {
			if ($this->isNew()) {
			   $this->collPrTgInoxStars = array();
			} else {

				$criteria->add(PrTgInoxStarPeer::TG_ID, $this->getId());

				PrTgInoxStarPeer::addSelectColumns($criteria);
				$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrTgInoxStarPeer::TG_ID, $this->getId());

				PrTgInoxStarPeer::addSelectColumns($criteria);
				if (!isset($this->lastPrTgInoxStarCriteria) || !$this->lastPrTgInoxStarCriteria->equals($criteria)) {
					$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPrTgInoxStarCriteria = $criteria;
		return $this->collPrTgInoxStars;
	}

	
	public function countPrTgInoxStars($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PrTgInoxStarPeer::TG_ID, $this->getId());

		return PrTgInoxStarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrTgInoxStar(PrTgInoxStar $l)
	{
		$this->collPrTgInoxStars[] = $l;
		$l->setTgInoxStar($this);
	}


	
	public function getPrTgInoxStarsJoinPrInoxStar($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrTgInoxStars === null) {
			if ($this->isNew()) {
				$this->collPrTgInoxStars = array();
			} else {

				$criteria->add(PrTgInoxStarPeer::TG_ID, $this->getId());

				$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelectJoinPrInoxStar($criteria, $con);
			}
		} else {
									
			$criteria->add(PrTgInoxStarPeer::TG_ID, $this->getId());

			if (!isset($this->lastPrTgInoxStarCriteria) || !$this->lastPrTgInoxStarCriteria->equals($criteria)) {
				$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelectJoinPrInoxStar($criteria, $con);
			}
		}
		$this->lastPrTgInoxStarCriteria = $criteria;

		return $this->collPrTgInoxStars;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTgInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTgInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 