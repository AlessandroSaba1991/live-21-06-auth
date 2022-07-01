<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        /*
    PIU COMPLETA
    $posts= Post::all();
    return response()->json([
        'status_code' => 200,
        'statu_text' => 'Success',
        'posts' => $posts
    ]); */

    /*
    Scorciatoia risultati non custom
    return $posts
    */

    /*
    Paginate
    $posts = Post::all()->paginate(numero di elementi er pagina)
    return $posts
    */

   /*  //Recuperi tutte le associazioni
    $posts= Post::with(['tags','category','user'])->get();
    return $posts; */

    //Recuperi tutte le associazioni con paginazione
    $posts= Post::with(['tags','category','user'])->orderByDesc('id')->paginate(5) ;
    return $posts;
    }
    public function show($slug)
    {
        $post = Post::with(['tags','category','user'])->where('slug',$slug)->first();
        if($post){
            return $post;
        } else {
            return response()->json([
                'status_code' => 404,
                'status_text' => 'not found'
            ]);
        }
    }
}
