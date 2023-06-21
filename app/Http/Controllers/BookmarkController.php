<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Http;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $bookmark = Bookmark::where('user_id', '=', Auth()->id())->distinct()->get();
        return view('bookmark', compact('bookmark'));
    }

    

    public function show($word)
    {
        // Lakukan pencarian ulang sesuai dengan $query
        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$word}");

        $results = $response->json();
        // $searchResults = []; // Contoh: Hasil pencarian dari API atau database

        return view('result', compact('results'));
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark->delete();
        return redirect('bookmark')->with('message', 'data berhasil dihapus');
    }
}
