<?php


/**
 * Skeleton subclass for representing a row from the 'account' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Feb 17 18:59:47 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.account
 */
class Account extends BaseAccount 
{
 /**
  * Initializes internal state of Account object.
  * @see        parent::__construct()
  */
  public function __construct()
  {
    // Make sure that parent constructor is always invoked, since that
    // is where any default values for this object are set.
    parent::__construct();
  }

  /**
   * Save this object
   * 
   * @param PropelPDO $con 
   * @see  BaseAccount::Save()
   */
  public function  save(PropelPDO $con = null) 
  {
    if (is_null($con)){
      $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }
    
    $con->beginTransaction();
    
    try{
      
      if($this->isNew()){
        $this->setNumber(AccountPeer::generateNumber());
      }
      
      parent::save($con);
      
      $con->commit();

    }catch (Exception $e){
      $con->rollBack();
      throw $e;
    }
  }

  /**
   * Post insert this object
   * 
   * @param PropelPDO $con 
   */
  public function postInsert(PropelPDO $con = null) 
  {
    $this->updateNextCapitalization($con);
    
    parent::postInsert($con);
  }
  
  /**
   * Update next capitalization
   */
  public function updateNextCapitalization(PropelPDO $con)
  {
    $createdAt = $this->getCreatedAt('U');
    $lastCpt = $this->getLastCapitalization('U');
    
    if(!$this->getLastCapitalization()){
      $lastCpt = mktime(0, 0, 0, date("m", $createdAt), date("d", $createdAt), date("Y",$createdAt));
    }else{
      $lastCpt = mktime(0, 0, 0, date("m", $lastCpt), date("d", $lastCpt), date("Y",$lastCpt));
    }
    
    $cptFrequency = $this->getProduct()->getCapitalizationFrequency();
    $nextCapitalization = AccountPeer::calculateNextCapitalization2($lastCpt, $cptFrequency);
    
    $this->setNextCapitalization($nextCapitalization);
    $this->save($con);
  }

  /**
   * Validates if the available balance is sufficient to perform debit operation.
   * 
   * @param decimal $amount
   * @return boolean 
   */
  public function hasAvailableBalance($amount)
  {
    $b = false;
    
    if($this->getAvailableBalance() >= $amount){
      $b = true;
    }
    
    return $b;
  }

