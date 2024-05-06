<?php

namespace Aznoqmous\ContaoLyraBundle\Models;

use Aznoqmous\ContaoLyraBundle\Data\Customer;
use Aznoqmous\ContaoLyraBundle\Data\Order;
use Aznoqmous\ContaoLyraBundle\Helpers\StringHelper;
use Contao\Model;

/**
 * @property string $id
 * @property string $orderId
 * @property string $email
 * @property string $amount
 * @property string $tstamp
 * @property string $createdAt
 * @property string $currency
 *
 * @property string $shopId
 * @property string $orderStatus
 * @property string $orderCycle
 * @property string $serverDate
 *
 * Last transaction
 * @property string $lastTransactionUuid
 * @property string $lastTransactionPaymentMethodType
 * @property string $lastTransactionDetailedStatus
 */
class OrderModel extends Model
{
    protected static $strTable = "tl_lyra_order";

    public function __construct($objResult = null)
    {
        $this->orderId = StringHelper::generateUuid();
        $this->createdAt = time();
        $this->tstamp = time();
        parent::__construct($objResult);
    }

    public function getOrder(): Order
    {
        $customer = new Customer($this->email);
        $order = new Order($customer, $this->amount, $this->currency);
        $order->orderId = $this->orderId;
        return $order;
    }

    public function isPaid(){
        return $this->orderStatus == "PAID";
    }
    public function isClosed(){
        return $this->orderCycle == "CLOSE";
    }
}