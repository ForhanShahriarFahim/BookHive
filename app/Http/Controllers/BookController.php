<?php

namespace App\Http\Controllers;
use App\Models\Book;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $books = Book::paginate(50);  // This should be in an `else` block
        }

        return view('books.index')
        ->with('books', $books);
    }

        

    public function show($id){
        $book = Book::find($id);
        return view('books.show')->with('book',$book);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|size:13',
            'stock' => 'required|numeric|integer|gte:0',
            'price' => 'required|numeric'
        ];
        $message=[
            'stock.gte' => 'The stock must be grater than or equal to 0',
        ];
        $request->validate($rules, $message);
        
        /// If field name not similar then do this
        //Option 1
        // $book = new Book();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->isbn = $request->isbn;
        // $book->price = $request->price;
        // $book->save();

        // //another way 
        // Option 2
        // $data = [
        //     'title'=> $request->title,
        //     'author'=> $request->author,
        //     'isbn'=> $request->isbn,
        //     'stock'=> $request->stock,
        //     'price'=> $request->price,
        // ];
        // $book = Book::create($data);
        //option 3
        $book = Book::create($request->all()); /// Field name and database name similar
        
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request, $id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('books.edit')
        ->with('book', $book);
    }

    public function update(Request $request){
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|size:13',
            'stock' => 'required|numeric|integer|gte:0',
            'price' => 'required|numeric'
        ];
        $message = [
            'stock.gte' => 'The stock must be grater than or equal to 0',
        ];
        $request->validate($rules, $message);

        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.show',$book->id)->with('success', 'Book Updated Succesfully');
    }
}
 