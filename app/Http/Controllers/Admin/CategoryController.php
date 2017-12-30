<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->paginate(12);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required|max:40',
                'image' => 'required|image'
                
            ]);


        $cat = new Category;

        if($request->hasFile('image')){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $cat->image = '/uploads/' . $featured_new_name;
        }

        $cat->name = $request->name;
        $cat->save();

        Session::flash('success', 'Done! Category Created Successfuly');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
                'name' => 'required|max:40',
                'image' => 'image'
                
            ]);


        $cat = Category::find($id);

        if($request->hasFile('image')){
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $cat->image = '/uploads/' . $featured_new_name;
        }

        $cat->name = $request->name;
        $cat->save();

        Session::flash('success', 'Done! Category Updated Successfuly');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();

        Session::flash('success', 'Category Deleted Successfuly');
        return redirect()->back();
    }
}
