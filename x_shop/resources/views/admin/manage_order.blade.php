@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê tất cả đơn hàng
      </div>
      <?php 
	      $message = Session::get('message');
	        if($message){          
		        echo '<div class="position-center text-center"><span style="color: green; text-align: center; width: 100%; font-weight:bold"> '. $message . '</span></div>' ;
		        Session::put('message',null);         
	        }
	    ?>
      <div class="row w3-res-tb">
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người đặt</th>
              <th>Tổng tiền</th>
              <th>Tình trạng</th>
              <th>Xét duyệt</th>
              <th style="text-align: center">Xem chi tiết</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_order as $key => $order)

            <tr>
              <td>{{ $order->customer_name }}</td>
              <td>${{ $order->order_total }}</td>
              <td><span class="text-ellipsis">{{ $order->order_status}}</span></td>
              <td>
                <a onclick="return confirm('Bạn có muốn duyệt đơn hàng này?')" href="{{URL::to('/comfim-order/'.$order->order_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có muốn hủy đơn hàng này?')" href="{{URL::to('/cancel-order/'.$order->order_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                  <i class="fa fa-ban text-warning text"></i></a>
                <a onclick="return confirm('Bạn có muốn xóa đơn hàng này?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                    <i class="fa fa-trash-o text-danger text"></i></a>
              </td>
              <td style="text-align: center">
                <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                    <i class="fa fa-eye text-success text-active" style="color: blue"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
    
@endsection