<?php

namespace Aznoqmous\ContaoLyraBundle\Data;

/**
* @property $email
* @property $reference
* @property $billingDetails
* @property $shippingDetails
 */
class Customer extends AbstractData
{

    /**
     * Required
     * @var string
     */
    protected string $email;

    protected string $reference;
    protected BillingDetails $billingDetails;
    protected ShippingDetails $shippingDetails;

    public function __construct($email)
    {
        $this->setData([
            'email' => $email,
            'billingDetails' => new BillingDetails(),
            'shippingDetails' => new ShippingDetails(),
        ]);
    }
}