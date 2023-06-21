@extends('layout.index')

@section('content')
<div class="card justify-content-center">
            <div class="card-body">
            <form action="{{ route('home.search') }}" method="GET">
                <div class="search-row">
                    <input type="text" name="word" class="form-control"  placeholder="Type the word here.." id="word" required>

                    <button id="search-box" type="submit" class="btn btn-search ">Search</button>
                    
                
                </div> 
                </form>
                <div id="searchResults">
                
                </div>
                
            </div>
          </div>

          <!-- <script>
    $(document).ready(function() {
        $('#searchForm').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir default

            var query = $('input[name="query"]').val();

            // Kirim permintaan Ajax
            $.ajax({
                url: '/search' + query,
                type: 'GET',
                success: function(response) {
                    var results = response;
                    var searchResults = $('#searchResults');
                    searchResults.empty();

                    // Tampilkan hasil pencarian
                    $.each(results, function(index, result) {
                        var wordElement = $('<h3>').text(result.word);
                        searchResults.append(wordElement);

                        $.each(result.meanings, function(index, meaning) {
                            var partOfSpeechElement = $('<h4>').text(meaning.partOfSpeech);
                            searchResults.append(partOfSpeechElement);

                            var definitionsList = $('<ul>');
                            $.each(meaning.definitions, function(index, definition) {
                                var definitionItem = $('<li>').text(definition.definition);
                                definitionsList.append(definitionItem);
                            });

                            searchResults.append(definitionsList);
                        });
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script> -->

        
@endsection