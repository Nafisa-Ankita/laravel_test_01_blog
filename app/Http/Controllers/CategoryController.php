<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $data['categories']=Category::all();
    // //    dd($data);
    // return view('backend.category.index',$data);

    $categories=Category::all();
    // return view('backend.category.index',['categories'=>$categories]);
    return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {

        // $request->validate([
        //     'name' => 'required|max:255',
        //     
        // ],[
        //      'name.required'=>"Name must be filled up.",
        //      'description.required'=> "Description filled must be required."
        // ]);
        // dd($request->all());
        // $data['name']= $request->name;
        // $data['description']=$request->description;
        $request->validated();

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        // OPTION 01
       // $request->session()->flash('success','Category created successfully');

        // OPTION 02
        //session()->flash('success','Category created successfully');

        // OPTION 03
        //Session::flash('success','Category created successfully');

        // OPTION 03
        //Session::flash('success','Category created successfully');

        // OPTION 04
        return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
//option 01
    //    $data['category']=$category;
    //    return view('backend.category.show',$data);
//option 02
      //return view('backend.category.show',['category'=>$category]);
//option 03
        return view('backend.category.show',compact('category'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//option 01
    //    $data['category']=$category;
    //    return view('backend.category.edit',$data);
//option 02
      //return view('backend.category.edit',['category'=>$category]);
//option 03
       return view('backend.category.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryFormRequest $request, Category $category)
    { 
        // dd($request->all());
        //   $data['name']= $request->name;
        //   $data['description']=$request->description;
        //   $category->update($data);

        // Category::where('id',$category->id)->update([
        //     'name'=>$request->name,
        //     'description'=>$request->description,
        // ]);
        $request->validate();
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
 
}
