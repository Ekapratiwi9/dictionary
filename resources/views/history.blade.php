@extends('layout.index')

@section('content')
@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<div class="card justify-content-center">
            <div class="card-body">
            @foreach($history as $item)
                <div class="history">
                    
                    <a href="/history/{{$item->word}}" class="word-example">{{$item->word}}</a>
                    <!-- <a href="/history/{{$item->id}}"><i class="bi bi-x-lg"></i></a> -->
                    
                </div>
                @endforeach
            </div>
          </div>



        
@endsection