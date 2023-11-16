<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;


class IndexController extends Controller
{
    public function home()
    { 
        $banner = Banner::where('status', 0)->orderBy('id', 'DESC')->get();   
        return view('frontend.home')->with(compact('home'));

        $product = [           
        ];
        $products = Product::paginate(10); // Số lượng sản phẩm trên mỗi trang, thay đổi theo nhu cầu của bạn

        foreach ($products as $key => $value) {
            $price = number_format($value->price, 0, '.', ',');
            $value->price = $price;
            $products[$key] = $value;
        }
        return view('frontend.home')->with(compact('product'));

     }
    
}
