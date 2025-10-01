<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
     public function index(){
        //$items = Book::all();
        $items = Book::with('author')->get();
        return view('book.index', ['items'=>$items]);
    }
    public function add(){
        return view('book.add');
    }
    public function create(Request $request){
        $this->validate($request, Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect('/book');
    }
}
