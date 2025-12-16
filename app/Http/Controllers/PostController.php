<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use File;
use Illuminate\Http\File as HttpFile;

class PostController extends Controller
{
    //
    public function showAllPosts(){
        $posts = Post::orderBy('id','DESC')->paginate();
        return view('home', ['posts' => $posts]);
    
    }
    
    public function showDetailsOfOnePost($id){
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function getAllPosts(){
        $posts = Post::orderBy('id','DESC')->paginate();
        return view('posts.index', ['posts' => $posts]);
    }
     public function createPost(){
        $this->authorize('create', Post::class);
        $users = User::select('id','name')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('posts.add', compact('users', 'tags'));
    }
    public function storePost(StorePostRequest $request){
        $this->authorize('create', Post::class);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $image = $request->file('image')->store('public');
        $post->image = $image;
        // dd($request->image);
        $post->save();
        // dd($request->tags);
        $post->tags()->sync($request->tags ?? []);

        return back()->with('success', 'Data Saved Successfully');
    }

    public function editPost($id){
        $post = Post::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('posts.edit', compact('post', 'users', 'tags'));
    }

    public function update(Request $request, $id, Post $post){
        $this->authorize('postEdit', $post);
        $post = Post::findOrFail($id);
        $old_image =  $post->image;
        $post->title = $request->title;
        $post->user_id = $request->user_id;
        $post->description = $request->description;
        if($request->hasFile('image')){
            $new_image = $request->file('image')->store('public');
            File::delete($old_image);
            $post->image = $new_image;
        }
        $post->save();

        $post->tags()->detach();
        $post->tags()->sync($request->tags ?? []);
        return redirect()
        ->route('posts.index')
        ->with('success', 'Data Updated Successfully');
    }

    public function destroy($id, Post $post){
        $this->authorize('postEdit', $post);
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
