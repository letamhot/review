<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::orderBy('created_at', 'desc')->get();
        $category = Category::all();

        return view('book.index', compact('book', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('book.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required| string | min:0 | max:999999',
        ]);
        $book = new Book();
        $book->name = $request->name;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->active = $request->active;
        $book->category_id = $request->category;

        $book->save();
        return redirect()->route('book.index')->with('success', 'Book Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $category = Category::all();

        return view('book.edit', compact('book', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required| string | min:0 | max:999999',
        ]);
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->active = $request->active;
        $book->category_id = $request->category;
        $book->save();
        return redirect()->route('book.index')->with('success', 'Book Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.index')->with('success', "Delete success $book->name ");
    }
    public function active(){
        $book = Book::where('active', 1)->orderBy('created_at', 'DESC')->get();
        return view('book.active', compact('book'));

    }
    public function inactive(){
        $book = Book::where('active', 0)->orderBy('created_at', 'DESC')->get();
        return view('book.inactive', compact('book'));

    }
}
