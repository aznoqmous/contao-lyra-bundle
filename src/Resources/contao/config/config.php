<?php

/**
 * This file is part of the Lyra bundle designed for Contao 4.
 *
 * Copyright (c) 2023 Aznoqmous
 * @package    Config
 * @link       https://www.aznoqmous.fr
 * @author     Paul LANDREAU <plandreau@aznoqmous.fr>
 */

use Aznoqmous\ContaoLyraBundle\Data\Order;
use Aznoqmous\ContaoLyraBundle\Models\OrderModel;

if(TL_MODE == 'BE') {
    $GLOBALS['TL_JAVASCRIPT']['aznoqmouscontaolyra'] = "bundles/aznoqmouscontaolyra/backend.min.js|static";
    $GLOBALS['TL_CSS']['aznoqmouscontaolyra'] = "bundles/aznoqmouscontaolyra/backend.min.css|static";
}

$GLOBALS['BE_MOD']['system']['lyra_orders'] = ['tables' => ['tl_lyra_order']];
$GLOBALS['TL_MODELS']['tl_lyra_order'] = OrderModel::class;

//if(TL_MODE == "FE" && $_SERVER['REQUEST_URI'] != "/api/lyra/success") {

//  Create order model, then proceed to payment
//    $orderModel = new OrderModel();
//    $orderModel->email = "plandreau@aznoqmous.fr";
//    $orderModel->amount = 1250;
//    $orderModel->currency = "EUR";
//    $orderModel->save();
//    echo \Aznoqmous\ContaoLyraBundle\Payment\Lyra::getInstance()
//        ->renderEmbedded($orderModel->getOrder())
//    ;
//    die;

// Simple create payment
//    $customer = new \Aznoqmous\ContaoLyraBundle\Data\Customer("plandreau@aznoqmous.fr");
//    $order= new Order($customer, rand(100, 9999));
//
//    echo \Aznoqmous\ContaoLyraBundle\Payment\Lyra::getInstance()
//        ->renderEmbedded($order)
//    ;
//    die;

//}


