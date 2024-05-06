<?php
$GLOBALS['TL_DCA']['tl_lyra_order'] = [
    'config' => [
        'dataContainer' => 'Table',
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
        'closed' => true,
    ],
    'list' => [
        'sorting' => [
            'mode' => 2,
            'fields' => ['tstamp DESC'],
            'panelLayout' => 'filter;sort,search,limit'
        ],
        'label' => [
            'fields' => ['orderId', 'createdAt', 'tstamp', 'serverDate', 'orderStatus', 'orderCycle', 'lastTransactionPaymentMethodType', 'amount', 'currency', 'email'],
            'showColumns' => true,
        ],
    ],
    'fields' => [
        'id' => [
            'label' => ['ID'],
            'search' => true,
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'tstamp' => [
            'default' => time(),
            'sorting' => true,
            'flag' => 12,
            'sql' => "int(10) unsigned NOT NULL default 0"
        ],
        'createdAt' => [
            'default' => time(),
            'sorting' => true,
            'flag' => 12,
            'sql' => "int(10) unsigned NOT NULL default 0"
        ],
        'orderId' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'email' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'amount' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'currency' => [
            'sql' => "varchar(3) NOT NULL default ''"
        ],

        // LYRA FIELDS (ON SUCCESS)
        'shopId' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'orderCycle' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'orderStatus' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'serverDate' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'lastTransactionUuid' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'lastTransactionPaymentMethodType' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ],
        'lastTransactionDetailedStatus' => [
            'sql' => "varchar(255) NOT NULL default 0"
        ]
    ]
];