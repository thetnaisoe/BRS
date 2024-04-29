
@extends('layouts.main') 

@section('content')
<div class="container mt-4">
    <form action="{{ route('genres.create') }}" method="GET">
        <button type="submit" class="btn btn-success mb-3">Add New Genre</button>
    </form>
    <div class="row">
        @foreach($genres as $genre)
            <div class="col-md-4">
                <div class="card mb-4 shadow-lg bg-{{ $genre->style }}">
                    <div class="card-body" style="color: {{ $genre->style == 'light' ? 'black' : 'white' }};">
                        <h5 class="card-title">{{ $genre->name }}</h5>
                        <p class="card-text">{{ $genre->style }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-primary" style="font-size: 0.8rem; padding: 0.5rem 1rem; margin-right: 0.5rem; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">Edit</a>
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="font-size: 0.8rem; padding: 0.5rem 1rem; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection





