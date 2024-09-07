@extends('layout')
@section('page-content')

<div class="row align-items-center">
    <div class="col-lg-10">
        <!-- create a search bar -->
        <form action="{{ route('books.index') }}" method="get" class="d-flex">
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search books" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-lg-2 text-lg-right mt-2 mt-lg-0">
        <a class="btn btn-success" href="{{ route('books.create') }}">New Book</a>
    </div>
</div>




<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>
                <a href="{{route('books.show', $book->id)}}" class="btn btn-sm btn-outline-primary me-2">Details</a>

                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-warning">Update</a>

                <form method="post" action="{{route('books.destroy', $book->id)}}" class="d-inline" onsubmit="return confirm('Sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$books->links()}}

@endsection