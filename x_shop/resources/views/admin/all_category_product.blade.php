@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê tất cả danh mục
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
              
              <th>Tên danh mục</th>
              <th>Trạng thái</th>
              <th>Mô tả danh mục</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_category_product as $key => $cate_pro)

            <tr>
              <td>{{ $cate_pro->category_name }}</td>
              <?php
              if ($cate_pro->category_status==0){
                ?>
                <td><span><i class="fa fa-eye-slash" aria-hidden="true" style="font-size: 1.5rem;font-weight:600; color:rgb(82, 82, 253)"></i> </span><a href="{{URL::to('/show-category-product/'.$cate_pro->category_id)}}"><i class="fa fa-refresh" style="font-size: 1.5rem;color:rgb(0, 223, 0)" aria-hidden="true"></i></a></td>
              <?php
              }else{
                ?>
                <td><span><i class="fa fa-eye" aria-hidden="true" style="font-size: 1.5rem;font-weight:600; color:rgb(82, 82, 253)"></i> </span><a href="{{URL::to('/hidden-category-product/'.$cate_pro->category_id)}}"><i class="fa fa-refresh" style="font-size: 1.5rem;color:rgb(0, 223, 0)" aria-hidden="true"></i></a></td>
              <?php  
              }
              ?>
              <td><span class="text-ellipsis">{{ $cate_pro->category_desc}}</span></td>
              <td>
                <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có muốn xóa danh mục này?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" style="font-size: 1.3rem" ui-toggle-class="">
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