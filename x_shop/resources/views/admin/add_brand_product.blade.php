@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                
                <div class="panel-body">
                    <?php 
	                $message = Session::get('message');
	                if($message){
                        
		                echo '<div class="position-center text-center"><span style="color: green; text-align: center; width: 100%; font-weight:bold"> '. $message . '</span></div>' ;
		                Session::put('message',null);
                      
	                }
	                ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Tên thương hiệu</label>
                            <input type="text" required name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả thương hiệu</label>
                            <textarea style="resize: none" required rows="5" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                                
                            </select>
                        </div>

                        <div style="text-align:center"><button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button></div>
                        
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
@endsection