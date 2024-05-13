<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class Bookcontroller extends Controller
{
    public function index(){
        $books = Book::all();
        return view('articles.index', compact('books'));
    }
}
