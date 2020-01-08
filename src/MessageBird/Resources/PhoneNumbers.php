<?php

namespace MessageBird\Resources;

use MessageBird\Objects;
use MessageBird\Common;

/**
 * Class PhoneNumbers
 *
 * @package MessageBird\Resources
 */
class PhoneNumbers
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
    }

    public function getList(string $countryCode, array $parameters = array())
    {
        $request = new Common\HttpGetRequest($this->HttpClient, "available-phone-numbers/$countryCode", "Objects\Number");
        return $request->getList($parameters);
    }
}
?>
