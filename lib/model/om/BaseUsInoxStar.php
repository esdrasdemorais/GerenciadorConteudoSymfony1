<?php


abstract class BaseUsInoxStar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nam;


	
	protected $pas;


	
	protected $en = '0';


	
	protected $admin = '0';


	
	protected $sal;

	
	protected $collPrInoxStars;

	
	protected $lastPrInoxStarCriteria = null;

	
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

	
	public function getPas()
	{

		return $this->pas;
	}

	
	public function getEn()
	{

		return $this->en;
	}

	
	public function getAdmin()
	{

		return $this->admin;
	}

	
	public function getSal()
	{

		return $this->sal;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsInoxStarPeer::ID;
		}

	} 
	
	public function setNam($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nam !== $v) {
			$this->nam = $v;
			$this->modifiedColumns[] = UsInoxStarPeer::NAM;
		}

	} 
	
	public function setPas($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pas !== $v) {
			$this->pas = $v;
			$this->modifiedColumns[] = UsInoxStarPeer::PAS;
		}

	} 
	
	public function setEn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->en !== $v || $v === '0') {
			$this->en = $v;
			$this->modifiedColumns[] = UsInoxStarPeer::EN;
		}

	} 
	
	public function setAdmin($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->admin !== $v || $v === '0') {
			$this->admin = $v;
			$this->modifiedColumns[] = UsInoxStarPeer::ADMIN;
		}

	} 
	
	public function setSal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sal !== $v) {
			$this->sal = $v;
			$this->modifiedColumns[] = UsInoxStarPeer::SAL;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nam = $rs->getString($startcol + 1);

			$this->pas = $rs->getString($startcol + 2);

			$this->en = $rs->getString($startcol + 3);

			$this->admin = $rs->getString($startcol + 4);

			$this->sal = $rs->getString($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating UsInoxStar object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseUsInoxStar:delete:pre') as $callable)
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
			$con = Propel::getConnection(UsInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsInoxStarPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseUsInoxStar:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseUsInoxStar:save:pre') as $callable)
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
			$con = Propel::getConnection(UsInoxStarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseUsInoxStar:save:post') as $callable)
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
					$pk = UsInoxStarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UsInoxStarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPrInoxStars !== null) {
				foreach($this->collPrInoxStars as $referrerFK) {
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


			if (($retval = UsInoxStarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPrInoxStars !== null) {
					foreach($this->collPrInoxStars as $referrerFK) {
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
		$pos = UsInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPas();
				break;
			case 3:
				return $this->getEn();
				break;
			case 4:
				return $this->getAdmin();
				break;
			case 5:
				return $this->getSal();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsInoxStarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNam(),
			$keys[2] => $this->getPas(),
			$keys[3] => $this->getEn(),
			$keys[4] => $this->getAdmin(),
			$keys[5] => $this->getSal(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsInoxStarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPas($value);
				break;
			case 3:
				$this->setEn($value);
				break;
			case 4:
				$this->setAdmin($value);
				break;
			case 5:
				$this->setSal($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsInoxStarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAdmin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSal($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsInoxStarPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsInoxStarPeer::ID)) $criteria->add(UsInoxStarPeer::ID, $this->id);
		if ($this->isColumnModified(UsInoxStarPeer::NAM)) $criteria->add(UsInoxStarPeer::NAM, $this->nam);
		if ($this->isColumnModified(UsInoxStarPeer::PAS)) $criteria->add(UsInoxStarPeer::PAS, $this->pas);
		if ($this->isColumnModified(UsInoxStarPeer::EN)) $criteria->add(UsInoxStarPeer::EN, $this->en);
		if ($this->isColumnModified(UsInoxStarPeer::ADMIN)) $criteria->add(UsInoxStarPeer::ADMIN, $this->admin);
		if ($this->isColumnModified(UsInoxStarPeer::SAL)) $criteria->add(UsInoxStarPeer::SAL, $this->sal);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsInoxStarPeer::DATABASE_NAME);

		$criteria->add(UsInoxStarPeer::ID, $this->id);

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

		$copyObj->setPas($this->pas);

		$copyObj->setEn($this->en);

		$copyObj->setAdmin($this->admin);

		$copyObj->setSal($this->sal);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPrInoxStars() as $relObj) {
				$copyObj->addPrInoxStar($relObj->copy($deepCopy));
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
			self::$peer = new UsInoxStarPeer();
		}
		return self::$peer;
	}

	
	public function initPrInoxStars()
	{
		if ($this->collPrInoxStars === null) {
			$this->collPrInoxStars = array();
		}
	}

	
	public function getPrInoxStars($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrInoxStars === null) {
			if ($this->isNew()) {
			   $this->collPrInoxStars = array();
			} else {

				$criteria->add(PrInoxStarPeer::US_ID, $this->getId());

				PrInoxStarPeer::addSelectColumns($criteria);
				$this->collPrInoxStars = PrInoxStarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrInoxStarPeer::US_ID, $this->getId());

				PrInoxStarPeer::addSelectColumns($criteria);
				if (!isset($this->lastPrInoxStarCriteria) || !$this->lastPrInoxStarCriteria->equals($criteria)) {
					$this->collPrInoxStars = PrInoxStarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPrInoxStarCriteria = $criteria;
		return $this->collPrInoxStars;
	}

	
	public function countPrInoxStars($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PrInoxStarPeer::US_ID, $this->getId());

		return PrInoxStarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrInoxStar(PrInoxStar $l)
	{
		$this->collPrInoxStars[] = $l;
		$l->setUsInoxStar($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseUsInoxStar:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseUsInoxStar::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 