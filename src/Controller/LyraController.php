<?php

namespace Aznoqmous\ContaoLyraBundle\Controller;

use Aznoqmous\ContaoLyraBundle\Config\LyraConfig;
use Aznoqmous\ContaoLyraBundle\Event\LyraEvents;
use Aznoqmous\ContaoLyraBundle\Event\OrderUpdatedEvent;
use Aznoqmous\ContaoLyraBundle\Models\OrderModel;
use Contao\CoreBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LyraController extends AbstractController
{

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }


    /**
     * @Route("/api/lyra/success", name="api_lyra_success")
     */
    public function success()
    {
        $this->handleUpdate();
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @Route("/api/lyra/notification", name="api_lyra_notification")
     */
    public function notification()
    {
        $this->handleUpdate();
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    private function handleUpdate(){
        $this->initializeContaoFramework();
        $checkHash = $this->checkHash($_POST, LyraConfig::getShaKey());

        // Unmatched hash
        if(!$checkHash) throw new \Exception("Signature check fail", $_POST);

        $request = Request::createFromGlobals();
        $answer = json_decode($request->request->get('kr-answer'), true);


        // Update or create order
        $order = OrderModel::findOneBy('orderId', $answer['orderDetails']['orderId']) ?: new OrderModel();
        $order->tstamp = time();
        $order->createdAt = $order->createdAt ?: time();
        $order->shopId = $answer['shopId'];
        $order->orderId = $answer['orderDetails']['orderId'];
        $order->email = $answer['customer']['email'] ?: "";
        $order->amount = $answer['orderDetails']['orderTotalAmount'];
        $order->currency = $answer['orderDetails']['orderCurrency'];
        $order->orderStatus = $answer['orderStatus'];
        $order->orderCycle = $answer['orderCycle'];
        $order->serverDate = $answer['serverDate'];
        $order->lastTransactionUuid = $answer['transactions'][0]['uuid'];
        $order->lastTransactionDetailedStatus = $answer['transactions'][0]['detailedStatus'];
        $order->lastTransactionPaymentMethodType = $answer['transactions'][0]['paymentMethodType'];
        $order->save();

        $this->eventDispatcher->dispatch(new OrderUpdatedEvent($order, $answer), LyraEvents::ORDER_UPDATED);

        return $this->json(true);
    }

    private function checkHash($data, $key){
        $supported_sign_algos = ['sha256_hmac'];

        if (!in_array($data['kr-hash-algorithm'], $supported_sign_algos)) {

            return false;
        }

        $kr_answer = str_replace('\/', '/', $data['kr-answer']);
        $hash = hash_hmac('sha256', $kr_answer, $key);

        return ($hash == $data['kr-hash']);
    }
}