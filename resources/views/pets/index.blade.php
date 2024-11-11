@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Pets</h1>

        <a href="{{ route('pets.create') }}" class="btn btn-success mb-3">Add New Pet</a>

        <!-- Lista zwierząt -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Photos</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->category->name }}</td>
                        <td>{{ ucfirst($pet->status) }}</td>
                        <td>
                            @foreach ($pet->tags as $tag)
                                <span class="badge badge-info">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if (count($pet->photoUrls) > 0)
                                <div class="row">
                                    @foreach ($pet->photoUrls as $url)
                                        <div class="col-3">
                                            <img src="{{ $url }}" alt="Photo of {{ $pet->name }}"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No photos available</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Form to upload new photo -->
                            <form action="{{ route('pets.uploadImage', $pet->id) }}" method="POST"
                                enctype="multipart/form-data" style="display:inline;">
                                @csrf
                                <input type="file" name="photoUrls[]" multiple>
                                <button type="submit" class="btn btn-primary">Add Photo</button>
                            </form>

                            <form action="{{ route('pets.delete', $pet->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this pet?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
