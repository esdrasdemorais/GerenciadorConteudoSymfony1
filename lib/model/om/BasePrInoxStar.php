<?php


abstract class BasePrInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nam;


	
	protected $price;


	
	protected $us_id;


	
	protected $en = '0';


	
	protected $descr;

	
	protected $aUsInoxStar;

	
	protected $collPrCtInoxStars;

	
	protected $lastPrCtInoxStarCriteria = null;

	
	protected $collPrPhInoxStars;

	
	protected $lastPrPhInoxStarCriteria = null;

	
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

	
	public function getPrice()
	{

		return $this->price;
	}

	
	public function getUsId()
	{

		return $this->us_id;
	}

	
	public function getEn()
	{

		return $this->en;
	}

	
	public function getDescr()
	{

		return $this->descr;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PrInoxStarPeer::ID;
		}

	} 
	
	public function setNam($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nam !== $v) {
			$this->nam = $v;
			$this->modifiedColumns[] = PrInoxStarPeer::NAM;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = PrInoxStarPeer::PRICE;
		}

	} 
	
	public function setUsId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->us_id !== $v) {
			$this->us_id = $v;
			$this->modifiedColumns[] = PrInoxStarPeer::US_ID;
		}

		if ($this->aUsInoxStar !== null && $this->aUsInoxStar->getId() !== $v) {
			$this->aUsInoxStar = null;
		}

	} 
	
	public function setEn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->en !== $v || $v === '0') {
			$this->en = $v;
			$this->modifiedColumns[] = PrInoxStarPeer::EN;
		}

	} 
	
	public function setDescr($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descr !== $v) {
			$this->descr = $v;
			$this->modifiedColumns[] = PrInoxStarPeer::DESCR;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nam = $rs->getString($startcol + 1);

			$this->price = $rs->getFloat($startcol + 2);

			$this->us_id = $rs->getInt($startcol + 3);

			$this->en = $rs->getString($startcol + 4);

			$this->descr = $rs->getString($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PrInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStar:delete:pre') as $callable)
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
			$con = Propel::getConnection(PrInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PrInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasePrInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasePrInoxStar:save:pre') as $callable)
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
			$con = Propel::getConnection(PrInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasePrInoxStar:save:post') as $callable)
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


												
			if ($this->aUsInoxStar !== null) {
				if ($this->aUsInoxStar->isModified()) {
					$affectedRows += $this->aUsInoxStar->save($con);
				}
				$this->setUsInoxStar($this->aUsInoxStar);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PrInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PrInoxStarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPrCtInoxStars !== null) {
				foreach($this->collPrCtInoxStars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPrPhInoxStars !== null) {
				foreach($this->collPrPhInoxStars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aUsInoxStar !== null) {
				if (!$this->aUsInoxStar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsInoxStar->getValidationFailures());
				}
			}


			if (($retval = PrInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPrCtInoxStars !== null) {
					foreach($this->collPrCtInoxStars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPrPhInoxStars !== null) {
					foreach($this->collPrPhInoxStars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = PrInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPrice();
				break;
			case 3:
				return $this->getUsId();
				break;
			case 4:
				return $this->getEn();
				break;
			case 5:
				return $this->getDescr();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNam(),
			$keys[2] => $this->getPrice(),
			$keys[3] => $this->getUsId(),
			$keys[4] => $this->getEn(),
			$keys[5] => $this->getDescr(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPrice($value);
				break;
			case 3:
				$this->setUsId($value);
				break;
			case 4:
				$this->setEn($value);
				break;
			case 5:
				$this->setDescr($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUsId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescr($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PrInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(PrInoxStarPeer::ID)) $criteria->add(PrInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(PrInoxStarPeer::NAM)) $criteria->add(PrInoxStarPeer::NAM, $this->nam);
		if ($this->isColumnModified(PrInoxStarPeer::PRICE)) $criteria->add(PrInoxStarPeer::PRICE, $this->price);
		if ($this->isColumnModified(PrInoxStarPeer::US_ID)) $criteria->add(PrInoxStarPeer::US_ID, $this->us_id);
		if ($this->isColumnModified(PrInoxStarPeer::EN)) $criteria->add(PrInoxStarPeer::EN, $this->en);
		if ($this->isColumnModified(PrInoxStarPeer::DESCR)) $criteria->add(PrInoxStarPeer::DESCR, $this->descr);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PrInoxStarPeer::DATABASE_NAME);

		$criteria->add(PrInoxStarPeer::ID, $this->id);

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

		$copyObj->setPrice($this->price);

		$copyObj->setUsId($this->us_id);

		$copyObj->setEn($this->en);

		$copyObj->setDescr($this->descr);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPrCtInoxStars() as $relObj) {
				$copyObj->addPrCtInoxStar($relObj->copy($deepCopy));
			}

			foreach($this->getPrPhInoxStars() as $relObj) {
				$copyObj->addPrPhInoxStar($relObj->copy($deepCopy));
			}

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
			self::$peer = new PrInoxStarPeer();
		}
		return self::$peer;
	}

	
	public function setUsInoxStar($v)
	{


		if ($v === null) {
			$this->setUsId(NULL);
		} else {
			$this->setUsId($v->getId());
		}


		$this->aUsInoxStar = $v;
	}


	
	public function getUsInoxStar($con = null)
	{
		if ($this->aUsInoxStar === null && ($this->us_id !== null)) {
						$this->aUsInoxStar = UsInoxStarPeer::retrieveByPK($this->us_id, $con);

			
		}
		return $this->aUsInoxStar;
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

				$criteria->add(PrCtInoxStarPeer::PR_ID, $this->getId());

				PrCtInoxStarPeer::addSelectColumns($criteria);
				$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrCtInoxStarPeer::PR_ID, $this->getId());

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

		$criteria->add(PrCtInoxStarPeer::PR_ID, $this->getId());

		return PrCtInoxStarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrCtInoxStar(PrCtInoxStar $l)
	{
		$this->collPrCtInoxStars[] = $l;
		$l->setPrInoxStar($this);
	}


	
	public function getPrCtInoxStarsJoinCtInoxStar($criteria = null, $con = null)
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

				$criteria->add(PrCtInoxStarPeer::PR_ID, $this->getId());

				$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelectJoinCtInoxStar($criteria, $con);
			}
		} else {
									
			$criteria->add(PrCtInoxStarPeer::PR_ID, $this->getId());

			if (!isset($this->lastPrCtInoxStarCriteria) || !$this->lastPrCtInoxStarCriteria->equals($criteria)) {
				$this->collPrCtInoxStars = PrCtInoxStarPeer::doSelectJoinCtInoxStar($criteria, $con);
			}
		}
		$this->lastPrCtInoxStarCriteria = $criteria;

		return $this->collPrCtInoxStars;
	}

	
	public function initPrPhInoxStars()
	{
		if ($this->collPrPhInoxStars === null) {
			$this->collPrPhInoxStars = array();
		}
	}

	
	public function getPrPhInoxStars($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrPhInoxStars === null) {
			if ($this->isNew()) {
			   $this->collPrPhInoxStars = array();
			} else {

				$criteria->add(PrPhInoxStarPeer::PR_ID, $this->getId());

				PrPhInoxStarPeer::addSelectColumns($criteria);
				$this->collPrPhInoxStars = PrPhInoxStarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrPhInoxStarPeer::PR_ID, $this->getId());

				PrPhInoxStarPeer::addSelectColumns($criteria);
				if (!isset($this->lastPrPhInoxStarCriteria) || !$this->lastPrPhInoxStarCriteria->equals($criteria)) {
					$this->collPrPhInoxStars = PrPhInoxStarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPrPhInoxStarCriteria = $criteria;
		return $this->collPrPhInoxStars;
	}

	
	public function countPrPhInoxStars($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PrPhInoxStarPeer::PR_ID, $this->getId());

		return PrPhInoxStarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrPhInoxStar(PrPhInoxStar $l)
	{
		$this->collPrPhInoxStars[] = $l;
		$l->setPrInoxStar($this);
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

				$criteria->add(PrTgInoxStarPeer::PR_ID, $this->getId());

				PrTgInoxStarPeer::addSelectColumns($criteria);
				$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrTgInoxStarPeer::PR_ID, $this->getId());

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

		$criteria->add(PrTgInoxStarPeer::PR_ID, $this->getId());

		return PrTgInoxStarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrTgInoxStar(PrTgInoxStar $l)
	{
		$this->collPrTgInoxStars[] = $l;
		$l->setPrInoxStar($this);
	}


	
	public function getPrTgInoxStarsJoinTgInoxStar($criteria = null, $con = null)
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

				$criteria->add(PrTgInoxStarPeer::PR_ID, $this->getId());

				$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelectJoinTgInoxStar($criteria, $con);
			}
		} else {
									
			$criteria->add(PrTgInoxStarPeer::PR_ID, $this->getId());

			if (!isset($this->lastPrTgInoxStarCriteria) || !$this->lastPrTgInoxStarCriteria->equals($criteria)) {
				$this->collPrTgInoxStars = PrTgInoxStarPeer::doSelectJoinTgInoxStar($criteria, $con);
			}
		}
		$this->lastPrTgInoxStarCriteria = $criteria;

		return $this->collPrTgInoxStars;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasePrInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasePrInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 