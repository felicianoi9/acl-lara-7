@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4><b>Posts</b></h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        
                        <div class="card-body">
                            {{ $posts->links() }}
                            @forelse ($posts as $post)
                            <div class="jumbotron">
                                <h1 class="display-4">{{ $post->title }}</h1>
                                <p class="lead">{{ $post->post }}.</p>
                                <hr class="my-4">
                                <p>Author: <b>{{ $post->user->name }}<b>.</p>
                                @can('update-post', $post)
                                    <a 
                                        class="btn btn-danger btn-lg" 
                                        href="{{ route('update', $post->id) }}" 
                                        role="button">
                                        Editar
                                    </a>
                               
                                @endcan
                                
                              </div>
                            @empty
                              <p>Nenhuma postagem</p>
                          
                            @endforelse
                            
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
