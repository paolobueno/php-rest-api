<?php

namespace MessageBird\Common;

use MessageBird\Objects;
use MessageBird\Resources;
use MessageBird\Exceptions;

/**
 * Class HttpGetRequest
 *
 * @package MessageBird\Common
 */
class HttpGetRequest
{

    /**
     * @var HttpClient
     */
    protected $HttpClient;

    /**
     * @var string
     */
    protected $Path;

    /**
     * @var Object
     */
    protected $Object;

    /**
     * @param HttpClient $HttpClient
     */
    public function __construct(HttpClient $HttpClient, string $path, $object)
    {
        $this->HttpClient = $HttpClient;
        $this->Path = $path;
        $this->object = $object;
    }

    /**
     * @param array $parameters
     *
     * @return Objects\BaseList
     * @throws \MessageBird\Exceptions\RequestException
     * @throws \MessageBird\Exceptions\ServerException
     */
    public function getList($parameters = array())
    {
        list($status, , $body) = $this->HttpClient->performHttpRequest(
            HttpClient::REQUEST_GET,
            $this->Path,
            $parameters
        );

        if ($status === 200) {
            $body = json_decode($body);

            $items = $body->data;
            unset($body->data);

            $baseList = new Objects\BaseList();
            $baseList->loadFromArray($body);

            foreach ($items as $item) {
                $object = new $this->object($this->HttpClient);

                $itemObject = $object->loadFromArray($item);
                $baseList->items[] = $itemObject;
            }
            return $baseList;
        }

        return $this->processRequest($body);
    }

    /**
     * @param string $body
     *
     * @return Objects\Number
     * @throws \MessageBird\Exceptions\RequestException
     * @throws \MessageBird\Exceptions\ServerException
     */
    protected function processRequest($body)
    {
        $body = @json_decode($body);

        if ($body === null or $body === false) {
            throw new Exceptions\ServerException('Got an invalid JSON response from the server.');
        }

        if (empty($body->errors)) {
            return $this->object.loadFromArray($body->data[0]);
        }

        $ResponseError = new ResponseError($body);
        throw new Exceptions\RequestException($ResponseError->getErrorString());
    }
}
?>
