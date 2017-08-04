<?php


abstract class BaseCtInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nam;


	
	protected $en = '0';


	
	protected $par;

	
	protected $collPrCtInoxStars;

	
	protected $lastPrCtInoxStarCriteria = null;

	
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

	
	public function getPar()
	{

		return $this->par;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CtInoxStarPeer::ID;
		}

	} 
	
	public function setNam($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nam !== $v) {
			$this->nam = $v;
			$this->modifiedColumns[] = CtInoxStarPeer::NAM;
		}

	} 
	
	public function setEn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->en !== $v || $v === '0') {
			$this->en = $v;
			$this->modifiedColumns[] = CtInoxStarPeer::EN;
		}

	} 
	
	public function setPar($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->par !== $v) {
			$this->par = $v;
			$this->modifiedColumns[] = CtInoxStarPeer::PAR;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nam = $rs->getString($startcol + 1);

			$this->en = $rs->getString($startcol + 2);

			$this->par = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CtInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseCtInoxStar:delete:pre') as $callable)
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
			$con = Propel::getConnection(CtInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CtInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseCtInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseCtInoxStar:save:pre') as $callable)
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
			$con = Propel::getConnection(CtInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseCtInoxStar:save:post') as $callable)
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
					$pk = CtInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CtInoxStarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPrCtInoxStars !== null) {
				foreach($this->collPrCtInoxStars as $referrerFK) {
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


			if (($retval = CtInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPrCtInoxStars !== null) {
					foreach($this->collPrCtInoxStars as $referrerFK) {
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
		$pos = CtInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			case 3:
				return $this->getPar();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CtInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNam(),
			$keys[2] => $this->getEn(),
			$keys[3] => $this->getPar(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CtInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			case 3:
				$this->setPar($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CtInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEn($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPar($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CtInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(CtInoxStarPeer::ID)) $criteria->add(CtInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(CtInoxStarPeer::NAM)) $criteria->add(CtInoxStarPeer::NAM, $this->nam);
		if ($this->isColumnModified(CtInoxStarPeer::EN)) $criteria->add(CtInoxStarPeer::EN, $this->en);
		if ($this->isColumnModified(CtInoxStarPeer::PAR)) $criteria->add(CtInoxStarPeer::PAR, $this->par);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CtInoxStarPeer::DATABASE_NAME);

		$criteria->add(CtInoxStarPeer::ID, $this->id);

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

		$copyObj->setPar($this->par);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPrCtInoxStars() as $relObj) {
				$copyObj->addPrCtInoxStar($relObj->copy($deepCopy));
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
			self::$peer = new CtInoxStarPeer();
		}
		return self::$peer;
	}

	
	public function initPrCtInoxStars()
	{
		if ($this->collPrCtInoxStars === null) {
			$this->collPrCtInoxStars = array();
		}
	}

	
	public function getPrCtInoxStars($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrCtInoxStars === null) {
			if ($this->isNew()) {
			   $this->collPrCtInoxStars = array();
			} else {

				$criteria->add(PrCtInoxStarPeer::CT_ID, $this->getId());

				PrCtInoxStarPeer::addSelectColumns($criteria);
				$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrCtInoxStarPeer::CT_ID, $this->getId());

				PrCtInoxStarPeer::addSelectColumns($criteria);
				if (!isset($this->lastPrCtInoxStarCriteria) || !$this->lastPrCtInoxStarCriteria->equals($criteria)) {
					$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPrCtInoxStarCriteria = $criteria;
		return $this->collPrCtInoxStars;
	}

	
	public function countPrCtInoxStars($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PrCtInoxStarPeer::CT_ID, $this->getId());

		return PrCtInoxStarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrCtInoxStar(PrCtInoxStar $l)
	{
		$this->collPrCtInoxStars[] = $l;
		$l->setCtInoxStar($this);
	}


	
	public function getPrCtInoxStarsJoinPrInoxStar($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrCtInoxStars === null) {
			if ($this->isNew()) {
				$this->collPrCtInoxStars = array();
			} else {

				$criteria->add(PrCtInoxStarPeer::CT_ID, $this->getId());

				$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelectJoinPrInoxStar($criteria, $con);
			}
		} else {
									
			$criteria->add(PrCtInoxStarPeer::CT_ID, $this->getId());

			if (!isset($this->lastPrCtInoxStarCriteria) || !$this->lastPrCtInoxStarCriteria->equals($criteria)) {
				$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelectJoinPrInoxStar($criteria, $con);
			}
		}
		$this->lastPrCtInoxStarCriteria = $criteria;

		return $this->collPrCtInoxStars;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseCtInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseCtInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 