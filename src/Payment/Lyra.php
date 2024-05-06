<?php

namespace Aznoqmous\ContaoLyraBundle\Payment;

use Aznoqmous\ContaoLyraBundle\Config\LyraConfig;
use Aznoqmous\ContaoLyraBundle\Data\Order;
use Contao\FrontendTemplate;
use Symfony\Component\HttpClient\HttpClient;

class Lyra
{

    protected $username;
    protected $password;
    protected $public_key;
    protected $sha_key;
    protected $server;
    protected $domain_url;
    protected $notification_url;

    public function __construct($arrOpts = [])
    {
        $this->username = $arrOpts['username'];
        $this->password = $arrOpts['password'];
        $this->public_key = $arrOpts['public_key'];
        $this->sha_key = $arrOpts['sha_key'];
        $this->server = $arrOpts['server']?:"https://api.lyra.com";
        $this->domain_url = $arrOpts['domain_url']?:"https://static.lyra.com";
        $this->notification_url = $arrOpts['notification_url'];
    }

    public static function getInstance(): self
    {
        return new self(LyraConfig::getOptions());
    }

    private function generateFormToken($order)
    {
        return $this->requestApi("Charge/CreatePayment", $order);
    }

    protected function requestApi($url, $body){
        $body = json_decode(json_encode($body), true);

        $url = $this->server . "/api-payment/V4/" . $url;
        $client = HttpClient::create();

        if($this->notification_url) $body['ipnTargetUrl'] = $this->notification_url;

        $request = $client->request("POST", $url, [
            "auth_basic" => [$this->username, $this->password],
            "body" => json_encode($body)
        ]);

        $content = $request->getContent();
        $data = json_decode($content, true);

        if($data['status'] == "SUCCESS") return $data['answer'];
        throw new \Exception($data['answer']['errorMessage']);
    }

    public function renderPopin(Order $order){
        $tpl = new FrontendTemplate("lyra_popin");
        $tpl->formToken = $this->generateFormToken($order)['formToken'];
        $tpl->domainUrl = $this->domain_url;
        $tpl->publicKey = $this->public_key;
        $tpl->successUrl = LyraConfig::getSuccessUrl();
        return $tpl->parse();
    }

    public function renderSmartForm(Order $order){
        $tpl = new FrontendTemplate("lyra_smart_form");
        $tpl->formToken = $this->generateFormToken($order)['formToken'];
        $tpl->domainUrl = $this->domain_url;
        $tpl->publicKey = $this->public_key;
        $tpl->successUrl = LyraConfig::getSuccessUrl();
        return $tpl->parse();
    }

    public function renderEmbedded(Order $order){
        $tpl = new FrontendTemplate("lyra_embedded");
        $tpl->formToken = $this->generateFormToken($order)['formToken'];
        $tpl->domainUrl = $this->domain_url;
        $tpl->publicKey = $this->public_key;
        $tpl->successUrl = LyraConfig::getSuccessUrl();
        return $tpl->parse();
    }

}