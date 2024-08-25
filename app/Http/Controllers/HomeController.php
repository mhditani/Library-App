<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    { 
        $data = Book::all();
        return view('home.index',compact('data'));  
    }

    public function book_detalis($id)
    { 
        
        $data = Book::find($id);
        return view('home.book_detalis',compact('data'));
    }

    public function borrow_book(Request $request, $id)
   {
    
    if (!Auth::check()) 
    {
        return redirect('/login'); 
    }

    
    $book = Book::find($id);

    
    if ($book && $book->quantity >= 1) {
        
        $borrow = new Borrow;
        $borrow->book_id = $id; 
        $borrow->user_id = Auth::id(); 
        $borrow->save();

        
       
        $book->save();

        return redirect()->back()->with('message', 'A request is sent to the admin to confirm');
    } else {
        
        return redirect()->back()->with('message', 'Not enough books available');
    }
}

public function book_history()
{
    if(Auth::id())
    {
        $userid = Auth::user()->id;
        $data = Borrow::where('user_id','=',$userid)->get();
        return view('home.book_history',compact('data'));  
    }
}

public function cancel_req($id)
{
    $data = Borrow::find($id);
    $data->delete();
    return redirect()->back()->with('message', 'Request Cancelled Successfully');
}

public function explore()
{
    $category = Category::all();

    $data = Book::all();
    return view('home.explore',compact('data', 'category'));
}

public function search(Request $request)
{
    $category = Category::all();
    $search = $request->search;
    $data = Book::where('title', 'LIKE', '%'. $search . '%')->orWhere('author_name', 'LIKE', '%'. $search . '%')->get();
    return view('home.explore',compact('data', 'category'));

}

public function cat_search($id)
{
    $category = Category::all();
    $data = Book::where('category_id', $id )->get();
    return view('home.explore',compact('data', 'category'));


}


}