<?php


/**
 * Skeleton subclass for representing a row from the 'connection' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun May  1 11:41:29 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.basic
 */
class Cash extends BaseCash 
{
  const OPENED = 'opened';
  const CLOSED = 'close';

  /**
   * Method toString
   * 
   * @return string 
   */
  public function __toString() 
  {
    return $this->getName().' / '.$this->getAgency();
  }
  
  /**
   *
   * @param type $amount
   * @param PropelPDO $con 
   */
  public function accredit($amount, PropelPDO $con)
  {
    $this->setBalance($this->getBalance() + $amount);
    $this->save($con);
  }
  
  /**
   *
   * @param type $amount
   * @param PropelPDO $con 
   */
  public function debit($amount, PropelPDO $con)
  {
    $this->setBalance($this->getBalance() - $amount);
    $this->save($con); 
  }

    /**
   * Open this cash                                                       cc
   */
  public function open()
  {
    $this->setStatus(self::OPENED);
    $this->save();
  }
  
  /**
   * close this cash
   */
  public function close()
  {
    $this->setStatus(self::CLOSED);
    $this->save();
  }

} // Connection
