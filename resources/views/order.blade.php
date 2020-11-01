@extends('layouts.app')

@section('content')

      <div class="order_cont">
            <div class="order_header">
                  <h2>Orders</h2> | <a href="/customers">Customers</a>
            </div>

            <ul id="order_list">
                  <li>
                        <div class="header center">ID</div>
                        <div class="header">Customer Name</div>
                        <div class="header center">Total</div>
                        <div class="header">Created At</div>
                        <div class="header center">Customer Status</div>
                  </li>

                  
                  @for ($i = 0; $i < count($list); $i++)
                        <li @if(strtolower(trim($list[$i]['status'])) == 'removed') class="is-rm" @endif>
                              <div class="center">{{ $list[$i]['OrderId'] }}</div>
                              <div>{{ $list[$i]['customer_name'] }}</div>
                              <div class="center">$ {{ number_format($list[$i]['OrderTotal'], 2) }}</div>
                              <div>{{ $list[$i]['CreatedDateTime'] }}</div>
                              <div class="center">{{ $list[$i]['status'] }}</div>
                        </li>
                  @endfor
            </ul>
      </div>

@endsection