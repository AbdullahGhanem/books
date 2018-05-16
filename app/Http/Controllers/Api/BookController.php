<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google_Client; 
use Google_Service_Books;

class BookController extends Controller
{    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword') ?? 'php';
        $API_KEY = env('GOOGLE_BOOKS_KEY');

        // instantiate the Google API Client
        $client = new Google_Client();
        $client->setApplicationName("Google Books with PHP Tutorial Application");
        $client->setDeveloperKey( $API_KEY );

        // get an instance of the Google Books client
        $service = new Google_Service_Books($client);

        // set options for your request
        $optParams = [];

        // make the API call to retrieve some search results
        $books = $service->volumes->listVolumes($keyword, $optParams);

        $data = [];
        foreach($books as $book){
            $data['data'][] = [
                'id' => $book['id'],
                'title' => $book['volumeInfo']['title'],
                'description' => $book['volumeInfo']['description'],
                'thumbnail' => $book['volumeInfo']['imageLinks']['thumbnail'],
                'medium' => $book['volumeInfo']['imageLinks']['medium'],
                'authors' => $book['volumeInfo']['authors'],
                'categories' => $book['volumeInfo']['categories']
            ];
        }
        return response()->json($data);
    }    

}
