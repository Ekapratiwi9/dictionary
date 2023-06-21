@extends('layout.index')

@section('content')
@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<div class="card justify-content-center">

            <div class="card-body">
                <h3>Bookmark</h3>
            @forelse($bookmark as $item)
                <div class="history">
                    
                    <a href="/bookmark/{{$item->word}}" class="word-example">{{$item->word}}</a>
                    <a href="/bookmark/{{$item->id}}/destroy"><i class="bi bi-x-lg"></i></a>
                    
                </div>
                @empty
                <div class="history">
                    <p>Data tidak ada</p>
                </div>
                @endforelse
            </div>
          </div>



        
@endsection