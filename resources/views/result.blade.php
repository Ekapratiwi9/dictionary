@extends('layout.index')

@section('content')
@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<div class="card justify-content-center">
            <div class="card-body">
            <form action="{{ route('home.search') }}" method="GET">
                <div class="search-row">
                    <input type="text" name="word" class="form-control"  placeholder="Type the word here.." id="word" required>

                    <button id="search-box" type="submit" class="btn btn-search ">Search</button>
                    
                
                </div> 
                </form>
                <div class="result">
                
                @foreach ($results as $result)
                    <div class="word">
                        <h3>{{ $result['word'] }}</h3>
                        <a href="/search/{{ $result['word'] }}/store" class="btn btn-light">Simpan ke bookmark</a>
                    </div>
                    <div class="details">
                        <p>{{ $result['phonetic'] }}</p>
                    </div>
                    @foreach ($result['meanings'] as $meaning)
                    <p class="word-meaning">
                    {{ $meaning['partOfSpeech'] }}
                    </p>
                    @foreach ($meaning['definitions'] as $definition)
                    <p class="word-example">
                    {{ $definition['definition'] }}
                    </p>
                    @endforeach
                    @endforeach
                    @endforeach
                </div>
                
                
            </div>
          </div>

    
@endsection