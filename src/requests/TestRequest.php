<?php

namespace Thiio\OrderDesk\Requests;

use Thiio\OrderDesk\OrderDeskRequest;

class TestRequest extends OrderDeskRequest
{

    private const ENDPOINT = 'test';
    
    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function test()
    {
        return $this->get(self::ENDPOINT)->sendRequest();
    }

}