// Example IPN return
//$content = "kr-hash-key=password&kr-hash-algorithm=sha256_hmac&kr-answer=%7B%22shopId%22%3A%2210294790%22%2C%22orderCycle%22%3A%22CLOSED%22%2C%22orderStatus%22%3A%22RUNNING%22%2C%22serverDate%22%3A%222024-02-27T08%3A49%3A07%2B00%3A00%22%2C%22orderDetails%22%3A%7B%22orderTotalAmount%22%3A1250%2C%22orderEffectiveAmount%22%3A1250%2C%22orderCurrency%22%3A%22EUR%22%2C%22mode%22%3A%22TEST%22%2C%22orderId%22%3A%2275ab39e2%22%2C%22metadata%22%3Anull%2C%22_type%22%3A%22V4%2FOrderDetails%22%7D%2C%22customer%22%3A%7B%22billingDetails%22%3A%7B%22address%22%3Anull%2C%22category%22%3Anull%2C%22cellPhoneNumber%22%3Anull%2C%22city%22%3Anull%2C%22country%22%3Anull%2C%22district%22%3Anull%2C%22firstName%22%3Anull%2C%22identityCode%22%3Anull%2C%22identityType%22%3Anull%2C%22language%22%3A%22FR-FR%22%2C%22lastName%22%3Anull%2C%22phoneNumber%22%3Anull%2C%22state%22%3Anull%2C%22streetNumber%22%3Anull%2C%22title%22%3Anull%2C%22zipCode%22%3Anull%2C%22legalName%22%3Anull%2C%22_type%22%3A%22V4%2FCustomer%2FBillingDetails%22%7D%2C%22email%22%3Anull%2C%22reference%22%3Anull%2C%22shippingDetails%22%3A%7B%22address%22%3Anull%2C%22address2%22%3Anull%2C%22category%22%3Anull%2C%22city%22%3Anull%2C%22country%22%3Anull%2C%22deliveryCompanyName%22%3Anull%2C%22district%22%3Anull%2C%22firstName%22%3Anull%2C%22identityCode%22%3Anull%2C%22lastName%22%3Anull%2C%22legalName%22%3Anull%2C%22phoneNumber%22%3Anull%2C%22shippingMethod%22%3Anull%2C%22shippingSpeed%22%3Anull%2C%22state%22%3Anull%2C%22streetNumber%22%3Anull%2C%22zipCode%22%3Anull%2C%22_type%22%3A%22V4%2FCustomer%2FShippingDetails%22%7D%2C%22extraDetails%22%3A%7B%22browserAccept%22%3Anull%2C%22fingerPrintId%22%3Anull%2C%22ipAddress%22%3A%22109.190.132.37%22%2C%22browserUserAgent%22%3A%22Mozilla%2F5.0%20%28Windows%20NT%2010.0%3B%20Win64%3B%20x64%29%20AppleWebKit%2F537.36%20%28KHTML%2C%20like%20Gecko%29%20Chrome%2F122.0.0.0%20Safari%2F537.36%22%2C%22_type%22%3A%22V4%2FCustomer%2FExtraDetails%22%7D%2C%22shoppingCart%22%3A%7B%22insuranceAmount%22%3Anull%2C%22shippingAmount%22%3Anull%2C%22taxAmount%22%3Anull%2C%22cartItemInfo%22%3Anull%2C%22_type%22%3A%22V4%2FCustomer%2FShoppingCart%22%7D%2C%22_type%22%3A%22V4%2FCustomer%2FCustomer%22%7D%2C%22transactions%22%3A%5B%7B%22shopId%22%3A%2210294790%22%2C%22uuid%22%3A%22a4f3e894226c413b91fee7b57480421c%22%2C%22amount%22%3A1250%2C%22currency%22%3A%22EUR%22%2C%22paymentMethodType%22%3A%22IP_WIRE%22%2C%22paymentMethodToken%22%3Anull%2C%22status%22%3A%22RUNNING%22%2C%22detailedStatus%22%3A%22WAITING_AUTHORISATION%22%2C%22operationType%22%3A%22DEBIT%22%2C%22effectiveStrongAuthentication%22%3A%22DISABLED%22%2C%22creationDate%22%3A%222024-02-27T08%3A48%3A53%2B00%3A00%22%2C%22errorCode%22%3Anull%2C%22errorMessage%22%3Anull%2C%22detailedErrorCode%22%3Anull%2C%22detailedErrorMessage%22%3Anull%2C%22metadata%22%3Anull%2C%22transactionDetails%22%3A%7B%22liabilityShift%22%3Anull%2C%22effectiveAmount%22%3A1250%2C%22effectiveCurrency%22%3A%22EUR%22%2C%22creationContext%22%3A%22CHARGE%22%2C%22cardDetails%22%3A%7B%22paymentSource%22%3A%22EC%22%2C%22manualValidation%22%3A%22NO%22%2C%22expectedCaptureDate%22%3A%222024-02-27T08%3A48%3A53%2B00%3A00%22%2C%22effectiveBrand%22%3A%22IP_WIRE%22%2C%22pan%22%3A%22FR7617806XXXXXXXXXXXXX0973%22%2C%22expiryMonth%22%3Anull%2C%22expiryYear%22%3Anull%2C%22country%22%3A%22FR%22%2C%22issuerCode%22%3Anull%2C%22issuerName%22%3Anull%2C%22effectiveProductCode%22%3Anull%2C%22legacyTransId%22%3A%229ctjtj%22%2C%22legacyTransDate%22%3A%222024-02-27T08%3A48%3A53%2B00%3A00%22%2C%22paymentMethodSource%22%3A%22NEW%22%2C%22authorizationResponse%22%3A%7B%22amount%22%3A1250%2C%22currency%22%3A%22EUR%22%2C%22authorizationDate%22%3A%222024-02-27T08%3A49%3A07%2B00%3A00%22%2C%22authorizationNumber%22%3Anull%2C%22authorizationResult%22%3A%220%22%2C%22authorizationMode%22%3A%22FULL%22%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FCardAuthorizationResponse%22%7D%2C%22captureResponse%22%3A%7B%22refundAmount%22%3Anull%2C%22refundCurrency%22%3Anull%2C%22captureDate%22%3Anull%2C%22captureFileNumber%22%3Anull%2C%22effectiveRefundAmount%22%3Anull%2C%22effectiveRefundCurrency%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FCardCaptureResponse%22%7D%2C%22threeDSResponse%22%3A%7B%22authenticationResultData%22%3A%7B%22transactionCondition%22%3Anull%2C%22enrolled%22%3Anull%2C%22status%22%3Anull%2C%22eci%22%3Anull%2C%22xid%22%3Anull%2C%22cavvAlgorithm%22%3Anull%2C%22cavv%22%3Anull%2C%22signValid%22%3Anull%2C%22brand%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FCardAuthenticationResponse%22%7D%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FThreeDSResponse%22%7D%2C%22authenticationResponse%22%3Anull%2C%22installmentNumber%22%3Anull%2C%22installmentCode%22%3Anull%2C%22markAuthorizationResponse%22%3A%7B%22amount%22%3Anull%2C%22currency%22%3Anull%2C%22authorizationDate%22%3Anull%2C%22authorizationNumber%22%3Anull%2C%22authorizationResult%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FMarkAuthorizationResponse%22%7D%2C%22cardHolderName%22%3Anull%2C%22identityDocumentNumber%22%3Anull%2C%22identityDocumentType%22%3Anull%2C%22initialIssuerTransactionIdentifier%22%3Anull%2C%22productCategory%22%3Anull%2C%22nature%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCardDetails%22%7D%2C%22paymentMethodDetails%22%3A%7B%22id%22%3A%22FR7617806XXXXXXXXXXXXX0973%22%2C%22paymentSource%22%3A%22EC%22%2C%22manualValidation%22%3A%22NO%22%2C%22expectedCaptureDate%22%3A%222024-02-27T08%3A48%3A53%2B00%3A00%22%2C%22effectiveBrand%22%3A%22IP_WIRE%22%2C%22expiryMonth%22%3Anull%2C%22expiryYear%22%3Anull%2C%22country%22%3A%22FR%22%2C%22issuerCode%22%3Anull%2C%22issuerName%22%3Anull%2C%22effectiveProductCode%22%3Anull%2C%22legacyTransId%22%3A%229ctjtj%22%2C%22legacyTransDate%22%3A%222024-02-27T08%3A48%3A53%2B00%3A00%22%2C%22paymentMethodSource%22%3A%22NEW%22%2C%22authorizationResponse%22%3A%7B%22amount%22%3A1250%2C%22currency%22%3A%22EUR%22%2C%22authorizationDate%22%3A%222024-02-27T08%3A49%3A07%2B00%3A00%22%2C%22authorizationNumber%22%3Anull%2C%22authorizationResult%22%3A%220%22%2C%22authorizationMode%22%3A%22FULL%22%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FCardAuthorizationResponse%22%7D%2C%22captureResponse%22%3A%7B%22refundAmount%22%3Anull%2C%22refundCurrency%22%3Anull%2C%22captureDate%22%3Anull%2C%22captureFileNumber%22%3Anull%2C%22effectiveRefundAmount%22%3Anull%2C%22effectiveRefundCurrency%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FCardCaptureResponse%22%7D%2C%22authenticationResponse%22%3Anull%2C%22installmentNumber%22%3Anull%2C%22installmentCode%22%3Anull%2C%22markAuthorizationResponse%22%3A%7B%22amount%22%3Anull%2C%22currency%22%3Anull%2C%22authorizationDate%22%3Anull%2C%22authorizationNumber%22%3Anull%2C%22authorizationResult%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FCards%2FMarkAuthorizationResponse%22%7D%2C%22cardHolderName%22%3Anull%2C%22identityDocumentNumber%22%3Anull%2C%22identityDocumentType%22%3Anull%2C%22initialIssuerTransactionIdentifier%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FPaymentMethodDetails%22%7D%2C%22acquirerDetails%22%3Anull%2C%22fraudManagement%22%3A%7B%22riskControl%22%3A%5B%5D%2C%22riskAnalysis%22%3A%5B%5D%2C%22riskAssessments%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FFraudManagement%22%7D%2C%22subscriptionDetails%22%3A%7B%22subscriptionId%22%3Anull%2C%22_type%22%3A%22V4%2FPaymentMethod%2FDetails%2FSubscriptionDetails%22%7D%2C%22parentTransactionUuid%22%3Anull%2C%22mid%22%3A%22FR7616828XXXXXXXXXXXXX4914%22%2C%22sequenceNumber%22%3A1%2C%22taxAmount%22%3Anull%2C%22preTaxAmount%22%3Anull%2C%22taxRate%22%3Anull%2C%22externalTransactionId%22%3A%2251610d4e77d2474f8d80d57e8de0a551%22%2C%22dcc%22%3Anull%2C%22nsu%22%3Anull%2C%22tid%22%3Anull%2C%22acquirerNetwork%22%3A%22IP%22%2C%22taxRefundAmount%22%3Anull%2C%22userInfo%22%3A%22JS%20Client%22%2C%22paymentMethodTokenPreviouslyRegistered%22%3Anull%2C%22occurrenceType%22%3A%22UNITAIRE%22%2C%22archivalReferenceId%22%3Anull%2C%22useCase%22%3Anull%2C%22wallet%22%3Anull%2C%22_type%22%3A%22V4%2FTransactionDetails%22%7D%2C%22_type%22%3A%22V4%2FPaymentTransaction%22%7D%5D%2C%22subMerchantDetails%22%3Anull%2C%22_type%22%3A%22V4%2FPayment%22%7D&kr-answer-type=V4%2FPayment&kr-hash=f9711af8a85abcd95bc13a86a8622cc2707850ad88557db76595b9b0fabc87f4";
//parse_str("$content", $res);
//dump(json_decode($res['kr-answer'], true));
//die;