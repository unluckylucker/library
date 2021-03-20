<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Auth;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorInstance = new author();
        $authors = $authorInstance->getAuthor();
        $user = Auth::user();
        return view('auth.author.index', compact('authors', 'user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.author.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $author = author::create($request->all());
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        return view('auth.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        return view('auth.author.form', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, author $author)
    {

        $author->update($request->all());
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
