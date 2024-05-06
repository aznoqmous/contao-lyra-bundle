<?php

namespace Aznoqmous\ContaoLyraBundle\Event;

use Aznoqmous\ContaoLyraBundle\Models\OrderModel;
use Symfony\Contracts\EventDispatcher\Event;

class OrderUpdatedEvent extends Event
{
    public OrderModel $orderModel;

    /**
     * @param OrderModel $orderModel
     * @param array $answer Lyra answer
     */
    public function __construct(OrderModel $orderModel, array $answer)
    {
        $this->orderModel = $orderModel;
        $this->answer = $answer;
    }
}
