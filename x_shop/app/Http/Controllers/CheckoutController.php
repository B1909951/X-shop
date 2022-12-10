<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

Session_start();
class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
        
    }
    public function signup_checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        return view('pages.checkout.signup_checkout')->with('category',$cate_product)->with('brand',$brand_product);
        
    }
    public function logout_checkout(){
        Session::flush();
        return  redirect('login-checkout');
    }
    public function add_customer(request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        
        
        
        $result = DB::table('tbl_customer')->where('customer_email',$data['customer_email'])->first();
        if($result){
            Session::put('message', 'Email đã có người sử dụng✘');
            return Redirect::to('/login-checkout');
            
        }else{
            $customer_id = DB::table('tbl_customer')->insertGetId($data);
            session::put('customer_id',$customer_id);
            session::put('customer_name', $data['customer_name']);
            
            return Redirect::to('/show-checkout/'.$customer_id);
        }
    }
    public function show_checkout($customerId){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $customer_now = DB::table('tbl_customer')->where('customer_id',$customerId)->first();
        
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('customer',$customer_now);
        
    }
    public function save_checkout_customer(request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_message'] = $request->shipping_message;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        session::put('s_address',$request->shipping_address);
        session::put('s_message',$request->shipping_message);
        session::put('shipping_id',$shipping_id);
        
        return Redirect::to('/payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        

        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function order_place(request $request){
        //ins payment
        if( Cart::total()=="0.00") {
            Session::put('message', 'Giỏ hàng của bạn chưa có gì vui lòng chọn sản phẩm trước khi thanh toán✘');
            return Redirect::to('/show-cart');
        }

        $data_payment = array();
        $data_payment['payment_method'] = $request->payment_option;
        $data_payment['payment_status'] = 'Đang chờ duyệt';
        $payment_id = DB::table('tbl_payment')->insertGetId($data_payment);
        //ins order
        $data_order = array();
        $data_order['customer_id'] = Session::get('customer_id');
        $data_order['shipping_id'] =  Session::get('shipping_id');
        $data_order['payment_id'] =  $payment_id;
        $data_order['order_total'] = Cart::total();
        $data_order['order_status'] = 'Đang chờ duyệt';

        $order_id = DB::table('tbl_order')->insertGetId($data_order);
        //ins order_d
        $content = Cart::content();
        foreach($content as $v_content){
            if($v_content){
                $data_order_d = array();
                $data_order_d['order_id'] =  $order_id;
                $data_order_d['product_id'] =  $v_content->id;
                $data_order_d['product_name'] =  $v_content->name;
                $data_order_d['product_price'] =  $v_content->price;
                $data_order_d['product_sales_quantity'] =  $v_content->qty;
                $data_product['product_inventory'] = $v_content->weight - $v_content->qty;
                DB::table('tbl_order_details')->insert($data_order_d);
                DB::table('tbl_product')->where('product_id', $data_order_d['product_id'])->update($data_product);
            }
        }   

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        //huy gio hang
        Cart::destroy();
        return view('pages.checkout.order')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function login_customer(request $request){
        $email_customer = $request->email_account;
        $password_customer = md5($request->password_account);
        $result = DB::table('tbl_customer')->where('customer_email',$email_customer)->where('customer_password',$password_customer)->first();

        if($result){
            
            session::put('customer_id',$result->customer_id);

            return Redirect::to('/show-checkout/'.$result->customer_id);
        }else{
            Session::put('message',"Sai tên đăng nhập hoặc mật khẩu");
            return Redirect::to('/login-checkout');
        }
    }
    public function manage_order(){
        $this->AuthLogin();

        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manager_order', $manager_order);  
    }
    public function view_order($order_id){
        $this->AuthLogin();

        $orderId = DB::table('tbl_order')->where('tbl_order.order_id',$order_id)
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')

        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*')->first();
        $orderId_details = DB::table('tbl_order')->where('tbl_order.order_id',$order_id)
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')

        ->select('tbl_order.*','tbl_order_details.*')->get();
        

        $manager_orderId = view('admin.view_order')->with('orderId',$orderId)->with('orderId_details',$orderId_details);
        return view('admin_layout')->with('admin.view_order', $manager_orderId); 
    }
    public function show_history($customer_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $customer_order = DB::table('tbl_customer')
        ->join('tbl_order','tbl_order.customer_id','=','tbl_customer.customer_id')->where('tbl_customer.customer_id',$customer_id)->select('tbl_order.*')->orderby('tbl_order.order_id','desc')->get();
        

       
        return view('pages.checkout.show_history')->with('category',$cate_product)->with('brand',$brand_product)->with('history_order',$customer_order);
       
    }
    public function show_history_order($order_id){
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $orderId_details = DB::table('tbl_order')->where('tbl_order.order_id',$order_id)
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')->select('tbl_order.*','tbl_order_details.*','tbl_product.product_image')->get();
        return view('pages.checkout.view_history_order')->with('view_history_order',$orderId_details)->with('category',$cate_product)->with('brand',$brand_product); 
    }
    public function comfim_order($order_id){
        $this->AuthLogin();
        $data['order_status'] = "Đang vận chuyển";
        $order_by_id = DB::table('tbl_order')->where('order_id', $order_id)->update($data);
        return Redirect::to('manage-order');
    }
    public function cancel_order($order_id){
        $this->AuthLogin();
        $data['order_status'] = "Đã bị hủy";
        $order_by_id = DB::table('tbl_order')->where('order_id', $order_id)->update($data);
        return Redirect::to('manage-order');
    }
    public function delete_order($order_id){
        $this->AuthLogin();
        
        $order_by_id = DB::table('tbl_order')->where('order_id', $order_id)->delete();
        return Redirect::to('manage-order');
    }
}
