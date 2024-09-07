@extends('layout')

@section('page-content')

<div class="d-flex justify-content-start mt-5">
    <a href="{{ route('books.index') }}" class="btn btn-outline-primary">Back</a>
    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-danger ms-2">Edit</a>
</div>


<div class="card mt-5">
    <div class="card-header">
        <h3>Book Details</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $book->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td>{{ $book->isbn }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $book->price }}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $book->stock }}</td>
            </tr>
        </table>
    </div>
</div>



@endsection