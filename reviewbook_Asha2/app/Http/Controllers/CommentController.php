<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $bookId)
{
    $request->validate([
        'content' => 'required',
    ]);

    Comment::create([
        'content' => $request->input('content'),
        'user_id' => auth()->id(),
        'book_id' =>$bookId,
    ]);

    return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
}
}
