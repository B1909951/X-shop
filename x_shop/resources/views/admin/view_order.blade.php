@extends('admin_layout')
@section('admin_content')
<div class="panel-heading">
    Chi tiết đơn hàng
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng
      </div>
      <div class="row w3-res-tb">
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người đặt</th> 
              <th>Địa chỉ Email</th>
              <th>SĐT</th>
              <th>Địa chỉ nhận hàng</th>
              <th>Ghi chú</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>  
                <tr>
                    <td>{{$orderId->customer_name}}</td>
                    <td>{{$orderId->customer_email}}</td>
                    <td>{{$orderId->customer_phone}}</td>
                    <td>{{$orderId->shipping_address}}</td>
                    <td>{{$orderId->shipping_message}}</td>
                </tr>     
          </tbody>
        </table>
      </div>
      <br>
      <br>
    </div>
  </div>
</div>
<br>

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách sản phẩm
      </div>
      <div class="row w3-res-tb">
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Tổng tiền</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody> 
              @foreach($orderId_details as $pro)
                
                <tr>
                    <td><a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a></td>
                    <td>{{'$'.number_format($pro->product_price, 2, '.',',')}}</td>
                    <td>{{$pro->product_sales_quantity}}</td>
                    <td>{{'$'.number_format($pro->product_price*$pro->product_sales_quantity, 2, '.',',')}}</td>
                </tr>
                
                @endforeach
          </tbody>
        </table>
      </div>
      <br>
      <br>
    </div>
  </div>
@endsection