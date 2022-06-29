<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Mail\NewPostCreated;
use App\Mail\PostUpdateAdminMessage;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //prende tutti i post
        //$posts = Post::all()->sortDesc();
        //prende tutti i post del user loggato
        $posts = Auth::user()->posts;

        //dd($posts);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //ddd($request->all());
        $validate_data = $request->validated();
        $slug = Post::generateSlug($request->title);
        $validate_data['slug'] =$slug;
        $validate_data['user_id'] = Auth::id();

        /* request->hasFile('cover_image') // verifica*/
        //verificare se la richiesta contiene il file
        if(array_key_exists('cover_image', $request->all())){
            // validare file
            $request->validate([
                'cover_image' => 'nullable|image|max:300'
            ]);
            //salvare in filesystem
            $path = Storage::put('posts_images', $request->cover_image);
            //recuperi path
            //ddd($path);
            //passo il percorso ai dati validati
            $validate_data['cover_image'] = $path;
        }

        //passo la path all'array
        $new_post = Post::create($validate_data);
        $new_post->tags()->attach($request->tags);
        //mail
        //return (new NewPostCreated($new_post))->render(); per anteprima messaggio
        //inviare mail con l'instanza user
        Mail::to($request->user())->send(new NewPostCreated($new_post));

        //inviare mail con l'instanza user
        //Mail::to('example@goggle.com')->send(new NewPostCreated($new_post));
        return redirect()->route('admin.posts.index')->with('message','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostRequest;  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $validate_data = $request->validated();
        $slug = Post::generateSlug($request->title);
        $validate_data['slug'] =$slug;
        if(array_key_exists('cover_image', $request->all())){
            // validare file
            $request->validate([
                'cover_image' => 'nullable|image|max:300'
            ]);
            //cancello vecchia img
            Storage::delete($post->cover_image);
            //salvare in filesystem
            $path = Storage::put('posts_images', $request->cover_image);
            //recuperi path
            //ddd($path);
            //passo il percorso ai dati validati
            $validate_data['cover_image'] = $path;
        }
        $post->update($validate_data);
        $post->tags()->sync($request->tags);
        Mail::to($request->user())->send(new PostUpdateAdminMessage($post));
        return redirect()->route('admin.posts.show',$post)->with('message','Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->cover_image);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message','Post Delete Successfully');
    }
}
