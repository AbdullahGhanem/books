<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{    
    /**
     * like book.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {
        if (\Auth::check()) {
            Like::create([
                'user_id' => auth()->user()->id,
                'book_id' => $request->get('params')['book_id'],
            ]);
            return response()->json(true);
        }else{
            return response()->json(['error' => 'Not authorized.'],403);
        }

    } 

    /**
     * un like book.
     *
     * @return \Illuminate\Http\Response
     */
    public function unlike(Request $request)
    {
        if (\Auth::check()) {
            $like = Like::where('book_id', $request->get('params')['book_id'])
                ->where('user_id', auth()->user()->id)
                ->first();
            if(isset($like)){
                $like->delete();
                return response()->json(true);
            }
        }else{
           return response()->json(['error' => 'Not authorized.'],403);
        }
        
    }   

}
