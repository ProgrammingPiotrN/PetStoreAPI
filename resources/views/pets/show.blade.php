@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $pet->name }}</h1>
        <p><strong>Category:</strong> {{ $pet->category->name }}</p>
        <p><strong>Status:</strong> {{ ucfirst($pet->status) }}</p>

        <h3>Tags</h3>
        <ul>
            @foreach ($pet->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <h3>Photos</h3>
        <div class="row">
            @foreach ($pet->photoUrls as $url)
                <div class="col-3">
                    <img src="{{ $url }}" alt="Photo of {{ $pet->name }}" style="width: 100%; height: auto;">
                </div>
            @endforeach
        </div>

        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Edit Pet</a>

        <form action="{{ route('pets.delete', $pet->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this pet?')">Delete Pet</button>
        </form>
    </div>
@endsection
