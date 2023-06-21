@extends('layout.index')

@section('content')
@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<div class="card justify-content-center">
            <div class="card-body">
            @foreach($bookmark as $item)
                <div class="history">
                    
                    <a href="/bookmark/{{$item->word}}" class="word-example">{{$item->word}}</a>
                    <!-- <a href="/bookmark/{{$item->id}}"><i class="bi bi-x-lg"></i></a> -->
                    
                </div>
                @endforeach
            </div>
          </div>



        
@endsection