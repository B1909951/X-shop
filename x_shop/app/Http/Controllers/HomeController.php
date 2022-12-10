<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    
        $all_product = DB::table('tbl_product')->where('product_status','1')->where('product_inventory','>',0)->orderby('product_id','desc')->limit(6)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function all_product_home(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $all_product = DB::table('tbl_product')->where('product_status','1')->where('product_inventory','>',0)->orderby('product_id','desc')->get();
        return view('pages.all_product_home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function tim_kiem(request $request){
        $keywords = $request->keywords_search;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        $search_product = DB::table('tbl_product')->where('product_status','1')->where('product_name','like','%' .$keywords. '%')->orderby('product_id','desc')->get();
        return view('pages.product.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
}
