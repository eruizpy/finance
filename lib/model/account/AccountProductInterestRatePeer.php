<?php


/**
 * Skeleton subclass for performing query and update operations on the 'account_product_interest_rate' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Tue Aug  2 09:37:24 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.account
 */
class AccountProductInterestRatePeer extends BaseAccountProductInterestRatePeer 
{
  /**
   * Return the maximum value of a column
   * 
   * @param string $column
   * @param Criteria $criteria
   * @return int 
   */
  public static function max($column, Criteria $criteria = null)
  {
    if(!$criteria)
    {
      $criteria = new Criteria();
    }
    
    $criteria->clearSelectColumns()->addSelectColumn('MAX(' . $column . ')');
    $stmt = self::doSelectStmt($criteria);

    $row = $stmt->fetch(PDO::FETCH_NUM);
    $max= (int) $row[0];
    
    return $max;
  }
  
  /**
   * Return the maximum value of the column product_id
   * 
   * @param int $productId
   * @return int 
   */
  public static function maxByProductId($productId)
  {
    $criteria->add(self::ACCOUNT_PRODUCT_ID, $productId, Criteria::EQUAL);
    
    return self::max(self::RATE_UNIQUE_ID, $criteria);
  }
} // AccountProductInterestRatePeer