<?php

namespace MessageBird\Resources;

use MessageBird\Objects;
use MessageBird\Common;

/**
 * Class PurchasedNumbers
 *
 * @package MessageBird\Resources
 */
class PurchasedNumbers extends Base
{

    /**
     * @var \MessageBird\Common\HttpClient
     */
    protected $HttpClient;

    /**
     * @param Common\HttpClient $HttpClient
     */
    public function __construct(Common\HttpClient $HttpClient)
    {
        $this->HttpClient = $HttpClient;
        $this->setResourceName('phone-numbers');
    }

    // TODO: check if Base::update using PUT instead of the documented PATCH is okay
}
?>
