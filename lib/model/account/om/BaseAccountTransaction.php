<?php

/**
 * Base class that represents a row from the 'account_transaction' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Jan 26 16:56:10 2012
 *
 * @package    lib.model.account.om
 */
abstract class BaseAccountTransaction extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AccountTransactionPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the account_id field.
	 * @var        string
	 */
	protected $account_id;

	/**
	 * The value for the bankbook_id field.
	 * @var        string
	 */
	protected $bankbook_id;

	/**
	 * The value for the account_balance field.
	 * @var        string
	 */
	protected $account_balance;

	/**
	 * @var        Transaction
	 */
	protected $aTransaction;

	/**
	 * @var        Account
	 */
	protected $aAccount;

	/**
	 * @var        Bankbook
	 */
	protected $aBankbook;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'AccountTransactionPeer';

	/**
	 * Get the [id] column value.
	 * 
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [account_id] column value.
	 * 
	 * @return     string
	 */
	public function getAccountId()
	{
		return $this->account_id;
	}

	/**
	 * Get the [bankbook_id] column value.
	 * 
	 * @return     string
	 */
	public function getBankbookId()
	{
		return $this->bankbook_id;
	}

	/**
	 * Get the [account_balance] column value.
	 * 
	 * @return     string
	 */
	public function getAccountBalance()
	{
		return $this->account_balance;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     AccountTransaction The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AccountTransactionPeer::ID;
		}

		if ($this->aTransaction !== null && $this->aTransaction->getId() !== $v) {
			$this->aTransaction = null;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [account_id] column.
	 * 
	 * @param      string $v new value
	 * @return     AccountTransaction The current object (for fluent API support)
	 */
	public function setAccountId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = AccountTransactionPeer::ACCOUNT_ID;
		}

		if ($this->aAccount !== null && $this->aAccount->getId() !== $v) {
			$this->aAccount = null;
		}

		return $this;
	} // setAccountId()

	/**
	 * Set the value of [bankbook_id] column.
	 * 
	 * @param      string $v new value
	 * @return     AccountTransaction The current object (for fluent API support)
	 */
	public function setBankbookId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bankbook_id !== $v) {
			$this->bankbook_id = $v;
			$this->modifiedColumns[] = AccountTransactionPeer::BANKBOOK_ID;
		}

		if ($this->aBankbook !== null && $this->aBankbook->getId() !== $v) {
			$this->aBankbook = null;
		}

		return $this;
	} // setBankbookId()

	/**
	 * Set the value of [account_balance] column.
	 * 
	 * @param      string $v new value
	 * @return     AccountTransaction The current object (for fluent API support)
	 */
	public function setAccountBalance($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->account_balance !== $v) {
			$this->account_balance = $v;
			$this->modifiedColumns[] = AccountTransactionPeer::ACCOUNT_BALANCE;
		}

		return $this;
	} // setAccountBalance()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->account_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->bankbook_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->account_balance = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = AccountTransactionPeer::NUM_COLUMNS - AccountTransactionPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AccountTransaction object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aTransaction !== null && $this->id !== $this->aTransaction->getId()) {
			$this->aTransaction = null;
		}
		if ($this->aAccount !== null && $this->account_id !== $this->aAccount->getId()) {
			$this->aAccount = null;
		}
		if ($this->aBankbook !== null && $this->bankbook_id !== $this->aBankbook->getId()) {
			$this->aBankbook = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AccountTransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AccountTransactionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aTransaction = null;
			$this->aAccount = null;
			$this->aBankbook = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AccountTransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAccountTransaction:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				AccountTransactionPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAccountTransaction:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AccountTransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAccountTransaction:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseAccountTransaction:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				AccountTransactionPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aTransaction !== null) {
				if ($this->aTransaction->isModified() || $this->aTransaction->isNew()) {
					$affectedRows += $this->aTransaction->save($con);
				}
				$this->setTransaction($this->aTransaction);
			}

			if ($this->aAccount !== null) {
				if ($this->aAccount->isModified() || $this->aAccount->isNew()) {
					$affectedRows += $this->aAccount->save($con);
				}
				$this->setAccount($this->aAccount);
			}

			if ($this->aBankbook !== null) {
				if ($this->aBankbook->isModified() || $this->aBankbook->isNew()) {
					$affectedRows += $this->aBankbook->save($con);
				}
				$this->setBankbook($this->aBankbook);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AccountTransactionPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += AccountTransactionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
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

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aTransaction !== null) {
				if (!$this->aTransaction->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTransaction->getValidationFailures());
				}
			}

			if ($this->aAccount !== null) {
				if (!$this->aAccount->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAccount->getValidationFailures());
				}
			}

			if ($this->aBankbook !== null) {
				if (!$this->aBankbook->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBankbook->getValidationFailures());
				}
			}


			if (($retval = AccountTransactionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AccountTransactionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getAccountId();
				break;
			case 2:
				return $this->getBankbookId();
				break;
			case 3:
				return $this->getAccountBalance();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AccountTransactionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAccountId(),
			$keys[2] => $this->getBankbookId(),
			$keys[3] => $this->getAccountBalance(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AccountTransactionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setAccountId($value);
				break;
			case 2:
				$this->setBankbookId($value);
				break;
			case 3:
				$this->setAccountBalance($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AccountTransactionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAccountId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBankbookId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAccountBalance($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AccountTransactionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AccountTransactionPeer::ID)) $criteria->add(AccountTransactionPeer::ID, $this->id);
		if ($this->isColumnModified(AccountTransactionPeer::ACCOUNT_ID)) $criteria->add(AccountTransactionPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(AccountTransactionPeer::BANKBOOK_ID)) $criteria->add(AccountTransactionPeer::BANKBOOK_ID, $this->bankbook_id);
		if ($this->isColumnModified(AccountTransactionPeer::ACCOUNT_BALANCE)) $criteria->add(AccountTransactionPeer::ACCOUNT_BALANCE, $this->account_balance);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AccountTransactionPeer::DATABASE_NAME);

		$criteria->add(AccountTransactionPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of AccountTransaction (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setId($this->id);

		$copyObj->setAccountId($this->account_id);

		$copyObj->setBankbookId($this->bankbook_id);

		$copyObj->setAccountBalance($this->account_balance);


		$copyObj->setNew(true);

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     AccountTransaction Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     AccountTransactionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AccountTransactionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Transaction object.
	 *
	 * @param      Transaction $v
	 * @return     AccountTransaction The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTransaction(Transaction $v = null)
	{
		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getId());
		}

		$this->aTransaction = $v;

		// Add binding for other direction of this 1:1 relationship.
		if ($v !== null) {
			$v->setAccountTransaction($this);
		}

		return $this;
	}


	/**
	 * Get the associated Transaction object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Transaction The associated Transaction object.
	 * @throws     PropelException
	 */
	public function getTransaction(PropelPDO $con = null)
	{
		if ($this->aTransaction === null && (($this->id !== "" && $this->id !== null))) {
			$this->aTransaction = TransactionPeer::retrieveByPk($this->id);
			// Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
			$this->aTransaction->setAccountTransaction($this);
		}
		return $this->aTransaction;
	}

	/**
	 * Declares an association between this object and a Account object.
	 *
	 * @param      Account $v
	 * @return     AccountTransaction The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAccount(Account $v = null)
	{
		if ($v === null) {
			$this->setAccountId(NULL);
		} else {
			$this->setAccountId($v->getId());
		}

		$this->aAccount = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Account object, it will not be re-added.
		if ($v !== null) {
			$v->addAccountTransaction($this);
		}

		return $this;
	}


	/**
	 * Get the associated Account object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Account The associated Account object.
	 * @throws     PropelException
	 */
	public function getAccount(PropelPDO $con = null)
	{
		if ($this->aAccount === null && (($this->account_id !== "" && $this->account_id !== null))) {
			$this->aAccount = AccountPeer::retrieveByPk($this->account_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAccount->addAccountTransactions($this);
			 */
		}
		return $this->aAccount;
	}

	/**
	 * Declares an association between this object and a Bankbook object.
	 *
	 * @param      Bankbook $v
	 * @return     AccountTransaction The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBankbook(Bankbook $v = null)
	{
		if ($v === null) {
			$this->setBankbookId(NULL);
		} else {
			$this->setBankbookId($v->getId());
		}

		$this->aBankbook = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Bankbook object, it will not be re-added.
		if ($v !== null) {
			$v->addAccountTransaction($this);
		}

		return $this;
	}


	/**
	 * Get the associated Bankbook object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Bankbook The associated Bankbook object.
	 * @throws     PropelException
	 */
	public function getBankbook(PropelPDO $con = null)
	{
		if ($this->aBankbook === null && (($this->bankbook_id !== "" && $this->bankbook_id !== null))) {
			$this->aBankbook = BankbookPeer::retrieveByPk($this->bankbook_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aBankbook->addAccountTransactions($this);
			 */
		}
		return $this->aBankbook;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aTransaction = null;
			$this->aAccount = null;
			$this->aBankbook = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseAccountTransaction:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseAccountTransaction::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseAccountTransaction
