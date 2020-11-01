@extends('layouts.app')

@section('content')

      <div class="cust_cont">
            <div class="cust_header">
                  <h2>Customers</h2> | <a href="/">Orders</a>
            </div>

            <ul id="cust_list">
                  <li>
                        <div class="header center">ID</div>
                        <div class="header">Customer Name</div>
                        <div class="header center">Order Count</div>
                        <div class="header center">Last 3 Months Total</div>
                        <div class="header center">Status</div>
                  </li>

                  
                  @for ($i = 0; $i < count($list); $i++)
                        <li @if(strtolower(trim($list[$i]['status'])) == 'removed') class="is-rm" @endif @if(strtolower(trim($list[$i]['last_3_month_total'])) > 200 && $list[$i]['Code'] == 'AC') class="is-gr" @endif @if(strtolower(trim($list[$i]['LastOrder'])) >= 1 && $list[$i]['Code'] == 'AC') class="is-or" @endif>
                              <div class="center">{{ $list[$i]['CustomerId'] }}</div>
                              <div>{{ $list[$i]['CustName'] }}</div>
                              <div class="center">
                                    @php
                                          if ($list[$i]['orders'] != null && $list[$i]['orders'] != '') {
                                                echo count(explode('|', $list[$i]['orders']));
                                          } else {
                                                echo 0;
                                          }
                                    @endphp
                              </div>
                              <div class="center">@if($list[$i]['last_3_month_total'] > 0) $ {{ number_format($list[$i]['last_3_month_total'],2) }} @else $0.00 @endif</div>
                              <div class="center">{{ $list[$i]['status'] }}</div>
                        </li>

                        <li @if(strtolower(trim($list[$i]['status'])) == 'removed') class="is-rm" @endif @if(strtolower(trim($list[$i]['last_3_month_total'])) > 200 && $list[$i]['Code'] == 'AC') class="is-gr" @endif @if(strtolower(trim($list[$i]['LastOrder'])) >= 1 && $list[$i]['Code'] == 'AC') class="is-or" @endif>
                              <ul class="order_list">
                                    @if ($list[$i]['orders'] != null && $list[$i]['orders'] != '')
                                    <li>
                                          <div class="header center">Order ID</div>
                                          <div class="header center">Order Status</div>
                                          <div class="header center">Order Total</div>
                                          <div class="header center">Created At</div>
                                    </li>

                                          @php
                                                $clist = explode('|', $list[$i]['orders']);
                                                
                                                      for ($q = 0; $q < count($clist); $q++) {
                                                            $r = explode('---', $clist[$q]);

                                                            echo "<li>";
                                                                  
                                                                  echo '<div class=" center">'.$r[0].'</div>';
                                                                  echo '<div class=" center">'.$r[1].'</div>';
                                                                  echo '<div class=" center">$ '.$r[2].'</div>';
                                                                  echo '<div class=" center">'.$r[3].'</div>';
                                                            
                                                            echo "</li>";
                                                      }
                                          
                                          @endphp
                                    @endif
                              </ul>
                        </li>
                  @endfor
            </ul>
      </div>

@endsection