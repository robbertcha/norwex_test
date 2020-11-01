<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $table = "Customer";

    public function getList() {
        return $this::select('CustomerId','Customer.CustomerStatusId as CustomerStatusId','Customer.Name as CustName', 'customerstatus.Code', 'customerstatus.Name as status',
                    DB::raw("(
                        SELECT ifnull(
                            GROUP_CONCAT( 
                                CONCAT(o.OrderId,'---',o.OrderStatus,'---',o.OrderTotal,'---',o.CreatedDateTime)
                            SEPARATOR '|'),
                        '') as orders
                        from custorder as o
                        where o.CustomerId = Customer.CustomerId 
                        order by o.CreatedDateTime 
                    ) as orders") 
                    , DB::raw(
                        "(SELECT TIMESTAMPDIFF(YEAR, (SELECT CreatedDateTime FROM custorder as o WHERE o.CustomerId = Customer.CustomerId ORDER BY CreatedDateTime DESC LIMIT 1) , CURDATE())) AS LastOrder"
                    )
                    , DB::raw(
                        "(
                            SELECT  SUM(OrderTotal) AS last_3_month_total
                                    FROM custorder as o
                                    WHERE o.CreatedDateTime BETWEEN
                                        DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 3 MONTH), '%Y-%m-01') AND
                                        LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                                    AND o.CustomerId = Customer.CustomerId
                                    AND o.OrderStatus = 'Completed'
                                    GROUP BY o.CustomerId
                        ) AS last_3_month_total"
                    )
                )
                ->leftJoin('customerstatus','customerstatus.CustomerStatusId','=','Customer.CustomerStatusId')
                ->get()->ToArray();
    }
}
