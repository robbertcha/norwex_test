<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    public $table = "custorder";

    public function getList() {
        return $this->select('custorder.OrderId','custorder.CustomerId','custorder.OrderStatus','custorder.OrderTotal','custorder.CreatedDateTime', 'customer.CustomerStatusId', 'customer.Name as customer_name', 'customerstatus.Code', 'customerstatus.Name as status')
                    ->leftJoin('customer','customer.CustomerId','=','custorder.CustomerId')
                    ->leftJoin('customerstatus','customerstatus.CustomerStatusId','=','customer.CustomerStatusId')
                    ->get()->ToArray();
    }
}
