<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Genre;


class GenreController extends Controller
{
    public function create()
    {
        return view('genre.tambah');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ]);    
    
        $now = Carbon::now();

        // Input ke DB
        DB::table('genres')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        // Arahkan ke halaman tampil semuua genre url get / genre

        return redirect('/genre');

    }
    
    


    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
        $genres = DB::table('genres')->get();
        return view('genre.tampil', ['genres' => $genres]);
    }

    public function show($id)
    {
        $genre = DB::table('genres')->find($id);

        return view('genre.detail', ['genre'=>$genre]);
    }

    public function edit($id)
    {
        $genre = DB::table('genres')->find($id);

        return view('genre.edit', ['genre'=>$genre]);
    }

    public function update(Request $request, $id)
    {
        //Validation
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ]);
    
        $now = Carbon::now();

        // Update  data berdasarkan id
        DB::table('genres')
        ->where('id', $id)
        ->update(
            [
            'name' => $request->input('name'),
            'description' => $request->input('description')       
             ]
    );
        return redirect('/genre');
    }

public function destroy($id)
{
    $genre = Genre::findOrFail($id);
    $genre->delete();

    return redirect()->route('genres.index')->with('success', 'Genre berhasil dihapus.');
    $bookCount = \App\Models\Book::where('genre_id', $id)->count();

    if ($bookCount > 0) {
        return back()->with('error', 'Genre tidak bisa dihapus karena masih digunakan oleh buku.');
    }

    DB::table('genres')->where('id', $id)->delete();
    return redirect('/genre')->with('success', 'Genre berhasil dihapus.');
}



}
