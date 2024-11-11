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
        @foreach ($pet->photoUrls as $url)
            <img src="{{ $url }}" alt="Photo of {{ $pet->name }}" style="width: 150px; height: 150px;">
        @endforeach

        <a href="{{ route('pets.update', $pet->id) }}" class="btn btn-primary">Edit Pet</a>

        <!-- Przycisk do usunięcia zwierzaka -->
        <form action="{{ route('pets.delete', $pet->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this pet?')">Delete Pet</button>
        </form>
    </div>
@endsection
