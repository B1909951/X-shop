@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê tất cả sản phẩm
      </div>
      <?php 
	      $message = Session::get('message');
	        if($message){          
		        echo '<div class="position-center text-center"><span style="color: green; text-align: center; width: 100%; font-weight:bold"> '. $message . '</span></div>' ;
		        Session::put('message',null);         
	        }
	    ?>
      
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Giá tiền</th>
              <th>Tồn kho</th>
              <th>Danh mục</th>
              <th>Thương hiệu</th>
              <th>Mô tả</th>
              <th>Nội dung</th>
              <th>Trạng thái</th>

              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
           
          @foreach($all_product as $key => $pro)
            <tr>
                <td>{{$pro->product_name }}</td>
                <td><img src="public/uploads/product/{{$pro->product_image }}" height="100px" width="100px"></td>
                <td>${{$pro->product_price }}</td>
                <td>{{$pro->product_inventory}}</td>
                <td>{{$pro->category_name }}</td>
                <td>{{$pro->brand_name }}</td>
                <td>{{$pro->product_desc }}</td>
                <td>{{$pro->product_content }}</td>
              <?php
              if ($pro->product_status==0){
                ?>
                <td><span><i class="fa fa-eye-slash" aria-hidden="true" style="font-size: 1.5rem;font-weight:600; color:rgb(82, 82, 253)"></i> </span><a href="{{URL::to('/show-product/'.$pro->product_id)}}"><i class="fa fa-refresh" style="font-size: 1.5rem;color:rgb(0, 223, 0)" aria-hidden="true"></i></a></td>
              <?php
              }else{
                ?>
                <td><span><i class="fa fa-eye" aria-hidden="true" style="font-size: 1.5rem;font-weight:600; color:rgb(82, 82, 253)"></i> </span><a href="{{URL::to('/hidden-product/'.$pro->product_id)}}"><i class="fa fa-refresh" style="font-size: 1.5rem;color:rgb(0, 223, 0)" aria-hidden="true"></i></a></td>
              <?php  
              }
              ?>
              <td>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                  <i class="fa fa-trash-o text-danger text"></i></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
    
@endsection