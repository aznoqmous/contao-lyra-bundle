<?php

namespace Aznoqmous\ContaoLyraBundle\EventListener\DataContainer;

use Aznoqmous\ContaoLyraBundle\Models\OrderModel;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\Date;

class LyraOrderListener
{
    /**
     * @Callback(table="tl_lyra_order", target="list.label.label")
     */
    public function getLabels($data, $label, $dca, $args=[])
    {
        $order = OrderModel::findById($data['id']);

        foreach ($GLOBALS['TL_DCA']['tl_lyra_order']['list']['label']['fields'] as $k => $field) {
            $value = $order->{$field};

            switch($field){
                case "createdAt":
                case "tstamp":
                    $args[$k] = Date::parse("d/m/Y H:i:s", $value);
                    break;
                case "amount":
                    $args[$k] = $value / 100;
                    break;
                case "orderCycle":
                    $args[$k] = $GLOBALS['TL_LANG']['lyra']['orderCycles'][$value];
                    break;
                case "orderStatus":
                    $args[$k] = $this->renderOrderBadge($value, $GLOBALS['TL_LANG']['lyra']['orderStatuses'][$value]);
                    break;
                case "lastTransactionDetailedStatus":
                    $args[$k] = $this->renderTransactionBadge($value, $GLOBALS['TL_LANG']['lyra']['transactionStatuses'][$value]);
                    break;
                case "lastTransactionPaymentMethodType":
                    $args[$k] = $GLOBALS['TL_LANG']['lyra']['paymentMethods'][$value];
                    break;
                default:
                    $args[$k] = $value;
                    break;
            }
        }

        return $args;
    }

    public function renderOrderBadge($status, $content){
        $class = "pending";
        if(in_array($status, $GLOBALS['TL_LANG']['lyra']['order_valid'])) $class = "valid";
        else if(in_array($status, $GLOBALS['TL_LANG']['lyra']['order_error'])) $class = "error";
        return "<span class=\"badge badge-{$class}\">{$content}</span>";
    }
    public function renderTransactionBadge($status, $content){
        $class = "pending";
        if(in_array($status, $GLOBALS['TL_LANG']['lyra']['transaction_valid'])) $class = "valid";
        else if(in_array($status, $GLOBALS['TL_LANG']['lyra']['transaction_error'])) $class = "error";
        return "<span class=\"badge badge-{$class}\">{$content}</span>";
    }
}