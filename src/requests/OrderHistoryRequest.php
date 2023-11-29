<?php


namespace Thiio\OrderDesk\Requests;

use Thiio\OrderDesk\OrderDeskRequest;
use Thiio\OrderDesk\Models\OrderHistory;
use Thiio\OrderDesk\Exceptions\OrderDeskUnsetIdentifierException;

class OrderHistoryRequest extends OrderDeskRequest
{
    private const ENDPOINT = 'orders';

    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function create($orderId, OrderHistory $orderHistory)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }
        
        return $this->post(self::ENDPOINT."/{$orderId}/order-history", $orderHistory->toArray())->sendRequest();

    }

}
