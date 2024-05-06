# contao-lyra-bundle

<!-- TOC -->
* [Useful links](#useful-links)
* [Configuration](#configuration)
* [Using the Lyra class](#using-the-lyra-class)
  * [Using lyra.yml configuration (single Lyra shop)](#using-lyrayml-configuration-single-lyra-shop)
  * [Using custom parameters (multiple Lyra shops)](#using-custom-parameters-multiple-lyra-shops)
* [Creating a payment](#creating-a-payment)
  * [Create an order](#create-an-order)
  * [Render the payment form](#render-the-payment-form)
* [Adding informations to your order](#adding-informations-to-your-order)
* [Saving orders inside Contao back-end](#saving-orders-inside-contao-back-end)
* [Events](#events)
<!-- TOC -->

## Useful links
- Rest API Documentation : https://docs.lyra.com/fr/rest/V4.0/api/playground
- Lyra portal : https://secure.lyra.com/portal/

## Configuration

Using informations from
https://secure.lyra.com/portal/ > Settings > Shop > Rest API Keys

Create a ``lyra.yml`` file inside your `config` folder like so :
````yml
# Rest API Keys
username: "12345678"
password: "testpassword_xxxxx"
server: "https://api.lyra.com"

# JS and mobile SDK Keys
public_key: "12345678:testpublickey_xxxxx"
domain_url: "https://static.lyra.com" # Lyra assets URL

# Rest API : Return URL signature calculation
sha_key: "xxxxx"

# Default currency
currency: "EUR"

# Validation route, see Aznoqmous\ContaoLyraBundle\Controller\LyraController
success_url: "/api/lyra/success" # validation route
````
## Using the Lyra class
The ``\Aznoqmous\ContaoLyraBundle\Payment\Lyra`` class initialize Lyra payments and render Lyra payment forms and can be used in two ways.

### Using lyra.yml configuration (single Lyra shop)
````php
<?php
$lyra = \Aznoqmous\ContaoLyraBundle\Payment\Lyra::getInstance();
````
### Using custom parameters (multiple Lyra shops)

````php
<?php
$lyra = new Lyra([
  'username' =>  "123546",
  'password' =>  "testpassword",
  'public_key' =>  "123546:testpublickey",
  'sha_key' =>  "SxqDvxEXKlqc2dcRfJZy1OPyWLx7QznhwaWZIoqKhBlLC",
  'server' =>  "https://api.lyra.com",
  'domain_url' =>  "https://static.lyra.com",
]);
````
## Creating a payment
### Create an order

A payment is generated using few informations registered by Lyra.  
````php
<?php
$customer = new \Aznoqmous\ContaoLyraBundle\Data\Customer("plandreau@aznoqmous.fr");
$amount = "1250"; // == 12.50
$order = new \Aznoqmous\ContaoLyraBundle\Data\Order($customer, $amount);
````


### Render the payment form
```php
<?php
/**
 * Render the desired form using the previously created order
 */
echo $lyra->renderSmartForm($order);

echo $lyra->renderEmbedded($order);

echo $lyra->renderPopin($order);
```


## Adding informations to your order
Classes inside ``\Aznoqmous\ContaoLyraBundle\Data`` are data classes that can be hydrated and will be saved inside Lyra when you create a new order.
````php
<?php
$customer = new \Aznoqmous\ContaoLyraBundle\Data\Customer("plandreau@aznoqmous.fr")
$customer->reference = "example_client_reference"

$customer->billingDetails->setData([
    'title' => "Example title",
    'firstName' => "Paul",
    'lastName' => "LANDREAU",
    'category' => "Example category",
    'address' => "123 example address"
]);

$amount = "1250";
$order=  new \Aznoqmous\ContaoLyraBundle\Data\Order($customer, $amount)
$order->orderId = "example_order_id";

````


## Saving orders inside Contao back-end
To save orders, use the ``OrderModel`` class to generate the required `Order` :
```php
<?php 
$orderModel = new OrderModel();
$orderModel->email = "plandreau@aznoqmous.fr";
$orderModel->amount = 1250;
$orderModel->currency = "EUR";
$orderModel->save();

\Aznoqmous\ContaoLyraBundle\Payment\Lyra::getInstance()
    ->renderSmartForm($orderModel->getOrder())
;
```

``OrderModel`` db entry will be updated by Lyra during return URL call

## Events
Events are defined in ``\Aznoqmous\ContaoLyraBundle\Event\LyraEvents`` and can be used like so :

`````php
<?php 

namespace App\EventListener;

use Aznoqmous\ContaoFormBundle\Event\OrderUpdatedEvent;
use Terminal42\ServiceAnnotationBundle\Annotation\ServiceTag;
use Aznoqmous\ContaoLyraBundle\Event\LyraEvents;

/**
 * @ServiceTag("kernel.event_listener", event=LyraEvents::ORDER_UPDATED)
 */
class LyraOrderUpdatedListener
{
    public function __invoke(OrderUpdatedEvent $event){
        dump($event->orderModel);
    }
}
`````