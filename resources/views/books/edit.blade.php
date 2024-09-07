@extends('layout')

@section('page-content')

<legend>Update Book</legend>

<form method="post" action="{{route('books.update')}}">
    @csrf
    <input type="hidden" name="id" value="{{$book->id}}">
    <div class="mb-2">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{old('title', $book->title)}}">
        <div>{{$errors->first('title')}}</div>
    </div>
    <div class="mb-2">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" name="author" value="{{old('author', $book->author)}}">
        <div>{{$errors->first('author')}}</div>
    </div>
    <div class="mb-2">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" name="isbn" value="{{old('isbn',$book->isbn)}}">
        <div>{{$errors->first('isbn')}}</div>
    </div>
    <div class="mb-2">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control" name="stock" value="{{old('stock', $book->stock)}}">
        <div>{{$errors->first('stock')}}</div>
    </div>
    <div class="mb-2">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{old('price', $book->price)}}">
        <div>{{$errors->first('price')}}</div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('books.index') }}" class="btn btn-danger">Back</a>
    </div>
</form>

@endsection