  /**
   * Transfer to investment
   * 
   * @param Investment $investment
   * @param sfGuardUser $user
   * @param Cash $connection
   * @param type $amount
   * @param PropelPDO $con 
   */
  public function transferToInvestment(Investment $investment, sfGuardUser $user, $amount, PropelPDO $con = null)
  {
    if (is_null($con)){
      $con = Propel::getConnection(TransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }
    
    $actTransactionType = TransactionTypePeer::retrieveByOperationType(TransactionType::ACCOUNT_TRANSFER_TO_INVESTMENT);
    
    $invTransactionType = TransactionTypePeer::retrieveByOperationType(TransactionType::INVESTMENT_TRANSFER_FROM_ACCOUNT);
    
    $con->beginTransaction();
    try
    {
      $transaction = new Transaction($user, $actTransactionType, $amount);
      $transaction->save($con);
      
      $actTransaction = new AccountTransaction($transaction, $this);
      $actTransaction->save($con);
     
      $transaction = new Transaction($user, $invTransactionType, $amount, $observation);
      $transaction->save($con);
      
      $invTransaction = new InvestmentTransaction($transaction, $investment);
      $invTransaction->save($con);
      
      $investment->setIsCurrent(true);
      $investment->save($con);

      $con->commit();

    }
    catch (Exception $e)
    {
      $con->rollBack();
      throw $e;
    }  
  }
  
  /**
   * Return the daily balance
   * 
   * @param string $date in format 'U'
   * @return decimal 
   */
  public function getBalanceDay($date)
  {
    $toDate = mktime(23, 59, 59, date("m", $date), date("d", $date), date("Y", $date));
    
    $criteria = new Criteria();
    
    $criteria->addJoin(AccountTransactionPeer::ID, TransactionPeer::ID, Criteria::LEFT_JOIN);
    $criteria->add(AccountTransactionPeer::ACCOUNT_ID, $this->getId(), Criteria::EQUAL);
    $criteria->addAnd(TransactionPeer::CREATED_AT, $toDate, Criteria::LESS_EQUAL);
    $criteria->addDescendingOrderByColumn(AccountTransactionPeer::ID);
    
    $transaction = AccountTransactionPeer::doSelectOne($criteria);
    
    if($transaction){
      $balance = $transaction->getAccountBalance();
    }else{
      $balance = $this->getBalance();
    }
    
    return $balance;
  }
  
  /**
   * Get interest accumulated
   * 
   * @return decimal 
   */
  public function getInterestAccumulated()
  {
    $lastCpt = $this->getLastCapitalization('U');
    $createdAt = $this->getCreatedAt('U');
    
    if(!$lastCpt){      
      $lastdate = mktime(0, 0, 0, date("m", $createdAt), date("d", $createdAt), date("Y", $createdAt));
    }else{ 
      $lastdate = mktime(0, 0, 0, date("m", $lastCpt), date("d", $lastCpt), date("Y", $lastCpt));
    }

    $now = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
    $days = ($now - $lastdate)/86400;
    $date = $lastdate;
    $sumInterest = 0.00;
    $interestRate = $this->getProduct()->getInterestRateCurrent();

    if(!$interestRate){
      $interestRateValue = 0.00;
    }else{
      $interestRateValue = $interestRate->getValue();
    }

    for ($i = 0; $i < $days; $i++){
      
      $balanceDay = $this->getBalanceDay($date);
      $interest = (($interestRateValue / 100) * $balanceDay)/360;
      $sumInterest = $sumInterest + $interest;
      $date = mktime(0, 0, 0, date("m", $date), date("d", $date)+1, date("Y", $date)); 
    }
    
    return round($sumInterest, 2);
  }

  /**
   * Return true if has capitalization expired else return false
   * 
   * @return boolean 
   */
  public function isCapitalizacionExpired()
  {
    $b = false;
    
    $nextCapt = $this->getNextCapitalization('U');
    $now = mktime(0, 0, 0, date("m"), date('d'), date('Y'));
    $nextCpt = mktime(0, 0, 0, date("m", $nextCapt), date('d', $nextCapt), date('Y', $nextCapt));
    
    if($now >= $nextCpt){
      $b = true;
    }
    
    return $b;
  }

  /**
   * Capitalize interest
   * 
   * @param Cash $connection
   * @param sfGuardUser $user
   * @param TransactionType $actTransactionType
   * @param PropelPDO $con 
   */
  public function capitalizeInterest(sfGuardUser $user, TransactionType $actTransactionType, PropelPDO $con = null)
  {
    if($con == null){
      $con = Propel::getConnection(TransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }
    
    $amount = $this->getInterestAccumulated();
    
    $con->beginTransaction();
    try
    {      
      $transaction = new Transaction($user, $actTransactionType, $amount);
      $transaction->save($con);
      
      $accountTransaction = new AccountTransaction($transaction, $this);
      $accountTransaction->save($con);
      
      $this->setLastCapitalization(time());
      $this->updateNextCapitalization($con);
      $this->save($con);
      
      $con->commit();
    }
    catch (Exception $e)
    {
      $con->rollBack();
      throw $e;
    }
  }

  /**
   * Return the account_transactions
   * 
   * @param dataTime $fromDate
   * @param dataTime $toDate 
   * @return array
   */
  public function getTransactions($fromDate, $toDate)
  {
    $criteria = new Criteria();
    $criteria->add(TransactionPeer::CREATED_AT, $fromDate, Criteria::GREATER_EQUAL);
    $criteria->add(TransactionPeer::CREATED_AT, $toDate, Criteria::LESS_EQUAL);
    
    $transactions = $this->getAccountTransactionsJoinTransaction($criteria);
    
    return $transactions;
  }
  
  /**
   * Get capitalization frequency
   * 
   * @return type 
   */
  public function getCapitalizationFrequency()
  {
    return $this->getProduct()->getCapitalizationFrequency();
  }
  
  /**
   * Count transactions by bankbookid = null
   * 
   * @return int 
   */
  public function CountTransacctionsByBankbookIdNull()
  {
    $criteria = new Criteria();
    $criteria->add(AccountTransactionPeer::BANKBOOK_ID, null, Criteria::EQUAL);
    
    return $this->countAccountTransactions($criteria);
  }
  
  /**
   * Block balance
   * 
   * @param decimal $amount
   * @param PropelPDO $con 
   */
  public function blockBalance($amount,  PropelPDO $con = null)
  { 
    if($con == null){
      $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }
    
    $con->beginTransaction();
    
    try{ 
      
      $this->setAvailableBalance($this->getAvailableBalance() - $amount);
      $this->setBlockedBalance($this->getBlockedBalance() + $amount);
      
      $this->save($con);
      
      $con->commit();
      
    }catch (Exception $e){
      $con->rollBack();
      throw $e;
    }
  }
  
  /**
   * Unblock balance
   * 
   * @param decimal $amount
   * @param PropelPDO $con 
   */
  public function unblockBalance($amount,  PropelPDO $con = null)
  { 
    if($con == null){
      $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }
    
    $con->beginTransaction();
    
    try{ 
      
      $this->setAvailableBalance($this->getAvailableBalance() + $amount);
      $this->setBlockedBalance($this->getBlockedBalance() - $amount);
      
      $this->save($con);
      
      $con->commit();
      
    }catch (Exception $e){
      $con->rollBack();
      throw $e;
    }
  }

    /**
   * Method toString
   * 
   * @return string 
   */
  public function  __toString() 
  {
      return $this->getNumber().' / '.$this->getAssociate()->getName().' / '.$this->getAvailableBalance();
  }

} // Account