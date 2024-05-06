<?php
$GLOBALS["TL_LANG"]['tl_lyra_order'] = [
    'orderId' => ["ID Commande"],
    'createdAt' => ["Créée le"],
    'tstamp' => ["Mis à jour le"],
    'serverDate' => ["Date serveur"],
    'orderStatus' => ["Statut de la commande"],
    'orderCycle' => ["Cycle de la commande"],
    'lastTransactionPaymentMethodType' => ["Moyen de paiement"],
    'amount' => ["Montant"],
    'currency' => ["Devise"],
    'email' => ["Email"]
];

$GLOBALS["TL_LANG"]['lyra'] = [
    'order_valid' => ['PAID'],
    'order_error' => ['UNPAID', 'ABANDONED'],
    'orderStatuses' => [
        'PAID' => "Payé",
        'UNPAID' => "Non payé",
        'RUNNING' => "En cours",
        'PARTIALLY_PAID' => "Partiellement payé",
        'ABANDONED' => "Abandonné"
    ],
    'orderCycles' => [
        'OPEN' => "En cours",
        'CLOSED' => "Fermée"
    ],
    'transaction_valid' => ['ACCEPTED', 'AUTHORISED', 'CAPTURED'],
    'transaction_pending' => ['AUTHORISED_TO_VALIDATE','INITIAL','PENDING','UNDER_VERIFICATION','WAITING_AUTHORISATION','WAITING_AUTHORISATION_TO_VALIDATE','WAITING_FOR_PAYMENT'],
    'transaction_error' => ['CANCELLED', 'CAPTURE_FAILED', 'EXPIRED', 'REFUSED', 'ERROR'],
    'transactionStatuses' => [
        'ACCEPTED' => "Acceptée",
        'AUTHORISED' => "Autorisée",
        'CAPTURED' => "Capturée",
        'PRE_AUTHORISED' => "Pré-authorisée",

        'AUTHORISED_TO_VALIDATE' => "En attente de validation",
        'INITIAL' => "En cours",
        'PENDING' => "En cours",
        'UNDER_VERIFICATION' => "En cours",
        'WAITING_AUTHORISATION' => "En cours",
        'WAITING_AUTHORISATION_TO_VALIDATE' => "En cours",
        'WAITING_FOR_PAYMENT' => "En cours",

        'CANCELLED' => "Annulée",
        'CAPTURE_FAILED' => "Echec de capture",
        'EXPIRED' => "Expirée",
        'REFUSED' => "Refusée",
        'ERROR' => "Erreur"
    ],
    'paymentMethods' => [
        'CARD' => "Carte Bancaire",
        'IP_WIRE' => "Virement SEPA",
        'SDD' => "Virement SEPA"
    ]
];