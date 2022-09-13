@extends('movies.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Movies App</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('movies.create') }}">Add New Movie</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Genre</th>
            <th>Lead Actor</th>
            <th>Director</th>
            <th>Rating</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $movie->name }}</td>
            <td>{{ $movie->genre }}</td>
            <td>{{ $movie->lead_actor }}</td>
            <td>{{ $movie->director }}</td>
            <td>{{ $movie->rating }}</td>
            <td>
                <form action="{{ route('movies.destroy',$movie->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('movies.show',$movie->id) }}">Show</a>
       
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $movies->links() !!}
      
@endsection