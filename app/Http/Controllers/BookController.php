<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scriptotek\GoogleBooks\GoogleBooks;
use Google_Client; 
use Google_Service_Books;

class BookController extends Controller
{
    protected $service;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);

        $API_KEY = env('GOOGLE_BOOKS_KEY');

        // instantiate the Google API Client
        $client = new Google_Client();
        $client->setApplicationName("Google Books with PHP Tutorial Application");
        $client->setDeveloperKey( $API_KEY );

        // get an instance of the Google Books client
        $this->service = new Google_Service_Books($client);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index');
    }       

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mybooks()
    {
        $my_books = [];
        foreach(auth()->user()->my_books as $book_id){
            $book_api = $this->service->volumes->get($book_id, []);
            $book['id'] = $book_api['id'];
            $book['title'] = $book_api['volumeInfo']['title'];
            $book['description'] = $book_api['volumeInfo']['description'];
            $book['thumbnail'] = $book_api['volumeInfo']['imageLinks']['thumbnail'];
            $book['medium'] = $book_api['volumeInfo']['imageLinks']['medium'];
            $book['authors'] = $book_api['volumeInfo']['authors'];
            $book['categories'] = $book_api['volumeInfo']['categories'];
            $book['published_at'] = $book_api['volumeInfo']['publishedDate'];

            $my_books[] = $book;
        }
        return view('books.mybooks', compact('my_books'));
    }    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // make the API call to retrieve some search results
        $book_api = $this->service->volumes->get($id, []);
        $book = [];
        $book['id'] = $book_api['id'];
        $book['title'] = $book_api['volumeInfo']['title'];
        $book['description'] = $book_api['volumeInfo']['description'];
        $book['thumbnail'] = $book_api['volumeInfo']['imageLinks']['thumbnail'];
        $book['medium'] = $book_api['volumeInfo']['imageLinks']['medium'];
        $book['authors'] = $book_api['volumeInfo']['authors'];
        $book['categories'] = $book_api['volumeInfo']['categories'];
        $book['published_at'] = $book_api['volumeInfo']['publishedDate'];

        return view('books.show', compact('book'));
    } 

}
