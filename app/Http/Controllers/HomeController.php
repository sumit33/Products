<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 use App\Http\Requests;
 use Session;
 use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function showProducts($category_id)
    {
        $products_by_category = DB::table('products')
                                ->where('products.category_id',$category_id)
                                ->get();
        return view('showProductByCategory')->with('products_by_category',$products_by_category);
    }

    public function search(Request $request)
    {
        $search_text = $$_GET['search'];
        $products = DB::table('products')
                    ->where('product_name','LIKE','%'.$search_text.'%')
                    ->get();
        return view('searchResults')->with('products',$products);
    }
    
}
