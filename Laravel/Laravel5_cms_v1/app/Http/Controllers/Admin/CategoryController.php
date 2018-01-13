<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class CategoryController extends Controller
{

    public function index()
    {
        echo 'In indes method';exit;
        //$data = Category::all();
        //return view('category.all_categories',compact('data'));
    }

    public function create()
    {
        if (Auth::check()) {
            return view('category.category_create');
        } else {
            return redirect ('auth/login'); 
        }
    }


    public function store(Request $request)
    {
        if (Auth::check()) {
            
            $this->validate($request, [
                'category_name' => 'required',
            ]);

            $input = $request->all();
            Category::create($input);
            $request->session()->flash('success', 'Category is created successfully!');
            return redirect('category');
        } else {
            return redirect ('auth/login'); 
        }
    }

 
    public function show($id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            return view('category.edit_category',compact('category'));
        } else {
            return redirect ('auth/login'); 
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            return view('Category.edit_category',compact('category'));
        } else {
            return redirect ('auth/login'); 
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            
            $this->validate($request, [
                'category_name' => 'required',
            ]);
            
            $input = $request->all();
            $data = Category::find($id);
            $data->update($input);
            $request->session()->flash('success', 'Category is updated successfully!');
            return redirect('category');
        } else {
            return redirect ('auth/login'); 
        }
    }


    public function destroy($id){
        
        if (Auth::check()) {
            $data = Category::find($id);
            $data->delete();
            return redirect('category');
        } else {
            return redirect ('auth/login'); 
        }
    }
}
