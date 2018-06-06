<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;

/**
 * Class QueryBinRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class QueryBinRequest extends AbstractRequest
{

    private $environment;

    /**
     * QueryBinRequest constructor.
     *
     * @param Merchant    $merchant
     * @param Environment $environment
     */
    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
    }

    /**
     * @param $paymentId
     *
     * @return null
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     * @throws \RuntimeException
     */
    public function execute($paymentId)
    {
        $url = $this->environment->getApiQueryURL() . '1/cardBin/' . $paymentId;

        return $this->sendRequest('GET', $url);
    }

    /**
     * @param $json
     *
     * @return Sale
     */
    protected function unserialize($json)
    {
        return Sale::fromJson($json);
    }
}
