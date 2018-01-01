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
    	return view('frontend.category.showall',compact('categories'));
    }

    public function showAllCategoryAds($id){
    	$category = Category::findOrFail($id);
    	$pageTitle = "TAT | " . $category->name;

    	// Send All Categories
    	$categories = Category::all();

    	$minPrice = DB::table('ads')->min('price');
    	$maxPrice = DB::table('ads')->max('price');
    	
    	return view('frontend.category.showallads',compact('pageTitle','categories','id','minPrice','maxPrice'));
    }
}
