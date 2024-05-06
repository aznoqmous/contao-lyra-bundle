<?php

namespace Aznoqmous\ContaoLyraBundle\Data;

use Aznoqmous\ContaoLyraBundle\Helpers\StringHelper;

/**
 * @property $amount
 * @property $currency
 * @property $orderId
 * @property $customer
 */
class Order extends AbstractData
{
    /**
     * Required (integer)
     * eg : 1250 for 12.50
     * @var string
     */
    protected string $amount;
    /**
     * Required (ISO 4217 alpha-3)
     * eg: EUR
     * @var string
     */
    protected string $currency;
    protected string $orderId;
    protected Customer $customer;

    public function __construct(Customer $customer, $amount, $currency="EUR")
    {
        $this->setData([
            'amount' => $amount,
            'currency' => $currency,
            'customer' => $customer,
            'orderId' => StringHelper::generateUuid()
        ]);

    }
}