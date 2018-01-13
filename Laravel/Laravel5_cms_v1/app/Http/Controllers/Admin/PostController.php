<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.post.index', ['posts' => $posts]);
    }

    public function add()
    {

        return view('admin.post.add');

    }

    public function store(Request $request)
    {
        if (Auth::check()) {

            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
            ]);

            $input = $request->all();
            Post::create($input);
            $request->session()->flash('success', 'Post is created successfully!');
            return redirect('admin/posts');
        } else {
            return redirect ('admin/login');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $post = Post::find($id);
            return view('admin.post.edit',compact('post'));
        } else {
            return redirect ('login');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::check()) {

            $this->validate($request, [
                'title' => 'required',
                'description' => 'required'
            ]);

            $input = $request->all();
            $data = Post::find($id);
            $data->update($input);

            return redirect('admin/posts')->with(['success' => 'Post is updated successfully!']);

        } else {
            return redirect ('login');
        }
    }

    public function destroy($id){

        if (Auth::check()) {
            $data = Post::find($id);
            $data->delete();
            return redirect('admin/posts')->with(['success' => 'Successfully deleted!']);
        } else {
            return redirect ('admin/login');
        }
    }
}
