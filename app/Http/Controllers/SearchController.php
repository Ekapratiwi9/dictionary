<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\History;
use App\Models\Bookmark;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $word = $request->input('word');
        
        // Lakukan permintaan API ke URL pencarian dengan menggunakan $word
        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$word}");

        $results = $response->json();

        $user = Auth()->id();
        History::create([
            'user_id' => $user,
            'word' => $word
        ]);
        
        return view('result', ['results' => $results]);
    }

    public function store($word)
    {
        $user = Auth()->id();
        Bookmark::create([
            'user_id' => $user,
            'word'=> $word,
        ]);
        return redirect()->back()->with('message', 'Data Berhasil Disimpan');
    }

    public function favorite(Request $request, )
    {
        $kategori = Kategori::find($id);
        $kategori->update([
            'jenis_kategori'=> $request->jenis_kategori,
            'nama_kategori'=> $request->nama_kategori,
            'deskripsi'=> $request->deskripsi,
        ]);
        return redirect('kategori')->with('success', 'Data Berhasil Diupdate');
    }
}
