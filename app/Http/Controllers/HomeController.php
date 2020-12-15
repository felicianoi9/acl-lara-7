<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $post;
    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts =  $this->post->paginate(1);
        return view('home', compact('posts'));
    }

    public function update($id)
    {
        $post = $this->post->find($id);
        
        if (Gate::denies('update-post',  $post)) {
            return redirect()->route('home');
            // abort(403, ' Usuário Não autorizado');
        }
       
        return view('post-update', compact('post'));
    }
}
