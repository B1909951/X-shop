@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                
                <div class="panel-body">
                @foreach( $edit_product as $key => $pro)

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng trong kho</label>
                            <input type="number" required name="product_inventory" class="form-control" value="{{$pro->product_inventory}}" min="1" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100px" width="100px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="product_desc" id="exampleInputPassword1" value="">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="product_content" id="exampleInputPassword1" value="">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                    @if($cate->category_id == $pro->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                               
                                @foreach($brand_product as $key => $brand)
                                    @if($brand->brand_id == $pro->brand_id)  
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div style="text-align:center"><button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button></div>
                        
                    </form>
                    </div>
                @endforeach
                </div>
            </section>

    </div>
    
@endsection