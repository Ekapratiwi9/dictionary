<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\History;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $history = History::where('user_id', '=', Auth()->id())->orderBy('created_at','DESC')->get();
        return view('history', compact('history'));
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
        $history = History::find($id);
        $history->delete();
        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }

}
