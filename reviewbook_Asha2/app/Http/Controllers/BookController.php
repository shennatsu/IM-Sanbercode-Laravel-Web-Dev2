<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Middleware\IsAdmin;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(IsAdmin::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $books = Book::with('genre')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'stok' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $book = new Book();
        $book->title = $validated['title'];
        $book->summary = $validated['summary'];
        $book->description = $validated['description'];
        $book->genre_id = $validated['genre_id'];
        $book->stok = $validated['stok'];

       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('book_images'), $imageName);
        $book->image = $imageName;
}


        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
            'stok' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $book->title = $validated['title'];
        $book->summary = $validated['summary'];
        $book->description = $validated['description'];
        $book->genre_id = $validated['genre_id'];
        $book->stok = $validated['stok'];

       if ($request->hasFile('image')) {
    if ($book->image && file_exists(public_path('book_images/' . $book->image))) {
        unlink(public_path('book_images/' . $book->image));
    }

    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('book_images'), $imageName);
    $book->image = $imageName;
}


        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->image && file_exists(public_path('book_images/' . $book->image))) {
    unlink(public_path('book_images/' . $book->image));
}


        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function show(Book $book)
    {
        $book->load('genre');
        return view('books.show', compact('book'));
    }
}
