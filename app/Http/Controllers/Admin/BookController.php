<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\book;
use App\author;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookInstance = new book();
        $books = $bookInstance->getBook();

        $user = Auth::user();
        return view('auth.book.index', compact('books', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = author::get();
        return view('auth.book.form', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $params = $request->all();

        if(!empty($request->file)){
            $path = $request->file('file')->store('books');
            $params['file'] = $path;
        }

        $books = book::create($params);


        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view('auth.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $authors = author::get();
        return view('auth.book.form', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, book $book)
    {
        if(!empty($book->file) && !empty($request->file)){
            Storage::delete($book->file);
        }
        $params = $request->all();
        if(!empty($request->file)) {
            $path = $request->file('file')->store('books');
            $params['file'] = $path;
        }




        $book->update($params);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
