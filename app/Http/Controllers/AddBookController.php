<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;

class AddBookController extends Controller
{
    public function add_book(){

        $addB = 'This is add book page';
        return view("addB",['addB'=>$addB]);
    }

    public function Books(BookRequest $req){


        $book = new Book();
        $book->name = $req->input('name');
        $book->years=$req->input('years');
        $book->author=$req->input('author');

        $url = $req->file('image')->store('images');
        $book->image = $url;


        $book->save();

        return redirect()->route('booklist');

    }
}
