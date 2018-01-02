<?php

namespace App\Http\Controllers\FrontEnd;

use App\Ads;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showAllCategory(){
    	$categories = Category::all();
        $pageTitle = "TAT | Categories";
    	return view('frontend.category.showall',compact('categories','pageTitle'));
    }

    public function showAllCategoryAds($id,$type){
    	$category = Category::findOrFail($id);
    	$pageTitle = "TAT | " . $category->name;

    	// Send All Categories
    	$categories = Category::all();

    	$minPrice = DB::table('ads')->min('price');
    	$maxPrice = DB::table('ads')->max('price');

        if($type == 1) {
            $allAds = Ads::where('category_id',$id)->paginate(15);
            // Featured
        }elseif($type == 2) {
            $allAds = Ads::where('category_id',$id)->orderBy('price','asc')->paginate(15);
            // Newest
        }elseif($type == 3){
            $allAds = Ads::where('category_id',$id)->orderBy('created_at','desc')->paginate(15);
        }
        
    	return view('frontend.category.showallads',compact('pageTitle','categories','id','minPrice','maxPrice','allAds'));
    }

    public function showAllCategoryAdsPrice(Request $request){
        $category_id = $request->category_id;

        $min_Price = $request->minPrice;
        $max_Price = $request->maxPrice;

        

        $allAds = Ads::where('category_id',$category_id)->where('price','>=', $min_Price )->where('price' , '<=' , $max_Price)->paginate(15);

        $category =  Category::findOrFail($category_id);
        $pageTitle = "TAT | " . $category->name;

        $categories = Category::all();
        $id = $category->id;

        $minPrice = DB::table('ads')->min('price');
        $maxPrice = DB::table('ads')->max('price');

        return view('frontend.category.showallads',compact('pageTitle','categories','id','minPrice','maxPrice','allAds'));
    }

    public function Search(Request $request) {
        $this->validate($request,[
                'search' => 'required|string'
            ]);

        $search = $request->search;
        $allAds = Ads::where('title' , 'like' , '%' .  $search . '%')->paginate(15);

        $category = Category::first();
        $pageTitle = "TAT | " . $category->name;

        $id = $category->id;

        $categories = Category::all();

        $minPrice = DB::table('ads')->min('price');
        $maxPrice = DB::table('ads')->max('price');

        return view('frontend.category.showallads',compact('pageTitle','categories','id','minPrice','maxPrice','allAds'));
    }

}
