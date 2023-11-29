<?php

namespace Thiio\OrderDesk;


use Thiio\OrderDesk\Requests\TestRequest;
use Thiio\OrderDesk\Requests\OrderRequest;
use Thiio\OrderDesk\Requests\ShipmentRequest;
use Thiio\OrderDesk\Requests\MoveOrderRequest;
use Thiio\OrderDesk\Requests\OrderItemRequest;
use Thiio\OrderDesk\Requests\OrderHistoryRequest;
use Thiio\OrderDesk\Requests\InventoryItemsRequest;

class Client
{
    protected $storeId;
    protected $apikey;

    public function __construct($storeId, $apikey)
    {
        $this->storeId = $storeId;
        $this->apikey  = $apikey;
    }    

    public function isOrderDeskOnline()
    {
        return (new TestRequest($this->storeId, $this->apikey))->test();
    }

    public function inventoryItemsApi()
    {
        return new InventoryItemsRequest($this->storeId, $this->apikey);
    }

    public function moveOrderApi()
    {
        return new MoveOrderRequest($this->storeId, $this->apikey);
    }

    public function ordersApi()
    {
        return new OrderRequest($this->storeId, $this->apikey);
    }

    public function orderHistoryApi()
    {
        return new OrderHistoryRequest($this->storeId, $this->apikey);
    }

    public function orderItemsApi()
    {
        return new OrderItemRequest($this->storeId, $this->apikey);
    }

    public function shipmentsApi()
    {
        return new ShipmentRequest($this->storeId, $this->apikey);
    }

}
