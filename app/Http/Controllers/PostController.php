<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function showAllPosts(){
        $posts = Post::paginate();
        return view('home', ['posts' => $posts]);
    
    }
    
    public function showDetailsOfOnePost($id){
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function getAllPosts(){
        $posts = Post::paginate();
        return view('posts.index', ['posts' => $posts]);
    }
     public function createPost(){
        return view('posts.add');
    }
    public function storePost(StorePostRequest $request){
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();

        return back()->with('success', 'Data Saved Successfully');
    }

    public function editPost($id){
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        
        $post->save();
        return redirect()
        ->route('posts.index')
        ->with('success', 'Data Updated Successfully');
    }

    public function destroy($id){
        $posts = Post::findOrFail($id);
        $posts->Delete();

        return back()->with('success', 'Post is Deleted Successfully');
    }


    public function searchPost(Request $request){
        $q = $request->q;
        $posts = Post::where('description', 'LIKE', "%{$q}%")
        ->latest()
        ->paginate(10);

        return view('posts.search', compact('posts', 'q'));
    }
}
