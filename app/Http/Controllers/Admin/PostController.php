<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }







    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }






    public function store(Request $request)
    {
        $request->validate([
        'category_id'=>'exists:categories,id|nullable',
        'title'=>'required|string|max:255',
        'content'=> 'required|string'
      ]);

        $data= $request->all();

        $post = new Post();
        $post->fill($data);
        $post->slug = $this->generateSlug($post->title);
        $post->save();

        return redirect()->route('admin.posts.index');
    }





    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }







    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }






    public function update(Request $request, Post $post)
    {
        $request->validate([
        'category_id' => 'exists:categories,id|nullable',
        'title'=>'required|string|max:255',
        'content'=> 'required|string'
    ]);

        $data = $request->all();

        $data['slug'] = $this->generateSlug($data['title'], $post->title != $data['title'], $post->slug);
        $post->update($data);


        return redirect()->route('admin.posts.index');
    }





    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }




    private function generateSlug(string $title, bool $change = true, string $old_slug = '')
    {
        if (!$change) {
            return $old_slug;
        }

        $slug = Str::slug($title, '-');
        $slug_base = $slug;
        $contatore = 1;
        $post_with_slug = Post::where('slug', '=', $slug)->first();
        while ($post_with_slug) {
            $slug = $slug_base . '-' . $contatore;
            $contatore++;
            $post_with_slug = Post::where('slug', '=', $slug)->first();
        }
        return $slug;
    }
}
